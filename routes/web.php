<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OureventController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\SingleEventController;
use App\Http\Controllers\PhotoGallaryController;
use App\Http\Controllers\ReunionReportController;
use App\Http\Controllers\WelfareReportController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RelationalinfoController;
use App\Http\Controllers\SslCommerzPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', FrontendController::class);

Route::get('/frontend-committee', [CommitteeController::class, 'index_frontend'])->name('frontend-committee');
Route::get('/frontend-committee-details/{committee}', [CommitteeController::class, 'show_frontend'])->name('frontend-committee-details');
Route::resource('/members', MemberController::class);
Route::get('/search', [MemberController::class, 'searchOption'])->name('members.search');

Route::get('/faculties/{faculties}/members', [MemberController::class, 'facultyList'])->name('faculties.members');
Route::resource('/single-event', SingleEventController::class);
Route::resource('/event', OureventController::class);
Route::resource('/gallary', PhotoGallaryController::class);
Route::resource('/contact', ContactController::class);

Route::post('/admin/status-update', [AdminController::class, 'updateUserStatus'])->name('admin.update-status');
Route::post('/admin/active-status', [AdminController::class, 'updateActiveStatus'])->name('admin.active-status');



require __DIR__ . '/auth.php';
Route::get('/symlink', function () {
    Artisan::call('storage:link');
    
});
Route::get('/optimize', function () {
    Artisan::call('optimize');
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
});



Route::middleware('auth')->group(function () {

    Route::get('edit-my-profile', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::get('profiles/pdf/', [ProfileController::class, 'downloadPdf'])->name('profiles.pdf');
    Route::patch('update-my-profile', [ProfileController::class, 'update'])->name('profiles.update');
    Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update-password');
    Route::resource('/committee', CommitteeController::class);


    // Route::resource('/',AdminController::class);
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/member_-list', [AdminController::class, 'memberList'])->name('member-list');
        Route::get('/export-memberlists', [AdminController::class,
            'exportMemberLists'])->name('export-memberlists');
        Route::post('payment/status-update', [PaymentController::class, "updatePaymentStatus"])->name('payment.update-status');
        Route::resource('payment', PaymentController::class);

        Route::resource('profiles', ProfileController::class)->except([
            'edit', 'update', 'destroy'
        ]);

        Route::resource('relationalinfos', RelationalinfoController::class);
        Route::resource('events', EventController::class);
        Route::resource('galleries', GallaryController::class);
        Route::resource('faculties', FacultyController::class);
        Route::resource('notices', NoticeController::class);
        Route::resource('nominees', NomineeController::class);
        Route::resource('reunionreports', ReunionReportController::class);
        Route::get('/export-reunionreports', [ReunionReportController::class,
            'exportReunionReports'])->name('export-reunionreports');
        Route::resource('welfarereports', WelfareReportController::class);
        Route::get('/export-welfarereports', [WelfareReportController::class,
            'exportWelfareReports'])->name('export-welfarereports');
    });
});

Route::resource('/admin', AdminController::class)->middleware(['auth', 'verified']);


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
