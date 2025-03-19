<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClassData extends Model
{
    protected $guarded = [];

    protected $table = 'classes';

    public function sections()
    {
        return $this->hasMany(Section::class,'class_id');
    }
}
