<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\models\Comment;
use App\Models\Product;
// use GrahamCampbell\ResultType\Success;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.show-product');
    }

    public function intex()
    {
        $products = Product::paginate(10);

        return view('users.phone-list', compact('products'));
    }

    public function getAll()
    {
        $products = Product::select(['id', 'name', 'brand', 'total_price', 'description', 'image']);

        return DataTables::of($products)
            ->addColumn('action', function ($products) {
                return '<a href="' . url('update-product/' . $products->id) . '" class=" btn btn-warning mr-2">
                            <i class="fa fa-edit"> Edit</i>
                        </a><br><br>
                        <a class="btn btn-danger delete-product" data-id="' . $products->id . '">
                            <i class="fa fa-trash"> Delete</i>
                        </a>';
            })

            ->addColumn('image', function ($products) {
                return '<a href="' . asset($products->image) . '" target="_blank">
                            <img src="' . asset($products->image) . '" alt="Product Image" style="width: 70px; height: 70px;">
                        </a>';
            })

            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    // public function insert(Request $request)
    // {

    //     $rules = [
    //         'name' => 'required|min:3',
    //         'brand' => 'required',
    //         'image' => 'required',
    //         'description' => 'required',
    //         'price' => 'required|numbers|min:1000',
    //         'discount' => 'required',
    //         'total_price' => 'required|numbers|min:1000',
    //         'stock' => 'required',
    //     ];

    //     $request = request();
    //     $image = $request->file('image');

    //     $imageSaveAs = $image->getClientOriginalExtension();

    //     $upload_path = 'img/';
    //     $product_image = $upload_path . $imageSaveAs;
    //     $success = $image->move($upload_path, $imageSaveAs);

    //     $products = new Product();
    //     $products->name = $request->name;
    //     $products->brand = $request->brand;
    //     $products->image = $product_image;
    //     $products->description = $request->description;
    //     $products->price = $request->price;
    //     $products->discount = $request->discount;
    //     $products->total_price = $request->total_price;
    //     $products->stock = $request->stock;
    //     $products->save();

    //     return redirect('/show-product');
    // }


    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'brand' => 'required',
            // 'image' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'price' => 'required|numbers|min:1000',
            'discount' => 'required',
            'stock' => 'required',
        ];


        $request = request();
        $image = $request->file('image');


        $imageHash = md5(time() . $image->getClientOriginalName());
        $imageExtension = $image->getClientOriginalExtension();
        $imageSaveAs = $imageHash . '.' . $imageExtension;

        $upload_path = 'img/';
        $product_image = $upload_path . $imageSaveAs;


        $success = $image->move($upload_path, $imageSaveAs);


        $products = new Product();
        $products->name = $request->name;
        $products->brand = $request->brand;
        $products->image = $product_image;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount = $request->discount;
        $products->total_price = $request->total_price;
        $products->stock = $request->stock;
        $products->save();

        return redirect('/show-product')->with('success', 'Product Insert Successfully');
    }

    public function insertProduct()
    {
        return view('admin.insert-product');
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'brand' => 'required',
            // 'image' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'price' => 'required|numbers|min:1000',
            'discount' => 'required',
            'stock' => 'required',
        ];
        $product = Product::find($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique filename using hash
            $imageHash = md5(time() . $image->getClientOriginalName());
            $imageExtension = $image->getClientOriginalExtension();
            $imageSaveAs = $imageHash . '.' . $imageExtension;

            $upload_path = 'img/';
            $product_image = $upload_path . $imageSaveAs;

            // Move the image to the specified path
            $image->move($upload_path, $imageSaveAs);

            // Update the product image path in the database
            $product->image = $product_image;
        }

        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->total_price = $request->total_price;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/show-product')->with('success', 'Product Updated Successfully');

    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        $brand = Brand::all();

        return view('admin.update-product', compact('product', 'brand'));
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);

        $product->delete();

        return redirect('/show-product')->with('success', 'Product Deleted Successfully');
    }

    public function edit($id)
    {
        return view('admin.update-product', compact('id'));
    }

    public function insertComment(Request $request)
    {

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->date = date('Y-m-d H:i:s');

        $comment->save();

        return redirect()->back();
    }

    public function searchProduct(Request $request)
    {

        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")->get();

        return view('search-result', compact('products'));
    }

}
