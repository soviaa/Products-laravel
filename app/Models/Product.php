<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['title','price','status','quantity','order'];

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
