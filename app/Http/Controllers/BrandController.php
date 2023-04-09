<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;


class BrandController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->is_admin == 1) {
            return view('brand.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            $request->validate([
                'name' => 'required'
            ]);
            
            Brand::create($request->all());
            return redirect()->route('brands.create')->with('status','New brand has been created successfully.');
        }
    }
}
