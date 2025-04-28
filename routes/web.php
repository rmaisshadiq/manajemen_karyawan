<?php

use App\Http\Controllers\KaryawanController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('karyawan', [KaryawanController::class,'store'])->name('karyawan.store');
Route::get('karyawan/{id}/edit', [KaryawanController::class,'edit'])->name('karyawan.edit');
Route::put('karyawan/{id}', [KaryawanController::class,'update'])->name('karyawan.update');
Route::delete('karyawan/{id}', [KaryawanController::class,'destroy'])->name('karyawan.destroy');
Route::get('karyawan/trash', [KaryawanController::class, 'trash'])->name('karyawan.trash');
Route::put('karyawan/restore/{id}', [KaryawanController::class, 'restore'])->name('karyawan.restore');
Route::delete('karyawan/force-delete/{id}', [KaryawanController::class, 'forceDelete'])->name('karyawan.forceDelete');
