<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GenerateCart extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['cart_name', 'cart_text'];

    public function user()
    {

        return $this->belongsTo(\App\Models\User::class, 'users_id');

    }

    public function sub_category()
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_category_id');

    }

    public function Market()
    {

        return $this->belongsTo(\App\Models\Market::class, 'market_id');

    }
}//end of model
