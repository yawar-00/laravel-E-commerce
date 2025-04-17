<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users1 extends Model
{
    use HasFactory;
    // protected $table ='users1s';
    // protected $fillable=['name','email']; 
    public function post(){
        return $this->belongsToMany(post::class,'post');
    }
}