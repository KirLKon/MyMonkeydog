<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Requests\Dog\StoreRequest;
use App\Http\Controllers\Controller;
use App\Service\ImageService;
use \App\Models\Dog;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ImageService $service)
    {
        $data = $request->validated();
        $data['image_path'] = 'dogs';
        $data['main_image'] = $service->uploadImage($data['main_image'],$data['image_path'],true);

        if (!$data['main_image']) {
            abort(500);
        }

        $dog = Dog::firstOrCreate($data);
        return redirect()->route('admin.dogs');
    }
}
