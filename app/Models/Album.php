<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'albums';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка альбома к фотографиям (один альбом к нескольким фотографиям)
    public function photos()
    {
        return $this->HasMany(Photo::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
