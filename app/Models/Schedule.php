<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   
    protected $table = 'schedule';

    protected $fillable = [
         'cname',
        'cnum',
        'date',
        'time',
        'message',
        'city',
        'estate',
        'status',
       
    ];


}
