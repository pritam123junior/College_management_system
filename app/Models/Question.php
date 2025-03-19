<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(exam::class);
    }

    public function mainquestion()
    {
        return $this->belongsTo(MainQuestion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
