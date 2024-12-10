<?php

namespace App\Http\Controllers\Admin\PuppyRequest;

use App\Http\Controllers\Controller;
use App\Models\PuppyRequest;

class IndexController extends Controller
{
    public function __invoke()
    {
        $puppy_requests = PuppyRequest::orderBy('id','DESC')->paginate(15);
        return view('admin.puppy_request.index',compact('puppy_requests'));
    }
}
