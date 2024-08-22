<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
       
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $cartDatas2 = DB::table('carts')
            ->join('users', 'users.id', '=', 'carts.customer_id')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('users.id', Auth::id()) 
            ->get();

        $cartDatas = [];

        foreach ($cartDatas2 as $index => $item) {
            $cartDatas["cartItem" . ($index + 1)] = [
                'total' => $item->sell_price * $item->qty,
            ];
        }

        //dd($cartDatas);
        $grandTotal = collect($cartDatas)->sum('total');

        $cartCount = Cart::where('customer_id', Auth::id())->count();

        $view->with('cart_info', [
                                    'cart_count' => $cartCount,
                                    'cart_total' =>  $grandTotal-400,
                                ]);
    }
}