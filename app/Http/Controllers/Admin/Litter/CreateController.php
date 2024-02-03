<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $sirs=Dog::where('sex',Dog::SEX_MALE)->get();
        $dams=Dog::where('sex',Dog::SEX_FEMALE)->get();
        return view('admin.litter.create',compact('sirs','dams'));
    }
}
