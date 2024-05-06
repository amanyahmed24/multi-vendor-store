<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class deductProductQnt
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        foreach(Cart::get() as $item){
            Product::where('id',$item->product_id)->update([
                
                'qnt'   =>  DB::raw('qnt-'.$item->qnt)
            ]);
        }
    }
}