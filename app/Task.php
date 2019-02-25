<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    protected $fillable=[
        'role_id','fio','create_id','name','status_id'
    ];


}
