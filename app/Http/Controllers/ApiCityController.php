<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ApiCityController extends Controller
{
    public function search($cityName)
    {
        $cities =  City::where('name', 'like', '%' . $cityName . '%')->get();
        return compact('cities');
    }
}
