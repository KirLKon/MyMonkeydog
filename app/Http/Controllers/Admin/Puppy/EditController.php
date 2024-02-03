<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Litter;
use App\Models\Puppy;

class EditController extends Controller
{
    public function __invoke(Puppy $puppy)
    {
        $sexs = Dog::getSex();
        $colors = Puppy::puppyColors();
        $litters = Litter::all();
        return view('admin.puppies.edit',compact('puppy','colors','sexs','litters'));
    }
}
