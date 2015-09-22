<?php namespace App\Data\Cargo\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = 'cargo';

    public function category()
    {
        return $this->belongsTo('App\Data\Category\Models\Category');
    }

}
