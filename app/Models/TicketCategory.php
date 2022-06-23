<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'ticket_category',
        'ticket_price',
        'id_ticket',
    ];

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class,'id_ticket');
    }

}
