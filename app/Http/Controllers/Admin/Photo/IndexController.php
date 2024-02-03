<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Photo;
use App\Models\Puppy;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $photos = Photo::orderBy('show_on_site','DESC')->orderBy('order_number','ASC')->paginate(20);
        return view('admin.photos.index',compact('photos'));
    }
}
