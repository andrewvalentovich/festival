<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка фотографии к альбому (много фото к одному альбому)
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
    }

    public function getPreviewImageUrlAttribute()
    {
        return url('storage/' . $this->preview_image);
    }
}
