<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

        public function applyCoupon(Request $request, Coupon $coupon)
    {
        //dd($request->coupon_code);

        //Set this coupon code in session
        $couponCode = $request->coupon_code;

        //Check with coupon table if the coupon is valid or not
        

         // Set the coupon code in the session
        //session()->put('applied_coupon', $couponCode);

        // Optionally, you can return a response or redirect
        return redirect()->back()->with('success', 'Coupon code applied successfully!');

    }

}
