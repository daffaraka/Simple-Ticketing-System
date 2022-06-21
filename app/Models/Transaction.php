<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transactions';

    protected $fillable = [
        'transaction_status',
        'qty',
        'total',
        'id_ticket',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'id_ticket');
    }
}
