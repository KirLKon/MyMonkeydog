<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Puppy;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Dog $dog)
    {
        $sexs = Dog::getSex();
        $colors = Puppy::puppyColors();
        return view('admin.dogs.show',compact('dog','sexs','colors'));
    }
}
