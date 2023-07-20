<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    use HasFactory;

    protected $table = 'jury';
    protected $guarded = [];
    protected $fillable = [];

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
    }
}
