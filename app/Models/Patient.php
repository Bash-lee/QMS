<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'patient_id';
    protected $table = 'patients';

    protected $fillable = [
        'firstname',
        'lastname',
        'hn',
        'dob',
        'age',
        'gender',
        'card_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }

}
