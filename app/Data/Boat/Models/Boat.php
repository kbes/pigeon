<?php namespace App\Data\Boat\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'width', 'length', 'password'];

    public $timestamps = false;

    public function trips()
    {
        return $this->hasMany('App\Data\Trip\Models\Trip');
    }
}
