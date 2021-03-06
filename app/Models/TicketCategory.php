<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_categories';
    protected $fillable = 
    [
        'ticket_category',
        'ticket_price',
        'e_ticket',
        'id_ticket',
    ];

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class,'id_ticket');
    }

    public function TicketImage()
    {
        return $this->hasOne(TicketImage::class);
    }

}
