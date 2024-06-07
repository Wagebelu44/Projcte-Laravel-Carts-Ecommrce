<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = [];

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

    public function cart_details(): BelongsTo
    {

        return $this->belongsTo(\App\Models\CartDetail::class, 'cart_details_id');

    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('amrecan_price', 'like', "%$search%")
                    // ->orWhere('amrecan_price' , 'like', "%$search%")
                    // ->orWhere('cart_details->cart_name->ar' , 'like', "%$search%")
                ->orWhere('count_of_buy', 'like', "%$search%");

        });
    }//end ofscopeWhenSearch

} //end of model
