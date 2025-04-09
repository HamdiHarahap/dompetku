<?php

use App\Models\Card;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cards = Card::all();
    $transaksi = Transaksi::orderBy('id', 'desc')->get();
    $tabungan = Tabungan::all();

    $data = [
        'cards' => $cards,
        'saldo' => $cards->sum('saldo'),
        'transaksi' => $transaksi,
        'tabungan' => $tabungan->sum('saldo')
    ];

    return view('home', $data);
});
