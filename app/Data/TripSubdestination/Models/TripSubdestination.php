<?php namespace App\Data\TripSubdestination\Models;

use Illuminate\Database\Eloquent\Model;

class TripSubdestination extends Model
{
    protected $table = 'trip_subdestinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function subdestination()
    {
        return $this->belongsTo('App\Data\Subdestination\Models\Subdestination');
    }

}
