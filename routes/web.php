<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Livewire\VehicleIndex;
use App\Livewire\AssistanceIndex;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/register-client', [RegisterController::class, 'vistaCreateClient'])->name('register-client');
Route::post('/register-client', [RegisterController::class, 'createClient'])->name('create-client');
Route::get('/register-workshop', [RegisterController::class, 'vistaCreateWorkshop'])->name('register-workshop');
Route::post('/register-workshop', [RegisterController::class, 'createWorkshop'])->name('create-workshop');
Route::get('/suscription', [HomeController::class, 'suscription'])->name('suscription');


// RUTAS PARA TODOS LOS CLIENTES
Route::middleware(['auth', 'verificarTipoUsuario:0'])->group(function () {
    //Route::get('/panel/assistance', [PanelController::class, 'assistance'])->name('assistance');
    Route::get('/panel/assistance', [PanelController::class, 'assistance'])->name('assistance');
    Route::get('/panel/vehicle', [PanelController::class, 'vehicle'])->name('vehicle');
    Route::get('/panel/profile', [PanelController::class, 'profile'])->name('profile');
    Route::get('/panel/assistance/show/{id}', [PanelController::class, 'showAssistance'])->name('show-assistance');
    Route::get('/panel/assistance/requests/{id}', [PanelController::class, 'requests'])->name('requests');
    Route::get('/panel/assistance/paid/{id}', [PanelController::class, 'paid'])->name('paid');
    Route::get('/panel/wallet', [PanelController::class, 'wallet'])->name('wallet');

});

Route::middleware(['auth', 'verificarTipoUsuario:1', 'usuarioSuscrito'])->group(function () {
    Route::get('/workshop/assistance', [WorkshopController::class, 'index'])->name('w-assistance');
    Route::get('/workshop/technicians', [WorkshopController::class, 'misTecnicos'])->name('w-technician');
    Route::get('/workshop/assistance/prewview/{id}', [WorkshopController::class, 'preVisualizarSolicitud'])->name('w-preview');
    Route::get('/workshop/assistance/show/{id}', [WorkshopController::class, 'show'])->name('w-showAssistance');
});

Route::middleware(['auth', 'verificarTipoUsuario:1'])->group(function () {

    Route::get('/workshop/profile', [WorkshopController::class, 'profile'])->name('w-profile');
    Route::get('/workshop/wallet', [WorkshopController::class, 'wallet'])->name('w-wallet');
});

Route::middleware(['auth', 'verificarTipoUsuario:2'])->group(function () {
    Route::get('/workshop/tasks', [TaskController::class, 'index'])->name('w-task');
    Route::get('/workshop/tasks/report/{id}', [TaskController::class, 'makeReport'])->name('w-task-report');
});

Route::get('/user/invoice/{invoice}', function (Request $request, string $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId);
});