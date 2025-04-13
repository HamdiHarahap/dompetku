<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transksi = Transaksi::all();

        return view('transaction', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cards = Card::all();

        return view('add-transaction', compact('cards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_transaksi' => 'required',
            'keperluan' => 'required',
            'card_id' => 'required',
            'nominal' => 'required|numeric',
        ], [
            'tipe_transaksi.required' => 'Tipe transaksi harus diisi',
            'keperluan.required' => 'Keperluan harus diisi',
            'card_id.required' => 'Pilih Kartu yang ingin digunakan',
            'nominal.required' => 'Nominal harus diisi',
        ]);

        $card = Card::where('id', $request->card_id)->first();

        if ($request->tipe_transaksi === 'pengeluaran') {
            if ($card->saldo < $request->nominal) {
                return redirect()->back()->with('error', 'Saldo tidak cukup');
            }
            $card->saldo -= $request->nominal;
        } else {
            $card->saldo += $request->nominal;
        }
        $card->save();
        
        
        Transaksi::create([
            'keperluan' => $request->keperluan,
            'jumlah' => $request->nominal,
            'card_id' => $request->card_id,
            'kategori' => $request->tipe_transaksi,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
