<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::domain('{subdomain}.' . config('app.short_url'))->group(function () {
//     Route::get('/', function () {
//         return 'Subsomain Test';
//     });
// });

Route::get('/_t', function () {
    // Response is an array of updates.
    $updates = \NotificationChannels\Telegram\TelegramUpdates::create()
        // (Optional). Get's the latest update. NOTE: All previous updates will be forgotten using this method.
        // ->latest()

        // (Optional). Limit to 2 updates (By default, updates starting with the earliest unconfirmed update are returned).
        ->limit(2)

        // (Optional). Add more params to the request.
        ->options([
            'timeout' => 0,
        ])
        ->get();

    dd($updates);
})->name('test');

Route::domain('{tenant:subdomain}.' . config('app.url'))->name('subdomain.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\SubdomainIndexController::class, 'index'])->name('index');
    Route::get('/join/{id}', [\App\Http\Controllers\Front\SubdomainIndexController::class, 'registerByAff'])->name('registerByAff');
    // Route::get('/daftar', [\App\Http\Controllers\Front\IndexController::class, 'daftar'])->name('daftar');
});



Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('index');


// Frontend Program Offline
Route::get('/program-offline', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'index'])->name('front.program-offline.index');
Route::get('/program/{id}/detail-offline', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'show'])->name('front.program-offline.show');
Route::post('/program/detail-offline/store', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'store'])->name('front.program-offline.store');
Route::get('/payment/{id}/down-payment', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'payment'])->name('front.program-offline.payment');
Route::post('/check-coupon-code', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'checkingCoupon'])->name('front.program-offline.coupon');
Route::get('/payment-success/{id}/down-payment', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'paymentSuccess'])->name('front.program-offline.payment-success');
Route::get('/payment/{id}/full-payment', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'fullPayment'])->name('front.program-offline.fullPayment');
Route::post('/full-payment/store', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'fullPaymentStore'])->name('front.program-offline.fullPaymentStore');
Route::get('/payment/{id}/full-payment-detail', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'fullPaymentDetail'])->name('front.program-offline.fullPaymentDetail');
Route::get('/payment-success/{id}/full-payment', [\App\Http\Controllers\Front\ProgramOfflineController::class, 'fullPaymentSuccess'])->name('front.program-offline.full-payment-success');

// Frontend Program Online
Route::get('/program-online', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'index'])->name('front.program-online.index');
Route::get('/program/{id}/detail-online', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'show'])->name('front.program-online.show');
Route::post('/check-coupon-code-online', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'checkingCouponOnline'])->name('front.program-online.coupon');
Route::post('/program/detail-online/store', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'store'])->name('front.program-online.store');
Route::get('/payment/{id}', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'paymentOnline'])->name('front.program-offline.paymentOnline');
Route::get('/payment/{id}/success', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'paymentSuccess'])->name('front.program-online.paymentSuccess');

// Midtrans Callback
Route::post('payment/callback', [\App\Http\Controllers\Front\ProgramOnlineController::class, 'midtransCallback']);

// Dropdown Program
Route::post('/periode/{program_id}', [\App\Http\Controllers\Front\IndexController::class, 'getPeriod']);

// Dashboard
Route::middleware(['auth', 'web'])->group(function () {
    // Route::get('/', fn () => view('dashboard'));
    Route::get('/dashboard', fn() => view('dashboard'));
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);

    // Menu Affiliate
    Route::get('/aff/register', [\App\Http\Controllers\Affiliate\RegistrationController::class, 'index'])->name('affiliate.register.index');
    Route::post('/aff/store', [\App\Http\Controllers\Affiliate\RegistrationController::class, 'store'])->name('affiliate.register.store');
    Route::get('/aff-commissions', [\App\Http\Controllers\Affiliate\CommissionController::class, 'index'])->name('affiliate.commissions.index');
    Route::get('/commission-history', [\App\Http\Controllers\Affiliate\CommissionController::class, 'detail'])->name('affiliate.commissions.detail');

});

Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('auth');
Route::resource('periods', App\Http\Controllers\PeriodController::class)->middleware('auth');
Route::resource('program-types', App\Http\Controllers\ProgramTypeController::class)->middleware('auth');
Route::resource('programs', App\Http\Controllers\ProgramController::class)->middleware('auth');
Route::resource('online-programs', App\Http\Controllers\ProgramOnlineControler::class)->middleware('auth');
Route::resource('coupons', App\Http\Controllers\CouponController::class)->middleware('auth');
Route::resource('announcements', App\Http\Controllers\AnnouncementController::class)->middleware('auth');
Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');
Route::resource('value-categories', App\Http\Controllers\ValueCategoryController::class)->middleware('auth');
Route::resource('detail-value-categories', App\Http\Controllers\DetailValueCategoryController::class)->middleware('auth');
Route::resource('faqs', App\Http\Controllers\FaqController::class)->middleware('auth');
Route::resource('question-titles', App\Http\Controllers\QuestionTitleController::class)->middleware('auth');
Route::resource('exams', App\Http\Controllers\ExamController::class)->middleware('auth');
Route::resource('grades', App\Http\Controllers\GradeController::class)->middleware('auth');
Route::resource('transaction-details', App\Http\Controllers\TransactionDetailController::class)->middleware('auth');
Route::resource('transactions', App\Http\Controllers\TransactionController::class)->middleware('auth');
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware('auth');

Route::resource('commissions', App\Http\Controllers\CommissionController::class)->middleware('auth');