<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'group_id', 'meal_type_id', 'name', 'content', 'comment'
    ];

    public function grouo() {
        return $this->belongsTo(Group::class);
    }

    public function mealType() {
        return $this->belongsTo(MealType::class);
    }
}
