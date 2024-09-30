<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'hotel_name', 'participant_name', 'room_number'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
