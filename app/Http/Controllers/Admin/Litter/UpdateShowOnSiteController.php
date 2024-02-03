<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Litter\UpdateShowOnSiteRequest;
use App\Models\Litter;
use Illuminate\Http\Request;

class UpdateShowOnSiteController extends Controller
{
    public function __invoke(Litter $litter,UpdateShowOnSiteRequest $request)
    {
        $data = $request->validated();
        $litter->update($data);
        return redirect()->back();
    }
}
