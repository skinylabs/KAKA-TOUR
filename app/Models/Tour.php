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

    public function transportations()
    {
        return $this->hasOne(Transportation::class);
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

    //     public function rundown()
    //     {
    //         return $this->hasOne(Rundown::class);
    //     }
}
