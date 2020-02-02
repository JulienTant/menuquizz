<?php

namespace App\Http\Controllers;

use App\Group;
use App\Meal;
use App\MealType;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealTypes = MealType::with('meals')->orderBy('order')->get();

        return view('meals.index', compact('mealTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mealTypes = MealType::orderBy('order')->get();
        $groups = Group::orderBy('name')->get();

        return view('meals.create', compact('mealTypes', 'groups'));
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
            'group_id' => 'required',
            'meal_type_id' => 'required',
            'name' => 'required',
            'content' => 'required',
        ]);

        Meal::create($request->only('group_id', 'meal_type_id', 'name', 'content', 'comment'));

        return redirect()->route('meals.index')
            ->with('success','Meal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('meals.show',compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $mealTypes = MealType::orderBy('order')->get();
        $groups = Group::orderBy('name')->get();

        return view('meals.edit',compact('meal', 'mealTypes', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'group_id' => 'required',
            'meal_type_id' => 'required',
            'name' => 'required',
            'content' => 'required',
        ]);

        $meal->update($request->only('group_id', 'meal_type_id', 'name', 'content', 'comment'));


        return redirect()->route('meals.index')
            ->with('success','Meal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('meals.index')
            ->with('success','Meal deleted successfully');
    }

    public function withComment()
    {
        $mealTypes = MealType::has('meals')->with(['meals' => function($q) {
            $q->whereNotNull('comment');
        }])->orderBy('order')->get();

        return view('meals.with-comment', compact('mealTypes'));

    }
}
