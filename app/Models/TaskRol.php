<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRol extends Model
{
    use HasFactory;

    protected $table = "tasks_roles";
    protected $primaryKey = ["user_id","task_id"];
    public $incrementing = false;

    protected $fillable=[
        "user_id",
        "task_id"
    ];

    protected $hidden=[];


}
