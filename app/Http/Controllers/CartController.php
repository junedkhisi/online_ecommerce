<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Detail;
use App\Models\Header;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;


class CartController extends Controller
{
    /* Add Cart Function */
    public function addCart(Request $request, $id)
    {
        $user = Auth::user()->id;
        $products = Product::find($id);
        Validator::make($request->all(), [
            'quantity' => 'required'
        ]);

        $id = $user;
        $product_id = $products->id;
        $image = $products->image;
        $name = $products->name;
        $quantity = $request->quantity;
        $price = $products->price;
        $total = $products->total_price * $request->quantity;

        $cart = new Cart;
        $cart->user_id = $user;
        $cart->product_id = $product_id;
        $cart->image = $image;
        $cart->name = $name;
        $cart->quantity = $quantity;
        $cart->price = $price;
        $cart->total = $total;
        $cart->save();

        return redirect('/shopping-cart')->with('success', 'Cart Added Successfully');
    }

    /* Comment, Product , Brand Show With Passed Product ID */

    public function indexAdd($id)
    {
        $product = Product::find($id);
        $brand = Brand::where('name', '=', '%' . $product->brand . '%')->get();
        $comments = Comment::where('product_id', '=', $product->id)->get();

        return view('users.product', compact('product', 'brand', 'comments'));
    }

    /* Cart List Show The Shopping-Cart Page */

    public function indexCart()
    {
        $user = Auth::user()->id;
        $carts = Cart::where('user_id', '=', $user)->get();

        $storedItem = array();

        $totalQty = 0;
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $totalQty += $cart->quantity;
            $totalPrice += $cart->total;

            $product = Product::where('id', '=', $cart->product_id)->get();
            array_push($storedItem, $product);
        }

        return view('users.shopping-cart', compact('user', 'carts', 'totalQty', 'totalPrice'));
    }

    /* Delete Cart Item */
    public function removeCart(Request $request)
    {
        $carts = Cart::find($request->id);
        if (!$carts) {
            return ('error');
        }
        $carts->delete();

        return redirect('/shopping-cart')->with('success', 'Cart Removed Successfully');
    }

    /* Make Payment To The Remove The Cart Item  */
    public function checkout($id)
    {
        $carts = Cart::with('user')->where('user_id', 'LIKE', "%{$id}%")->get();
        $user = User::find($id);

        $header = new Header();
        $header->user_id = Auth::user()->id;
        $header->date = date('Y-m-d H:i:s');
        $header->status = 'Success';

        $header->save();

        foreach ($carts as $cart) {
            $detail = new Detail();
            $detail->header_id = $header->id;
            $detail->product_id = $cart->product_id;
            $detail->quantity = $cart->quantity;

            $detail->save();

            Product::find($cart->id);

            $cart->delete();
        }

        return redirect('/shopping-cart')->with('success', 'Payment Success');
    }

    public function history()
    {
        $headers = Header::where('user_id', '=', Auth::user()->id)->get();

        return view('users.history-transaction', compact('headers'));
    }

    public function viewTransaction()
    {
        $transactions = Header::all();

        return view('transaction-history', compact('transactions'));
    }

    /* Transaction Details */
    public function detailTransaction($id)
    {
        $headers = Header::find($id);
        $details = Detail::where('header_id', '=', $headers->id)->get();

        $totalqty = 0;
        $grandtotal = 0;

        foreach ($details as $detail) {
            $totalqty += $detail->quantity;
            $total = $detail->product->total_price * $detail->quantity;
            $grandtotal += $total;
        }

        return view('users.transaction-detail', compact('details', 'total', 'totalqty', 'grandtotal'));
    }

    /* Cart Data */
    public function getCartData()
    {
        // $carts = Cart::where('user_id', Auth::id())->get();
        $carts = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return DataTables::of($carts)
            ->addColumn('image', function ($cart) {
                return '<img src="' . asset($cart->image) . '" target="_blank" style="height: 50px; width: 50px" >';
            })
            ->addColumn('action', function ($cart) {
                return '<a data-id="' . $cart->id . '" class="delete-cart btn btn-warning text-white">Remove</a>';
            })
            ->editColumn('total', function ($cart) {
                return number_format($cart->total, 2);
            })
            ->rawColumns(['image', 'total', 'action'])
            ->make(true);
    }

}
