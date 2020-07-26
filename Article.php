<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//     public function getRouetKeyName()
//     {
//         return 'slug';  //Article:where('slug'.$article)->first();
//     }

    protected $fillable = ['title','exerpt','body'];  //User::create(request()->all());  //admin/paying subscriber/active
 
    public function path()
    {
        return route('articles.show',$this);
    }

    public function author()
    {
         return $this->belongsTo(User::class,'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}


//An Article has many tags
//Tag Belongs to an Article


//Learn Laravel
//PHP,Laravel,Work,Education

