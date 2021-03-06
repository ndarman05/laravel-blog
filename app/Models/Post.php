<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute($value){
        
        $imageUrl = "";
        
        if(!is_null($this->image)){
            $imagePath = public_path() . "/img/" . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
        }

        return $imageUrl;
    }

    public function getDateAttribute($value){
        return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value){
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL ;
    }

    public function getExcerptHtmlAttribute($value){
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL ;
    }

    public function scopeLatestFirst(){
        return $this->orderBy('created_at', 'desc');
    }

    
}
