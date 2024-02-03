<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Puppy\StoreRequest;

use App\Models\Puppy;
use App\Service\ImageService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ImageService $service)
    {
        $data = $request->validated();
        $data['image_path'] = 'puppies';
        $additional_images = [];

        if (isset($data['additional_images'])) {
            foreach ($data['additional_images'] as $additional_image) {
                $additional_images[] = ['image_name' => $service->uploadImage($additional_image,$data['image_path'], false)];
            }
            unset($data['additional_images']);
        }

        $data['main_image'] = $service->uploadImage($data['main_image'],$data['image_path'],true);
        if (!$data['main_image']) {
            abort(500);
        }

        $puppy = Puppy::firstOrCreate($data);
        if (count($additional_images) > 0) {
            $puppy->puppy_additional_images()->createMany($additional_images);
        }
        return redirect()->route('admin.puppy.show', ['puppy' => $puppy->id ]);
    }
}
