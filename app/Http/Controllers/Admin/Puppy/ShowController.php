<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Puppy;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Puppy $puppy)
    {
        $sexs = Dog::getSex();
        $colors = Puppy::puppyColors();
        return view('admin.puppies.show',compact('puppy','sexs','colors'));
    }
}
