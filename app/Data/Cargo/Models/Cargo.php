<?php namespace App\Data\Cargo\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'width', 'length', 'category_id'];
    protected $table = 'cargo';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Data\Category\Models\Category');
    }

}
