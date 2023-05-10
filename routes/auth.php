<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EntregasController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProducaoController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


    Route::group(['middleware' => ['role_or_permission:super-admin|entregar']], function () {

        Route::get('entregas', [EntregasController::class, 'index'])
            ->name('entregas.index');

        Route::post('entregas/{id}', [EntregasController::class, 'update'])
            ->name('entregas.update');
    });

    Route::group(['middleware' => ['role_or_permission:super-admin|produzir']], function () {

        Route::get('producao', [ProducaoController::class, 'index'])
            ->name('producao.index');

        Route::get('producao/adicionar', [ProducaoController::class, 'create'])
            ->name('producao.create');

        Route::post('producao/adicionar', [ProducaoController::class, 'store'])
            ->name('producao.store');

        Route::get('producao/editar/{id}', [ProducaoController::class, 'edit'])
            ->name('producao.edit');

        Route::delete('producao/{id}', [ProducaoController::class, 'destroy'])
            ->name('producao.destroy');

        Route::put('producao/{id}', [ProducaoController::class, 'update'])
            ->name('producao.update');

        Route::get('estoque', [EstoqueController::class, 'index'])
            ->name('estoque.index');

        Route::post('estoque/{id}', [EstoqueController::class, 'update'])
            ->name('estoque.update');
    });
});
