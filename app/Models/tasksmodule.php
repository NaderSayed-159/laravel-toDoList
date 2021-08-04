<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasksmodule extends Model
{
    use HasFactory;

    protected $table = "tasks";



    protected $fillable = [
        'title',
        'describtion',
        'adder',
    ];

    public function add_by()
    {

        return  $this->belongsTo('App\Models\User', 'adder', 'id');
    }
}
