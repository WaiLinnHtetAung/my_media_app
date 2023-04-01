<?php

namespace App\Models;

use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements HasMedia
{
    protected $fillable=['title', 'description', 'image', 'category_id'];

    use HasFactory;
    use InteractsWithMedia;

    protected function category() {
        return $this->belongsTo(Category::class);
    }

    public function getPostPhotoAttribute()
    {
        $file = $this->getMedia('post')->first();
        logger($file);
        // if ($file) {
        //     $file->url       = $file->getUrl();
        //     $file->thumbnail = $file->getUrl('thumb');
        //     $file->preview   = $file->getUrl('preview');
        // }

        return $file;
    }
}
