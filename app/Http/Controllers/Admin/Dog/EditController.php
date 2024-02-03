<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Dog $dog)
    {
        $kennels = Dog::getKennel();
        $sex = Dog::getSex();
        return view('admin.dogs.edit',compact('dog','kennels','sex'));
    }
}
