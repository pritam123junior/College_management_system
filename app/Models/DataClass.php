<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id');
    }
}
