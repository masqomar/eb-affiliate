<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Program;
use App\Models\ProgramType;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramOnlineController extends Controller
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
        $programTypes = ProgramType::with('category')->get();
        $programs = Program::where('is_active', 1)->with('program_type.category')->get();
        
        return view('front.program-online.index', compact('programTypes', 'programs'));
    }

    public function show($id)
    {
        $program = Program::find($id);

        return view('front.program-online.show', compact('program'));
    }

    public function checkingCouponOnline(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->where('program_id', $request->program_id)->first();
        $program = Program::where('id', $request->program_id)->first();
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
                'finalPrice' => $program->price - $discount,
                'message' => 'Kupon diskon berhasil dipasang!'
            ]);
        }
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
            'program_date'  => 'required|string',
            'program_time'  => 'required|string',
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
            $programPrice = $program->price;

            if ($request->coupon_code != null) {
                $coupon = Coupon::where('id', $request->coupon_id)->first();
                $discount = $coupon->amount;
                $discountPayment = $programPrice - $discount;
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'total_purchases' => $discountPayment,
                    'maximum_payment_time' => Carbon::now()->addDays(1),
                    'code' => Transaction::generateCode(),
                    'transaction_status' => 'pending',
                    'invoice' => 'EB.' . date('dmy') . '.' . rand(1000, 9999),
                    'program_id' => $request->program_id,
                    'program_date' => $request->program_date,
                    'program_time' => $request->program_time,
                    'note' => $request->message,
                    'discount' => $discount
                ]);

                $payload = [
                    'transaction_details' => [
                        'order_id'     => $transaction->invoice,
                        'gross_amount' => $discountPayment,
                    ],
                    'customer_details' => [
                        'first_name'    => $user->name,
                        'email'         => $user->email,
                        'phone'         => $student->phone_number
                    ],
                    'item_details' => [
                        [
                            'id'            => $transaction->invoice,
                            'price'         => $discountPayment,
                            'quantity'      => 1,
                            'name'          => 'Pembayaran Program ' . $program->name,
                            'brand'         => 'English Booster',
                            'category'      => 'English Course',
                            'merchant_name' => config('app.name'),
                        ],
                    ],
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($payload);
                $transaction->snap_token = $snapToken;
                $transaction->save();

                // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
                // $admin->notify(new SendNewUserNotification($user));

                $message = "*Mohon dibaca dan dipahami!*\n\n_Hallo, saya admin dari English Booster Kampung Inggris, akun kamu telah terdaftar di platform kami dengan data_\n\nNama: " . $user->name . "\nEmail: " . $user->email . "\n\nBerikut link pembayaran dan verifikasi kamu\n" . env('APP_URL') . "/payment/" . $transaction->id . "/down-payment" . "\n\n*Jika link tidak bisa diklik, silakan simpan dulu nomor ini atau copy dan paste dibrowser kamu.*\n\n_terimakasih telah menjadi bagian dari kami, semoga English Booster Kampung Inggris dapat membantu proses belajar kamu. aamiin._";
                sendWhatsappNotification($student->phone_number, $message);
            } else {
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'total_purchases' => $programPrice,
                    'maximum_payment_time' => Carbon::now()->addDays(1),
                    'code' => Transaction::generateCode(),
                    'transaction_status' => 'pending',
                    'invoice' => 'EB.' . date('dmy') . '.' . rand(1000, 9999),
                    'program_id' => $request->program_id,
                    'program_date' => $request->program_date,
                    'program_time' => $request->program_time,
                    'note' => $request->note,
                    'discount' => 0
                ]);

                $payload = [
                    'transaction_details' => [
                        'order_id'     => $transaction->invoice,
                        'gross_amount' => $programPrice,
                    ],
                    'customer_details' => [
                        'first_name'    => $user->name,
                        'email'         => $user->email,
                        'phone'         => $student->phone_number
                    ],
                    'item_details' => [
                        [
                            'id'            => $transaction->invoice,
                            'price'         => $programPrice,
                            'quantity'      => 1,
                            'name'          => 'Pembayaran Program ' . $program->name,
                            'brand'         => 'English Booster',
                            'category'      => 'English Course',
                            'merchant_name' => config('app.name'),
                        ],
                    ],
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($payload);
                $transaction->snap_token = $snapToken;
                $transaction->save();

                // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
                // $admin->notify(new SendNewUserNotification($user));

                $message = "*Mohon dibaca dan dipahami!*\n\n_Hallo, saya admin dari English Booster Kampung Inggris, akun kamu telah terdaftar di platform kami dengan data_\n\nNama: " . $user->name . "\nEmail: " . $user->email . "\n\nBerikut link pembayaran dan verifikasi kamu\n" . env('APP_URL') . "/payment/" . $transaction->id . "/down-payment" . "\n\n*Jika link tidak bisa diklik, silakan simpan dulu nomor ini atau copy dan paste dibrowser kamu.*\n\n_terimakasih telah menjadi bagian dari kami, semoga English Booster Kampung Inggris dapat membantu proses belajar kamu. aamiin._";
                sendWhatsappNotification($student->phone_number, $message);
            }


            DB::commit();

            return redirect('payment/' . $transaction->id);
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Gagal menyimpan data: ' . $e->getMessage()
            ];
        }

        return view('front.program-online.index');
    }

    public function paymentOnline($id)
    {
        $transaction = Transaction::with('user.student')->findOrfail($id);

        return view('front.program-online.payment', compact('transaction'));
    }

    public function paymentSuccess($id)
    {
        $transaction = Transaction::with('user.student')->findOrfail($id);

        return view('front.program-online.payment-success', compact('transaction'));
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

            // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            // $admin->notify(new SendTransactionNotification($transaction));

            $message = "*Pembayaran Terverifikasi*\n\n_Terimakasih telah menjadi bagian dari kami, semoga English Booster Kampung Inggris dapat membantu proses belajar kamu. aamiin._";
            sendWhatsappNotification($transaction->user->student->phone_number, $message);
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
             Transaction::where('invoice', $orderId)->update([
                'transaction_status' => 'failed',
            ]);

            $transaction = Transaction::where('invoice', $orderId)->first();

            // $admin = User::find('20b2a4122c614bb68e41b1a6f3f37780');
            // $admin->notify(new SendTransactionNotification($transaction));

            $message = "*Pembayaran Gagal*\n\n_Silahkan hubungi admin untuk proses pembayaran. Terima kasih._";
            sendWhatsappNotification($transaction->user->student->phone_number, $message);
        }
        
        return response()->json(['status' => 'success']);
    }
}

