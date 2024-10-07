<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= "_category";
    protected $primarykey= "id";
    protected $fillable= [
        "name",
        "status"
    ];

    public function products()
    {
        return $this ->hasMany(product::class,'cat_id') ;
    }



    use HasFactory;
}
