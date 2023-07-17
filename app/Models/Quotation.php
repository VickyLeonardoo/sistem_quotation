<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function keranjang(){
        return $this->belongsTo(Keranjang::class);
    }

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'quotation_produks')->withPivot('quantity');
    }

    public function quotationProduk()
    {
        return $this->hasMany(QuotationProduk::class);
    }

    public function Invoice(){
        return $this->hasMany(Invoice::class);
    }
}
