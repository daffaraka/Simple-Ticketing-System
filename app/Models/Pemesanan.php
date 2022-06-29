<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = 
    [
        'nama_pengunjung',
        'email_pengunjung',
        'nomor_pengunjung',
        'jumlah_ticket',
        'total',
        'id_ticket',
        'id_user',
        'status'
    ];
}
