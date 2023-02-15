<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'movie_id',
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class)->withinTimestamps();
    }
}
