<?php

use App\Http\Controllers\Settings;
use App\Livewire\Pages\Branch\BranchPage;
use App\Livewire\Pages\DashboardPage;
use App\Livewire\Pages\Employee\EmployeePage;
use App\Livewire\Pages\Section\SectionPage;
use App\Livewire\Pages\Status\StatusPage;
use App\Livewire\Pages\Task\TaskPage;
use App\Livewire\Pages\User\UserPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardPage::class)->name('dashboard');
    Route::get('/tasks', TaskPage::class)->name('tasks');
    Route::get('/employee', EmployeePage::class)->name('employee');
    Route::get('/branch', BranchPage::class)->name('branch');
    Route::get('/section', SectionPage::class)->name('section');
    Route::get('/status', StatusPage::class)->name('status');
    Route::get('/user', UserPage::class)->name('user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

require __DIR__.'/auth.php';
