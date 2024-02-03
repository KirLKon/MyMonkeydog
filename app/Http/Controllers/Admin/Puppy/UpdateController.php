<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Puppy\UpdateRequest;
use App\Models\Dog;
use App\Models\Puppy;
use App\Service\ImageService;

class UpdateController extends Controller
{
    public function __invoke(Puppy $puppy,UpdateRequest $request,ImageService $service)
    {

        $data = $request->validated();
        $data['image_path'] = 'puppies';

        if (isset($data['main_image'])) {
            $data['main_image'] = $service->uploadImage($data['main_image'],$data['image_path'],true);
            if (!$data['main_image']) {
                abort(500);
            }
            $service->deleteOldPicture($data['image_path'],$puppy->main_image);
        }
        $additional_images = [];
        if (isset($data['additional_images'])) {
            foreach ($data['additional_images'] as $additional_image) {
                $additional_images[] = ['image_name' => $service->uploadImage($additional_image,$data['image_path'], false)];
            }
            unset($data['additional_images']);
        }

        $puppy->update($data);

        if (count($additional_images) > 0) {
            $puppy->puppy_additional_images()->createMany($additional_images);
        }
        return redirect()->route('admin.puppy.show',['puppy'=>$puppy->id]);

    }
}
