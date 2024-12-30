<?php

use App\Livewire\HomePage;
use App\Livewire\PackagesPage;
use App\Livewire\PackageDetailPage;
use App\Livewire\AboutUsPage;
use App\Livewire\UmrohRegisterPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/packages', PackagesPage::class);
Route::get('/about-us', AboutUsPage::class);
Route::get('/packages/{slug}', PackageDetailPage::class);

Route::middleware('guest')->group(function (){
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class);
    Route::get('/reset', ResetPasswordPage::class);
});

Route::middleware('auth')->group(function (){
    Route::get('/logout', function (){
        auth()->logout();
        return redirect('/');
    });
    Route::get('/umroh-register', UmrohRegisterPage::class);
});




