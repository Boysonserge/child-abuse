<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/cases', [CasesController::class, 'index'])->name('cases.index');
    Route::post('cases', [CasesController::class, 'store'])->name('cases.store')->middleware(['role:victim']);
    Route::get('/cases/create', [CasesController::class, 'create'])->name('cases.create')->middleware(['role:victim']);
    Route::get('/cases/{case}', [CasesController::class, 'show'])->name('cases.show');
    Route::get('view/case/{case}', [CasesController::class, 'viewCase'])->name('cases.view');

    Route::put('/cases/{case}', [CasesController::class, 'update'])->name('cases.update');
    Route::delete('/cases/{case}', [CasesController::class, 'destroy'])->name('cases.destroy');
    Route::get('/cases/{case}/edit', [CasesController::class, 'edit'])->name('cases.edit');
    Route::get('/cases/{case}/report', [CasesController::class, 'report'])->name('cases.report');
    Route::get('/cases/{report}/getReport', [CasesController::class, 'getReport'])->name('cases.getReport');
    Route::post('cases/sendReport/{caseId}', [CasesController::class, 'sendReport'])->name('cases.sendReport');



    Route::get('profile', [ProfileController::class,'index'])->name('profile.index');
    Route::post('profile', [ProfileController::class,'update'])->name('profile.update');

    Route::group(['middleware' => ['role:rib']], function () {
        //Approving Cases
        Route::put('/cases/{case}', [CasesController::class, 'approve'])->name('cases.approve');
        Route::get('/cases/{case}/approve', [CasesController::class, 'approve'])->name('cases.approve');



        //Rejecting Cases
        Route::put('/cases/{case}', [CasesController::class, 'reject'])->name('cases.reject');
        Route::get('/cases/{case}/reject', [CasesController::class, 'reject'])->name('cases.reject');

        Route::resource('users', UserController::class);

        Route::get('/ribcase/create', [CasesController::class, 'create2'])->name('rib.createcase');
        Route::post('/ribcase', [CasesController::class, 'store2'])->name('rib.storecase');


        Route::get('export',[ReportController::class,'export'])->name('export');
    });
    Route::resource('report', ReportController::class);

});
