<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [   
        'date', 'title', 'post', 'post_except', 'slug', 'userId', 'featuredImage', 'metaDescription', 'views', 'jsonData'
    ];

    public function tag(){
        return $this->belongsToMany('App\Tag', 'blogtags');
    }

    public function cat(){
        return $this->belongsToMany('App\Category', 'blogcategories');
    }

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
