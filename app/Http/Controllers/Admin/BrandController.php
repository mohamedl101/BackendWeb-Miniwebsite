<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('motorcycles')->orderBy('name')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'country'     => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        Brand::create($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Merk succesvol toegevoegd.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'country'     => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        $brand->update($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Merk succesvol bijgewerkt.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Merk succesvol verwijderd.');
    }
}
