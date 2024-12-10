<?php

namespace App\Http\Controllers\PuppyRequest;

use App\Http\Requests\PuppyRequest\StoreRequest;
use App\Http\Controllers\Controller;
use \App\Models\Dog;
use App\Models\PuppyRequest;
use Illuminate\Support\Facades\URL;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (empty($data['puppy_id'])) unset($data['puppy_id']);
        PuppyRequest::create($data);
        return redirect()->to(URL::previous() . "#puppies")->withSuccess(__('MESSAGE_SENT'));
    }
}
