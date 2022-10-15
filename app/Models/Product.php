<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'sku', 
        'price', 
        'quantity',
        "location_id",
        "category_id",
        "subcatagory_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function subcatagory()
    {
        return $this->belongsTo(SubCatagory::class);
    }
}
