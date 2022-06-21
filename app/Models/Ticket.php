<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ticket';

    protected $fillable = 
    [
        'ticket_name',
        'concert_date',
        'ticket_image',
        'id_artist',
        'id_venue',
    ];

    protected $casts = [
        'concert_date' => 'date:Y-m-d',
       
     ];

    public function Venues ()
    {
        return $this->belongsTo(Venue::class,'id_venue');
    }
    public function Artists ()
    {
        return $this->belongsTo(Artist::class,'id_artist');
    }
}
