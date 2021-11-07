<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    //
    protected $fillable=['name','email','phone'];

    /**
     * each advertiser has many ads
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads(){
        return $this->hasMany('App\Models\Ad');
    }
}
