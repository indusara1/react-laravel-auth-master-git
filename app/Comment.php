<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey='Id';
    protected $table = 'Comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = ['PostId','UserId','UserName','Comment',];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
