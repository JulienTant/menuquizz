<?php

namespace App\Http\Controllers;

use App\MealType;
use Illuminate\Http\Request;

class MealTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealTypes = MealType::orderby('order')->get();

        return view('meal-types.index',compact('mealTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        MealType::create([
            'name' => $request->get('name'),
            'order' => MealType::max('order') + 1
        ]);

        return redirect()->route('meal-types.index')
            ->with('success','Meal type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function show(MealType $mealType)
    {
        return view('meal-types.show',compact('mealType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function edit(MealType $mealType)
    {
        return view('meal-types.edit',compact('mealType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealType $mealType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $mealType->update($request->only('name'));


        return redirect()->route('meal-types.index')
            ->with('success','Meal type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealType $mealType)
    {
        $mealType->delete();

        return redirect()->route('meal-types.index')
            ->with('success','Meal type deleted successfully');
    }

    public function swap(Request $request, MealType $mealType)
    {
        $second = MealType::find($request->get('with'));


        $a = $mealType->order;
        $mealType->order = $second->order;
        $second->order = $a;

        $mealType->save();
        $second->save();

        return back();
    }
}
