<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $fillable=['title','description','category_id','advertiser_id','start_date'];

    /**
     * each ad has one category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * each ad has one advertiser
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(){
        return $this->belongsTo('App\Models\Advertiser');
    }

    /**
     * the ad belongs to many tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }


}
