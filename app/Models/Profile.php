<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    public function report()
    {
        return $this->belongsTo(Profile::class, 'citizen_number', 'citizen_number');
    }
}
