<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $guarded = [];
    protected $fillable = [];

    public function getLogoImageUrlAttribute()
    {
        return url('storage/' . $this->logo_image);
    }
}
