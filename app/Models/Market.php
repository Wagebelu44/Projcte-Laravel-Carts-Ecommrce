<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Market extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    protected $appends = ['image_path'];

    public function user(): BelongsTo
    {

        return $this->belongsTo(\App\Models\User::class);

    }

    public function Product(): HasMany
    {

        return $this->hasMany(\App\Models\Product::class, 'market_id');

    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_categories_id');
    }

    public function getImagePathAttribute()
    {
        if ($this->image == 'default.png') {

            return asset('uploads/market_images/'.$this->image);
        }

        return asset('storage/'.$this->image);

    } //end of get image path

} //end of model
