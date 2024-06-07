<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HowUse extends Model
{
    use HasTranslations;

    protected $table = 'how_uses';

    public $translatable = ['description'];

    protected $guarded = [];

    public function sub_category(): BelongsTo
    {

        return $this->belongsTo(\App\Models\Sub_Category::class, 'sub_categorys_id');

    }
}//end of model
