<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Database\Seeders\PromotionSeeder;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        // dd($promotions); // Debug untuk memastikan data promosi diambil
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
    
              // Simpan data ke database
              Promotion::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $request->file('image') ? $request->file('image')->store('promotions', 'public') : null,
            ]);
    
        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully!');
    }

    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $promotion->update($data);
        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index');
    }

    public function debugSeeder()
    {
        (new PromotionSeeder)->run();
        return 'Seeder berhasil dijalankan!';
    }
}
