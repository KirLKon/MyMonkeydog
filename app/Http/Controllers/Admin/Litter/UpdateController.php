<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Models\Litter;
use App\Service\ImageService;
use Illuminate\Http\Request;
use App\Http\Requests\Litter\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(Litter $litter, UpdateRequest $request,ImageService $service)
    {

        $data = $request->validated();

        if (isset($data['presentation_image'])) {
            $data['image_path'] = 'litters';
            $data['presentation_image'] = $service->uploadImage($data['presentation_image'],$data['image_path'],true);
            if (!$data['presentation_image']) {
                abort(500);
            }
            $service->deleteOldPicture('litters',$litter->presentation_image);
        }

        $litter->update($data);
        return redirect()->route('admin.litter.show',['litter' => $litter->id]);
    }
}
