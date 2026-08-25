<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\Brand;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::with('brand')->orderBy('name')->get();
        return view('admin.motorcycles.index', compact('motorcycles'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.motorcycles.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Motorcycle::create($data);

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motor succesvol toegevoegd.');
    }

    public function edit(Motorcycle $motorcycle)
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.motorcycles.edit', compact('motorcycle', 'brands'));
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
        $data = $this->validated($request);
        $motorcycle->update($data);

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motor succesvol bijgewerkt.');
    }

    public function destroy(Motorcycle $motorcycle)
    {
        $motorcycle->delete();

        return redirect()->route('admin.motorcycles.index')
            ->with('success', 'Motor succesvol verwijderd.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'brand_id'    => ['required', 'exists:brands,id'],
            'name'        => ['required', 'string', 'max:255'],
            'type'        => ['required', 'string', 'in:sport,naked,touring,cruiser,offroad,scooter'],
            'price'       => ['required', 'numeric', 'min:0'],
            'cc'          => ['required', 'integer', 'min:50'],
            'description' => ['nullable', 'string'],
            'image_url'   => ['nullable', 'url', 'max:500'],
            'stock'       => ['required', 'integer', 'min:0'],
        ]);
    }
}
