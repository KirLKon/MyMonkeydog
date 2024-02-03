<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Litter;
use App\Models\Photo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        $litters = Litter::where('status',1)->get();
        $photos = Photo::where('show_on_site',1)->orderBy('order_number','ASC')->get();
        $sexs = Dog::getSex();
        $dogs = Dog::where('show_on_site',1)->get();
        return view('welcome',compact('litters','sexs','photos','dogs'));
    }
}
