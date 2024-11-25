<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;


class FoodController extends Controller
{
    
    public function foods()
    {
        $dishes=Dish::all();
        return view("food/food",compact("dishes"));
    }

    public function view()
    {
        $dishes = DB::table('dishes')
        ->select('id', 'name', 'desc', 'price', 'category', 'picture')
        ->get();

        return view('food/foodView', compact('dishes'));
        
    }



    public function create()
    {
        return view("food/foodCreate");
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('dishes', 'public');
        }

        Dish::create($data);

        return redirect()->route('foods')->with('success', 'Plato creado exitosamente.');
    }


    
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish'));
    }



    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
    
        return view('food.foodEdit', compact('dish'));
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('picture')) {
            if ($dish->picture) {
                Storage::disk('public')->delete($dish->picture);
            }
            $data['picture'] = $request->file('picture')->store('dishes', 'public');
        }
    
        $dish->update($data);
    
        return redirect()->route('foods')->with('success', 'Plato actualizado exitosamente.');
    }
    


}