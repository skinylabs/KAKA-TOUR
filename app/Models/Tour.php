<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function transports()
    // {
    //     return $this->hasMany(Transport::class);
    // }

    // public function rundowns()
    // {
    //     return $this->hasMany(Rundown::class);
    // }

    // public function hotels()
    // {
    //     return $this->hasMany(Hotel::class);
    // }
}
