<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Puppy\UpdateShowOnSiteRequest;
use App\Models\Puppy;


class UpdateShowOnSiteController extends Controller
{
    public function __invoke(Puppy $puppy, UpdateShowOnSiteRequest $request)
    {
        $data = $request->validated();
        $puppy->update($data);
        return redirect()->back();
    }
}
