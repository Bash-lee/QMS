<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $primaryKey = 'visit_id';
    protected $table = 'visits';

    protected $fillable = [
        'visit_order',
        'user_id',
        'station_id',
        'finish'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'user_id', 'user_id');
    }

    public function station()
    {
        return $this->belongsTo('App\Models\Station', 'station_id', 'station_id');
    }
}
