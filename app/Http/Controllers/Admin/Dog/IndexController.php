<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $dogs = Dog::all();
        $kennels = Dog::getKennel();
        $sex = Dog::getSex();
        return view('admin.dogs.index',compact('dogs','kennels','sex'));
    }
}
