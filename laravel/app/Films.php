<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function comments()
    {
        return $this->hasMany('App\FilmsComments','film_id','id')->orderBy('id','desc');
    }
}
