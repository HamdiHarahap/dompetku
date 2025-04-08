<?php

use App\Models\Card;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cards = Card::all();

    $data = [
        'cards' => $cards,
        'saldo' => $cards->sum('saldo')
    ];

    return view('home', $data);
});
