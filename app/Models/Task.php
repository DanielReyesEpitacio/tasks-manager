<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "description",
        "deadline",
        "comments"
    ];

    protected $hidden=[
        
    ];

    
    public function users(){
        return $this->belongsToMany(User::class,'tasks_roles');
    }
}
