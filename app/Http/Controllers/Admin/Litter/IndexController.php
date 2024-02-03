<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Models\Litter;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $litters = Litter::orderBy('dob','DESC')->get();
        return view('admin.litter.index',compact('litters'));
    }
}
