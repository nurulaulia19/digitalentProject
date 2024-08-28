<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;
    protected $table = "paket_wisata";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function pesanan() {
        return $this->hasMany(Pesanan::class, 'paket_wisata');
    }
}
