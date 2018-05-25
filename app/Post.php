<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey='Id';
    protected $table = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = ['Heading','Text','UserName','UserId',];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}

