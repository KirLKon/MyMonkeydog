<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Litter;
use App\Models\Puppy;

class CreateController extends Controller
{
    public function __invoke()
    {
        $litters = Litter::orderByDesc('dob')->get();
        $sexs = Dog::getSex();
        $colors = Puppy::puppyColors();
        return view('admin.puppies.create',compact('litters','sexs','colors'));
    }
}
