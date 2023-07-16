<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка альбома к фотографиям (один альбом к нескольким фотографиям)
    public function photos()
    {
        return $this->HasMany(Photo::class);
    }
}
