<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required|unique:brands',
        ];

        $brand = new Brand;
        $brand->name = $request->name;

        $brand->save();

        return redirect('/show-brand')->with('success', 'Brand Created Successfully');
    }

    public function insertBrand()
    {
        return view('brand.insert-brand');
    }

    public function getAll()
    {
        $brands = Brand::all();

        return view('brand.show-brand', compact('brands'));
    }


    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/show-brand')->with('success', 'Brand deleted Successfully');

    }

    public function update(Request $request)
    {
        $brand = Brand::find($request->id);

        $brand->name = $request->name;
        $brand->save();

        return redirect('/show-brand')->with('success', 'brand Updated');
    }

    public function updateBrand($id)
    {
        $brand = Brand::find($id);

        return view('brand.update-brand', compact('brand'));
    }
}
