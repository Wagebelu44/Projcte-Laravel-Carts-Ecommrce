<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class sub_category extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    public function parent_category(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Parent_Category::class, 'parent_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function howuse(): HasMany
    {
        return $this->hasMany(\App\Models\HowUse::class, 'sub_categorys_id');
    }

    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    }//end of get image path

}//end of model
