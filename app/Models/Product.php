<?php

namespace App\Models;

use App\Traits\hasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use hasImages ;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class , 'offer_product');
    }
}
