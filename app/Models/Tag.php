<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable=['title','description'];

    /**
     * the tag belongs to many ads
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ads()
    {
        return $this->belongsToMany('App\Models\Ad');
    }
}
