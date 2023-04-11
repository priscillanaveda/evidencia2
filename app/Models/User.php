<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    // ...

    public static function boot()
    {
        parent::boot();

        static::updated(function ($order) {
            if ($order->status === 'entregado') {
                $product = Product::find($order->product_id);
                $product->stock -= $order->quantity;
                $product->save();
            }
        });
    }

    // ...
}

