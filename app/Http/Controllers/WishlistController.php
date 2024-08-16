<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Add this import if not already present
use Illuminate\Support\Facades\Auth;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wishlists = DB::table('wishlists')
        ->join('users', 'users.id', '=', 'wishlists.customer_id')
        ->join('products', 'products.id', '=', 'wishlists.product_id')
        ->where('users.id', Auth::id()) // Correct table name
        ->get();
        //dd($wishlists);

        /* $wishlists = [
            'product1'=>[
                'product_name'=>'Ultra Wireless S50 Headphones S50 with Bluetooth',
                'unit_price'=>1100,
                'is_instock'=>false,
            ],
            'product2'=>[
                'product_name'=>'Widescreen NX Mini F1 SMART NX 1',
                'unit_price'=>685.00,
                'is_instock'=>true,
            ],
            'product3'=>[
                'product_name'=>'Widescreen NX Mini F1 SMART NX 2',
                'unit_price'=>685.00,
                'is_instock'=>false,
            ],
        ]; */
        return view('shop/wishlist',['wishlists'=>$wishlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        //dd('store');
        $data = $request->only('product_id');
        $data['customer_id']=Auth::id();
        //dd($data);
        //We have check if the product is already added to the store
        // Check if the product is already added to the wishlist
        $exists = Wishlist::where('product_id', $data['product_id'])
        ->where('customer_id', $data['customer_id'])
        ->exists();

        if ($exists) {
            return back()->with('info', 'Product is already in your wishlist.');
        }

        Wishlist::create($data);
        return back()->with('success','Product added to wishlist successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}