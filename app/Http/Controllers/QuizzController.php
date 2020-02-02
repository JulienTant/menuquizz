<?php

namespace App\Http\Controllers;

use App\Group;
use App\Meal;
use App\MealType;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::has('meals')->orderBy('name')->get();
        $mealTypes = MealType::has('meals')->orderBy('order')->get();

        return view('quizz.index', compact('groups', 'mealTypes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $from = $request->get('from');

        $q = Meal::inRandomOrder();
        if ($from == "all") {
            $q = $q->limit(10);
        } else {
            $expFrom = explode(":", $from);
            switch ($expFrom[0]) {
                case "group":
                    $q = $q->where('group_id', $expFrom[1]);
                    break;
                case "meal_type":
                    $q = $q->where('meal_type_id', $expFrom[1]);
                    break;
            }
        }
        $meals = $q->get();

        return view('quizz.show', compact('meals'));
    }


}
