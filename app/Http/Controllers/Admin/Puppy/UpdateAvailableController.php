<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Puppy\UpdateAvailableRequest;
use App\Models\Puppy;


class UpdateAvailableController extends Controller
{
    public function __invoke(Puppy $puppy, UpdateAvailableRequest $request)
    {
        $data = $request->validated();
        $puppy->update($data);
        return redirect()->back();
    }
}
