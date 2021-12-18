<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'fullname',
        'citizen_number',
        'picture',
        'birthday',
        'gender',
        'nationality',
        'phone_number',
        'fingerprint',
        'dna_code'
    ];

    protected $hidden = [
        'comments'
    ];

    public function report()
    {
        return $this->belongsTo(Profile::class, 'citizen_number', 'citizen_number');
    }
}
