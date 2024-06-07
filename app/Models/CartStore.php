<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CartStore extends Model
{
    use HasTranslations;

    protected $guarded = [];

    protected $table = 'cart_stores';

    public $translatable = ['cart_name'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    public function sub_category(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_category_id');

    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Product::class, 'products_id');
    }
}//end of models
