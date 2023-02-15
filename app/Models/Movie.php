<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'edad',
    ];

    public function getDescriptionAttribute($value){
        return substr($value, 1, 120);
    }

    public function sala()
    {
        return $this->hasMany(Sala::class)->withinTimestamps();
    }
}
