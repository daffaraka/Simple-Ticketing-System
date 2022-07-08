<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NIB extends Model
{
    use HasFactory;

    protected $table = 'nib';

    protected $primaryKey = 'id_nib';
    protected $fillable =
    [
        'id_user',
        'nib_pict'
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
