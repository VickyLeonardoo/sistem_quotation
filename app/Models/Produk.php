<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function quotation()
    {
        return $this->belongsToMany(Quotation::class)->withPivot('quantity');
    }

    public function quotationProduk()
    {
        return $this->hasMany(QuotationProduk::class);
    }
}
