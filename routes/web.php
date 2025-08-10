<?php

use App\Http\Controllers\ApiConsumerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodEmotionController;

//Página de bienvendia
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (protegido con autenticación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Panel de Administración (solo para administradores)
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin', 'setlocale'])
    ->name('admin.dashboard');


/*
|-----------------------------------------------------------
| Rutas públicas para registro de emociones
|-----------------------------------------------------------
|
| Estas rutas están abiertas (no requieren login). Reciben
| el código externo `employee_id` directamente en la URL.
|
*/
// Formulario para registrar ánimo de un employee_id dado
Route::get('/moods/{employee_id}/create', [MoodEmotionController::class, 'create'])
    ->name('moods.create') //Nombre de la ruta
    ->middleware('setlocale'); //Aplica el middleware de idioma

// Guardar emoción para ese employee_id
Route::post('/moods/{employee_id}', [MoodEmotionController::class, 'store'])
    ->name('moods.store')
    ->middleware('setlocale'); //Aplica el middleware de idioma

// Historial de emociones (usuario autenticado)
Route::get('/emotion/history', [MoodEmotionController::class, 'index'])
    ->name('emotion.index');
/*
|-----------------------------------------------------------
| Ruta para consumir la API externa de employee-uids
|-----------------------------------------------------------
|
| Llamada a tu otro proyecto para obtener o enviar UIDs.
|
*/
Route::get('/api/employee-uuids', function () {
    return response()->json([
        'E001',
        'E002',
        'E003',
    ]);
});

Route::get('/call-api', [ApiConsumerController::class, 'callExternalApi']);




// Rutas de perfil (requieren autentificación)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__ . '/auth.php';
