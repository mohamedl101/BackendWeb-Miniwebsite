<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Brand;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index(Request $request)
    {
        $query = Motorcycle::with('brand');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        $motorcycles = $query->orderBy('name')->paginate(12)->withQueryString();
        $brands = Brand::orderBy('name')->get();
        $types = Motorcycle::select('type')->distinct()->orderBy('type')->pluck('type');

        return view('motors.index', compact('motorcycles', 'brands', 'types'));
    }

    public function show(Motorcycle $motorcycle)
    {
        $motorcycle->load('brand');
        return view('motors.show', compact('motorcycle'));
    }
}
