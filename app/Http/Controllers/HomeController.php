<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Car;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $brand_id = Brand::where('name', 'like', '%' . $search . '%')->first()->id;
            $model_id = CarModel::where('name', 'like', '%' . $search . '%')->first()->id;
            $cars = Car::with(['brand', 'model'])->where('brand_id', '=', $brand_id)
                        ->orWhere('model_id', '=', $model_id)->paginate(10);
            return view('home', compact('cars'));
        }else {
            $cars = Car::with(['brand', 'model'])->paginate(10);
            return view('home', compact('cars'));
        }
    }

    public function adminHome()
    {
        $cars = Car::with(['brand', 'model'])->paginate(10);
        return view('adminHome', compact('cars'));
    }
}
