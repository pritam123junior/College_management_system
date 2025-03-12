<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   
    protected $guarded = [];
    

    public function student()
    {
        return $this->hasOne(Student::class);
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime'            
        ];
    }
}
