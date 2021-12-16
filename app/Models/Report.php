<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'citizen_number', 'citizen_number');
    }
}
