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
        'id_ticket_category',
        'bukti_pembayaran',
        'status'
    ];

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class,'id_ticket');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function TicketCategory()
    {
        return $this->belongsTo(TicketCategory::class,'id_ticket_category');
    }
}
