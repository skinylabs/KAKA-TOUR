<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;


    protected $fillable = [
        'tour_id',
        'vehicle',
        'name',
        'group',
        'room_number',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
