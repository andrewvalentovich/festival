<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'events';
    protected $guarded = [];
    protected $fillable = [];

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->image);
    }

    public function getDateDayMonthYearFormatAttribute()
    {
        return Date('d.m.Y', strtotime($this->date));
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
