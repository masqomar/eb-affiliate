<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Period;
use App\Notifications\SendNewUserNotification;

class ProgramOfflineController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function index()
    {
        $programTypes = ProgramType::with('category')->select('id', 'name', 'category_id')->get();
        $programs = Program::where('is_active', 1)->with('program_type.category')->get();

        return view('front.program-offline.index', compact('programTypes', 'programs'));
    }

    public function show($id)
    {
        $program = Program::with('periods')->find($id);

        return view('front.program-offline.show', compact('program'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|unique:users|max:255',
            'phone_number'  => 'required|unique:students,phone_number',
            'gender'        => 'required|string',
            'address'       => 'required|string|max:255',
            'program_id'    => 'required|string|max:255',
            'period_id'     => 'required|integer',
            'coupon_code'   => 'nullable|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password'),
                'level'  => 2,
            ]);

            $student = Student::create([
                'user_id' => $user->id,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'address' => $request->address
            ]);

            $program = Program::where('id', $request->program_id)->first();
            $periode = Period::where('id', $request->period_id)->first();
            $admin_fee = 0;
            $programPrice = $program->price;

            if ($request->coupon_code != null) {
                $coupon = Coupon::where('id', $request->coupon_id)->first();
                $discount = $coupon->amount;
                $discountPayment = $admin_fee + $programPrice - $discount;
                $downPayment = ceil($discountPayment * 0.2);
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'total_purchases' => $discountPayment,
                    'maximum_payment_time' => Carbon::now()->addDays(1),
                    'code' => Transaction::generateCode(),
                    'transaction_status' => 'pending',
                    'invoice' => 'EB.' . date('dmy') . '.' . rand(1000, 9999),
                    'program_id' => $request->program_id,
                    'discount' => $discount,
                    'admin_fee' => $admin_fee,
                    'down_payment' => $downPayment,
                    'period' => $periode->period_date,
                    'aff_id' => $request->aff_id
                ]);

                $payload = [
                    'transaction_details' => [
                        'order_id'     => $transaction->invoice,
                        'gross_amount' => $downPayment,
                    ],
                    'customer_details' => [
                        'first_name'    => $user->name,
                        'email'         => $user->email,
                        'phone'         => $student->phone_number
                    ],
                    'item_details' => [
                        [
                            'id'            => $transaction->invoice,
                            'price'         => $downPayment,
                            'quantity'      => 1,
                            'name'          => 'Down Paymnet Program ' . $program->name,
                            'brand'         => 'English Booster',
                            'category'      => 'English Course',
                            'merchant_name' => config('app.name'),
                        ],
                    ],
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($payload);
                $transaction->snap_token = $snapToken;
                $transaction->save();

            } else {
                $payment = $admin_fee + $programPrice;
                $dp = ceil($payment * 0.2);
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'total_purchases' => $admin_fee + $programPrice,
                    'maximum_payment_time' => Carbon::now()->addDays(1),
                    'code' => Transaction::generateCode(),
                    'transaction_status' => 'pending',
                    'invoice' => 'EB.' . date('dmy') . '.' . rand(1000, 9999),
                    'program_id' => $request->program_id,
                    'discount' => 0,
                    'admin_fee' => $admin_fee,
                    'down_payment' => $dp,
                    'period' => $periode->period_date,
                    'aff_id' => $request->aff_id
                ]);

                $payload = [
                    'transaction_details' => [
                        'order_id'     => $transaction->invoice,
                        'gross_amount' => $dp,
                    ],
                    'customer_details' => [
                        'first_name'    => $user->name,
                        'email'         => $user->email,
                        'phone'         => $student->phone_number
                    ],
                    'item_details' => [
                        [
                            'id'            => $transaction->invoice,
                            'price'         => $dp,
                            'quantity'      => 1,
                            'name'          => 'Down Paymnet Program ' . $program->name,
                            'brand'         => 'English Booster',
                            'category'      => 'English Course',
                            'merchant_name' => config('app.name'),
                        ],
                    ],
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($payload);
                $transaction->snap_token = $snapToken;
                $transaction->save();
            }

            // Kirim Email
            $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            $admin->notify(new SendNewUserNotification($transaction));
            $user->notify(new SendNewUserNotification($transaction));

            // Kirim Telegram
            // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            // $admin->notify(new SendNewUserNotification($user));

            // Kirim WA
            $message = "*Mohon dibaca dan dipahami!*\n\n_Hallo, saya admin dari English Booster Kampung Inggris, kamu telah terdaftar di platform kami dengan data_\n\nNama: " . $user->name . "\nEmail: " . $user->email . "\n\nBerikut link pembayaran dan verifikasi kamu\n" . env('APP_URL') . "/payment/" . $transaction->id . "/down-payment" . "\n\n*Jika link tidak bisa diklik, silakan simpan dulu nomor ini atau copy dan paste dibrowser kamu.*\n\n_terimakasih telah menjadi bagian dari kami, semoga English Booster Kampung Inggris dapat membantu proses belajarmu. aamiin._";
            sendWhatsappNotification($student->phone_number, $message);


            DB::commit();

            return redirect('payment/' . $transaction->id . '/down-payment');
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Gagal menyimpan data: ' . $e->getMessage()
            ];
        }

        return view('front.program-offline.index');
    }

    public function payment($id)
    {
        $transaction = Transaction::with('user.student')->findOrfail($id);

        return view('front.program-offline.payment', compact('transaction'));
    }

    public function checkingCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->where('program_id', $request->program_id)->first();
        if ($coupon == null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kupon tidak tersedia!'
            ]);
        } else {
            $discount = $coupon->amount;
            return response()->json([
                'discountAmount' => $discount,
                'couponId' => $coupon->id,
                'message' => 'Kupon diskon berhasil dipasang!'
            ]);
        }
    }

    public function paymentSuccess($id)
    {
        $transaction = Transaction::with('user.student')->findOrfail($id);

        return view('front.program-offline.payment-success', compact('transaction'));
    }

    public function midtransCallback(Request $request)
    {
        $json = json_decode($request->getContent());
        $transactionStatus = $json->transaction_status;
        $orderId = $json->order_id;

        if ($transactionStatus == 'settlement') {
            Transaction::where('invoice', $orderId)->update([
                'transaction_status' => 'paid',
            ]);
            $transaction = Transaction::where('invoice', $orderId)->first();

             // Kirim Email
            // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            // $admin->notify(new SendTransactionNotification($transaction));

            // Kirim WA
            $message = "*Pembayaran Terverifikasi*\n\n_Terimakasih telah menjadi bagian dari kami, semoga English Booster Kampung Inggris dapat membantu proses belajarmu. aamiin._";
            sendWhatsappNotification($transaction->user->student->phone_number, $message);
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            Transaction::where('invoice', $orderId)->update([
                'transaction_status' => 'failed',
            ]);

            $transaction = Transaction::where('invoice', $orderId)->first();

            // Kirim Email
            // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            // $admin->notify(new SendTransactionNotification($transaction));

            // Kirim WA
            $message = "*Pembayaran Gagal*\n\n_Silahkan hubungi admin untuk proses pembayaran. Terima kasih._";
            sendWhatsappNotification($transaction->user->student->phone_number, $message);
        }

        return response()->json(['status' => 'success']);
    }

    public function fullPayment($id)
    {
        $transaction = Transaction::with('user.student')->where('transaction_status', 'paid')->findOrfail($id);
       
        return view('front.program-offline.full-payment', compact('transaction'));
    }

    public function fullPaymentStore(Request $request)
    {
        $validated = $request->validate([
            'transaction_id'       => 'required|string|max:255',
            'tshirt_size'          => 'required|string|max:255'
        ]);

        $transactionId = Transaction::where('id', $request->transaction_id)->first();
        $fullPayment = $transactionId->admin_fee + $transactionId->program->price - $transactionId->discount - $transactionId->down_payment;

        DB::beginTransaction();
        try {
            $transactionDetail = TransactionDetail::create([
                'transaction_id'    => $request->transaction_id,
                'invoice'           => 'EB.' . date('dmy') . '.' . rand(1000, 9999),
                'tshirt_size'       => $request->tshirt_size,
                'full_payment'      => $fullPayment,
                'payment_status'    => 'pending'
            ]);

            $payloadFullPayment = [
                'transaction_details' => [
                    'order_id'     => $transactionDetail->invoice,
                    'gross_amount' => $fullPayment,
                ],
                'customer_details' => [
                    'first_name'    => $transactionId->user->name,
                    'email'         => $transactionId->user->email,
                    'phone'         => $transactionId->user->student->phone_number
                ],
                'item_details' => [
                    [
                        'id'            => $transactionDetail->invoice,
                        'price'         => $fullPayment,
                        'quantity'      => 1,
                        'name'          => 'Pelunasan Program ' . $transactionId->name,
                        'brand'         => 'English Booster',
                        'category'      => 'English Course',
                        'merchant_name' => config('app.name'),
                    ],
                ],
            ];

            $snapTokenFullPayment = \Midtrans\Snap::getSnapToken($payloadFullPayment);
            $transactionDetail->snap_token = $snapTokenFullPayment;
            $transactionDetail->save();

            DB::commit();

            return redirect('payment/' . $transactionDetail->id . '/full-payment-detail');
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Gagal menyimpan data: ' . $e->getMessage()
            ];
        }

        return view('front.program-offline.index');
    }

    public function fullPaymentDetail($id)
    {
        $transactionDetails = TransactionDetail::with('transaction.program', 'transaction.user.student')->findOrfail($id);

        return view('front.program-offline.full-payment-detail', compact('transactionDetails'));
    }

    public function fullPaymentSuccess($id)
    {
        $transactionDetails = TransactionDetail::with('transaction.program', 'transaction.user.student')->findOrfail($id);

        return view('front.program-offline.full-payment-success', compact('transactionDetails'));
    }
}
