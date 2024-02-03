<?php

namespace App\Http\Controllers\Admin\Photo;

use \App\Http\Requests\Photo\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Photo;
use App\Service\ImageService;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ImageService $service)
    {
        $data = $request->validated();
        $data['image_path'] = 'photos';
        $data['image_name'] = $service->uploadImage($data['image_name'],$data['image_path'],true);

        if (!$data['image_name']) {
            abort(500);
        }

        Photo::create($data);
        return redirect()->route('admin.photo');
    }
}
