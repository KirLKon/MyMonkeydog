<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Litter;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Litter $litter)
    {
        $sirs=Dog::where('sex',Dog::SEX_MALE)->get();
        $dams=Dog::where('sex',Dog::SEX_FEMALE)->get();
        $in_rows = Litter::inRowStyle();
        return view('admin.litter.edit',compact('litter','sirs','dams','in_rows'));
    }
}
