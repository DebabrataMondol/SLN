<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'city', 'zipcode', 'country', 'occupation', 'instituteName', 'expertiseArea', 'about', 'user_id', 'interestedTopic'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
