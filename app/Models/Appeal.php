<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $table = 'appeals';
    protected $guarded = [];
    protected $fillable = [];

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
    }

    // Привязка обращения к категории (много обращений к одной категории)
    public function category()
    {
        return $this->belongsTo(JuryCategory::class, 'category_id', 'id');
    }
}
