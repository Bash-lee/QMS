<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;
    protected $primaryKey = 'station_id';
    protected $table = 'stations';

    protected $fillable = [
        'station_name_th',
        'station_name_en',
        'station_description',
    ];

    public function visitTodayCount()
    {
        $visit = Visit::where('station_id', $this->station_id)->whereDate('date', Carbon::today()->toDateString());
        return $visit->count();
    }
}
