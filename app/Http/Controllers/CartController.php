<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    public $cartItems;
    public function cart()
    {
        $cartItems = Cart::content();
        return view('website.cart.index',['products'=>$cartItems]);
    }
    public $product;
    public function store(Request $request)
    {
        $this->product = Product::find($request->id);
        Cart::add([
                    'id' =>$request->id,
                    'name' =>$this->product->name,
                    'qty' => $request->qty,
                    'price'=> $this->product->selling_price,
                    'weight'=>1,
                    'options'=>[
                        'size'=> $this->product->size,
                        'color'=> $this->product->color,
                        'image' => $this->product->product_image,
                    ]
                    ]);
                    return redirect('/product/cart');
    }
    public function update(Request $request, $rowId)
    {
    $validated = $request->validate([
        'qty' => 'required|integer|min:1'
    ]);

    Cart::update($rowId, $request->qty);

    return redirect()->back()->with('success', 'Quantity updated!');
    }

    public function destroy($rowId)
    {
        Cart::destroy($rowId);
        return redirect()->back()->with('delete','Item Removed From Cart');
    }
}
