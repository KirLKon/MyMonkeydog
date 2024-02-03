<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dog\UpdateRequest;
use App\Http\Requests\Dog\UpdateShowOnSiteRequest;
use App\Models\Dog;
use App\Service\ImageService;
use Illuminate\Http\Request;

class UpdateShowOnSiteController extends Controller
{
    public function __invoke(Dog $dog, UpdateShowOnSiteRequest $request)
    {
        $data = $request->validated();
        $dog->update($data);
        return redirect()->back();
    }
}
