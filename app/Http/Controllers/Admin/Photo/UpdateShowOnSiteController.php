<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\UpdateShowOnSiteRequest;
use App\Models\Photo;

class UpdateShowOnSiteController extends Controller
{
    public function __invoke(Photo $photo, UpdateShowOnSiteRequest $request)
    {
        $data = $request->validated();
        $data['order_number'] = ($data['show_on_site'] == 1) ? Photo::max('order_number',1) + 1 : NULL;
        $photo->update($data);
        Photo::update_photo_order();
        return redirect()->back();
    }
}
