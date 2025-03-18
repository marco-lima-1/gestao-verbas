<?php
use App\Http\Controllers\AcaoMarketingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AcaoMarketingController::class, 'index'])->name('acoes.index');

Route::get('/marketing', function () {
    return view('marketing');
});

Route::get('/acoes', [AcaoMarketingController::class, 'index'])->name('acoes.index');
Route::post('/acoes', [AcaoMarketingController::class, 'store'])->name('acoes.store');
Route::put('/acoes/{id}', [AcaoMarketingController::class, 'update'])->name('acoes.update');
Route::delete('/acoes/{id}', [AcaoMarketingController::class, 'destroy'])->name('acoes.destroy');

