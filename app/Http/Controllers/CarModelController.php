<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Brand;

use Auth;

class CarModelController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            $brands = Brand::all();
            return view('model.create', compact('brands'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            $request->validate([
                'name' => 'required',
                'brand' => 'required'
            ]);
            
            $brand = new Brand();
            $brand->name = $request->brand;
            $brand->save();

            $carModel = new CarModel();
            $carModel->name = $request->name;
            $carModel->brand_id = $brand->id;
            $carModel->save();
            
            return redirect()->route('models.create')->with('status','New car model has been created successfully.');
        }
    }

}
