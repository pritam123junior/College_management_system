<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(ClassData::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    

}
