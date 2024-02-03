<?php

namespace App\Http\Controllers\Admin\Dog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dog\UpdateRequest;
use App\Models\Dog;
use App\Service\ImageService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Dog $dog,UpdateRequest $request,ImageService $service)
    {

        $data = $request->validated();
        if (isset($data['main_image'])) {
            $data['image_path'] = 'dogs';
            $data['main_image'] = $service->uploadImage($data['main_image'],$data['image_path'],true);
            if (!$data['main_image']) {
                abort(500);
            }
            $service->deleteOldPicture('dogs',$dog->main_image);
        }
        $dog->update($data);
        return redirect()->route('admin.dog.edit',['dog'=>$dog->id]);
    }
}
