<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venue';
    protected $fillable =
    [
        'venue_name',
        'venue_capacity',
        'venue_location',
        'venue_pict',
    ];

    public function Ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
