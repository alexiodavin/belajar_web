<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'slug',
        'strip_description',
        'cover_image',
        'is_featured'
    ];  
    public function coverImageUrl()
    {
        $path ="cover_image/";
        return asset($path.$this->cover_image);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);    
    }
    
        
    

}
