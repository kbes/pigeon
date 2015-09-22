<?php namespace App\Data\Trip\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function boat()
    {
        return $this->belongsTo('App\Data\Boat\Models\Boat');
    }
}
