<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function setNameAttribute($value){

        $this->attributes['name'] = Str::ucfirst($value);
    }
    public function setCategoryAttribute($value){

        $this->attributes['category'] = Str::ucfirst($value);
    }
    public function setBrandAttribute($value){

        $this->attributes['brand'] = Str::ucfirst($value);
    }
}
