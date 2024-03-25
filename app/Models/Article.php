<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\ArticleResource;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        "titre",
        "contenu",
        "user_id",
        "category_id",
        'file_path'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected function titre(): Attribute {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    protected function contenu(): Attribute {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    static public function articles(){
        $articles = ArticleResource::collection(self::select()->orderby('article')->get());
        $data =json_encode($articles);
        return json_decode($data, true);
    }
}
