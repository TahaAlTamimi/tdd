<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author'
    ];

    public function setAuthorIdAttribute($author){

        $this->attributes['author_id']=Author::firstOrCreate([
            'name'=>$author
        ])->id;
    }
}
