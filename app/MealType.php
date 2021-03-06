<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    protected $fillable = [
        'name', 'order'
    ];

    public function meals() {
        return $this->hasMany(Meal::class)->orderBy('name');
    }}
