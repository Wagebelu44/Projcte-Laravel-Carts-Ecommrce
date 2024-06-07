<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class WalletDatabase extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['cart_name', 'cart_text', 'short_descript'];

    public function user(): BelongsTo
    {

        return $this->belongsTo(\App\Models\User::class, 'users_id');

    }

    public function sub_category(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_category_id');

    }

    public function Market(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Market::class, 'market_id');

    }

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/cart_images/'.$this->image);

    }//end of get image path

}//end of model
