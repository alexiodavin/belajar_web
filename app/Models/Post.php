<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'strip_description',
        'cover_image'
    ];  
    public function coverImageUrl()
    {
        $path ="cover_image/";
        return asset($path.$this->cover_image);
    }
    
    

}
