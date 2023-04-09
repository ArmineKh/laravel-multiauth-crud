<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Brand;
use Auth;

class CarController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            $brands = Brand::all();
            $models = CarModel::all();
            return view('car.create', compact('brands', 'models'));
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
                'year' => 'required|integer|between:1999,2023',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
                'price' => 'required',
                'brand' => 'required|min:3|max:255',
                'model' => 'required|min:3|max:255',
                'description' =>'required|min:3|max:10000',
            ]);
            
            $brand = new Brand();
            $brand->name = $request->brand;
            $brand->save();

            $carModel = new CarModel();
            $carModel->name = $request->model;
            $carModel->brand_id = $brand->id;
            $carModel->save();

            $car = new Car();
            $car->name = $request->name;
            $car->year = $request->year;
            $car->price = $request->price;
            $car->description = $request->description;
            $imageName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
            $car->image = $imagePath;
            $car->brand_id = $brand->id;
            $car->model_id = $carModel->id;
            $car->save();
            
            return redirect()->route('cars.create')->with('status','New car has been created successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $is)
    {
        if (Auth::user()->is_admin == 1) {
            $car = Car::with(['brand', 'model'])->find($is);
            $brands = Brand::all();
            $models = CarModel::all();
            return view('car.edit', compact('car', 'brands', 'models'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->is_admin == 1) {
            $request->validate([
                'name' => 'required',
                'year' => 'required|integer|between:1999,2023',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
                'price' => 'required',
                'brand' => 'required|min:3|max:255',
                'model' => 'required|min:3|max:255',
                'description' =>'required|min:3|max:10000',
            ]);

            $car = Car::where('id', $id)->first();
            $car->name = $request->name;
            $car->year = $request->year;
            $car->price = $request->price;
            $car->description = $request->description;
            $imageName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
            $car->image = $imagePath;

            $brand = Brand::where('id', $car->brand_id)->first();
            $brand->name = $request->brand;
            $brand->save();

            $carModel = CarModel::where('id', $car->model_id)->first();
            $carModel->name = $request->model;
            $carModel->brand_id = $brand->id;
            $carModel->save();
            
            $car->brand_id = $brand->id;
            $car->model_id = $carModel->id;
            $car->save();
   
            return redirect()->route('cars.create')->with('status','Car has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->is_admin == 1) {
            $car = Car::where('id', $id)->first();
            $car->delete();
            return redirect()->route('admin.home')->with('success','Car has been deleted successfully');
        }
    }
}
