<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function AllCategoryPage(Request $request)
    {
        $keyword = $request->keyword;
        $product = Product::with('category')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->latest()->get();
        return view('home.allcategory', compact('product'));
    }
    public function CategoryPage(Request $request, $id)
    {
        $keyword = $request->keyword;
        $category = Category::findOrFail($id);
        $product = Product::where('category_id', $id)->where('name', 'LIKE', '%' . $keyword . '%')->latest()->get();
        return view('home.category', compact('category', 'product'));
    }
    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('home.product', compact('product'));
    }
    public function AddToCart()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('home.cart', compact('cart_items'));
    }
    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);
        return redirect()->route('addtocart')->with('message', 'Your Item added to Cart Successfully');
    }
    public function RemoveCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your Item Remove from Cart Successfully');
    }
    public function GetShippingAddress()
    {
        return view('home.shippingaddress');
    }
    public function AddShippingAddress(Request $request)
    {
        ShippingInfo::create([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'tgl_pemesanan' => $request->tgl_pemesanan,
            'note' => $request->note,
        ]);
        return redirect()->route('checkout');
    }

    public function Checkout()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('home.checkout', compact('cart_items', 'shipping_address'));
    }
    public function PlaceOrder()
    {
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();
        foreach ($cart_items as $item) {
            Order::create([
                'user_id' => $userid,
                'shipping_infos_id' => $shipping_address->id,
                'shipping_phonenumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city,
                'shipping_postalcode' => $shipping_address->postal_code,
                'shipping_address' => $shipping_address->address,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_harga' => $item->price,
                'invoice' =>  'INV-' . mt_rand(100000, 999999),
                'status' => 'pending'
            ]);
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }
        ShippingInfo::where('user_id', $userid)->first()->delete();
        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed Succesfully');
    }
    public function UserProfile()
    {
        return view('home.userprofile');
    }
    public function PendingOrders()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();

        return view('home.pendingorders', compact('pending_orders'));
    }
    public function History()
    {

        return view('home.history');
    }
}
