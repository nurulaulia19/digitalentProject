<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = "pesanan";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function paketWisata() {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata');  // Define the relationship with PaketWisata model using foreign key 'paket_wisata_id'
    }
}
