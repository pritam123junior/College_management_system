<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassData extends Model
{
    protected $guarded = [];

    protected $table = 'classes';

    public function sections()
    {
        return $this->hasMany(Section::class,'class_id');
    }
}
