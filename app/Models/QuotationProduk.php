<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
