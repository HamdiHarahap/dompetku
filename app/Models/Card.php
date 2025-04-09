<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pengeluarans(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }

    public function tabungans(): HasMany
    {
        return $this->hasMany(Tabungan::class);
    }
}
