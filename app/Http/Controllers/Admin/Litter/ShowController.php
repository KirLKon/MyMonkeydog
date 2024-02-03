<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Litter;
use App\Models\Puppy;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Litter$litter)
    {
        $sirs=Dog::where('sex',Dog::SEX_MALE)->get();
        $dams=Dog::where('sex',Dog::SEX_FEMALE)->get();
        return view('admin.litter.show',compact('litter','sirs','dams'));
    }
}
