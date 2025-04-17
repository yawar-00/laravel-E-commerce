<?php

namespace App\Models;

use App\Models\Users1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    // protected $table ='posts';
    // protected $fillable=['post']; 
    public function user(){
        return $this->belongsToMany(Users1::class,'users1s');
    }
}
