<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\TransaksiController;
use App\Models\Card;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cards = Card::orderBy('saldo', 'desc')->take(2)->get();
    $transaksi = Transaksi::latest()->take(5)->get();
    $tabungan = Tabungan::all();

    $data = [
        'cards' => $cards,
        'saldo' => $cards->sum('saldo'),
        'transaksi' => $transaksi,
        'tabungan' => $tabungan->sum('saldo')
    ];

    return view('home', $data);
})->name('home');

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/tambah-transaksi', [TransaksiController::class, 'create']);
Route::get('/kartu', [CardController::class, 'index']);
Route::get('/kartu/{nama}', [CardController::class, 'show']);

Route::post('/tambah-transaksi', [TransaksiController::class, 'store'])->name('tambah-transaksi');