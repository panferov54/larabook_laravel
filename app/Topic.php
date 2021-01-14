<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use \Esensi\Model\Model;

class Topic extends Model
{
    public $primaryKey='id';
    public $table='topics';
    public $fillable=['topicname','created_at','updated_at'];
     public $rules=['topicname'=>['required','max:128','unique']];

}
