<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('backend.coupons.create');
    }

    public function store(Request $request)
    {
        
        $data = [
            'code' => $request->code,
            'type' => $request->type,
            'balance' => $request->balance,
            'percentage' => $request->percentage,                      
        ];

        Coupon::create($data);

        return redirect()
            ->route('coupons.index')
            ->withMessage('Created Successfully!');
    }

    public function edit(Coupon $coupon)
    {
        return view('backend.coupons.edit', compact('coupon'));
    }

    public function update(Request $request,Coupon $coupon)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type,
            'balance' => $request->balance,
            'percentage' => $request->percentage,   
            
        ];


        $coupon->update($data);

        return redirect()
            ->route('coupons.index')
            ->withMessage('Updated Successfully!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()
            ->route('coupons.index')
            ->withMessage('Deleted Successfully!');
    }

    public function coupon(Request $request)
    
    {      
        
        
        $coupon = Coupon::where('code', $request->code)->first();
        
        if (!$coupon) {
            return redirect()->back()->with([
                'message' => 'Invalid Coupon Code ',
            ]);
          }

        if ($coupon) {

            if ($coupon->type == '0') {

                if($coupon->used == '1'){
                return redirect()->back()->with([
                    'message' => 'This Coupon Code is already used!!'
                
                ]);
            }
                else{
                    $price = Product::latest()->first();
                    $total_price = $price->price;
                    $discount = $coupon->percentage;
                    // calculate the discount amount
                    $discount_amount = $total_price * ($discount / 100);
                    // deduct the discount amount from the total
                    $total = $total_price - $discount_amount;

                    session()->put('total', $total);
                    $coupon->used = 1;
                    $coupon->save();
                    
                    return redirect()->back()->with([
                        'message' => 'Congratulation Coupon Applied!!'
                    
                    ]);
                   
                }
                 
            }
            } 
            }
            
          }
    

