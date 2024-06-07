<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Purchase extends Model
{
    use HasTranslations;

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/pay_currencie/'.$this->image);

    } //end of get image path

    public $translatable = ['cart_name', 'cart_text', 'short_descript'];

    public function sub_category(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_category_id');

    }//end of sub_category

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }//end of users

}//end of models
