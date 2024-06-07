<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CartDetail extends Model
{
    use HasTranslations;

    public $translatable = ['cart_name', 'cart_text', 'short_descript'];

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    } //end of get image path

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    public function sub_category(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_category_id');

    }
} //end of models
