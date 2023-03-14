<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'Name', 'Description',  'image', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public $appends = ['image_for_web'];

    public function getImageForWebAttribute(){

        if($this->image)
            return asset('assets/upload/product/'.$this->image);
        else
            return asset('assets/upload/default.png');

    }
}
