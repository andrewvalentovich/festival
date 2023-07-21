<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'articles';
    protected $guarded = [];
    protected $fillable = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
    ];

    public function getCreatedDateDayMonthYearFormatAttribute()
    {
        return Date('d.m.Y', strtotime($this->created_at));
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
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
