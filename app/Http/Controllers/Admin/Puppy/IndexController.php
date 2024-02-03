<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Puppy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $puppies = Puppy::orderByDesc('id')->paginate(15);
        $sexs = Dog::getSex();
        $colors = Puppy::puppyColors();
        return view('admin.puppies.index',compact('puppies','sexs','colors'));
    }
}
