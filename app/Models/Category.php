<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function instrument(): BelongsToMany
    {
        return $this->belongsToMany(Instrument::class, 'instrument_category');
    }
}
