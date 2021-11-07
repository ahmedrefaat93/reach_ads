<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['title','description'];
    /**
     * each category has many ads
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads(){
        return $this->hasMany('App\Models\Ad');
    }
}
