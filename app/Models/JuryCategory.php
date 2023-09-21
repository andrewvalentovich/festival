<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuryCategory extends Model
{
    use HasFactory;

    protected $table = 'jury_categories';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка категории к жюри (одна категория к нескольким жюри)
    public function jury()
    {
        return $this->HasMany(Jury::class);
    }

    // Привязка категории к обращениям (одна категория к нескольким обращениям)
    public function appeals()
    {
        return $this->HasMany(Appeal::class);
    }
}
