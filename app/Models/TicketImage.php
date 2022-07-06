<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ticket_image';

    protected $fillable = 
    [
        'ticket_image',
        'e_ticket',
        'id_categories',
    ];

    public function TicketCategories()
    {
        return $this->belongsTo(TicketCategory::class,'id_categories');
    }
}
