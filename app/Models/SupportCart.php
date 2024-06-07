<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SupportCart extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['cart_type', 'name_cart', 'details_cart'];

    public function cliant(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliant::class);
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/user_images/'.$this->image);

    }//end of get image path

}//end of model
