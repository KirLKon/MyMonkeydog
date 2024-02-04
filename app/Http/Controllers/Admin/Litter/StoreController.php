<?php

namespace App\Http\Controllers\Admin\Litter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Litter\StoreRequest;
use App\Models\Dog;
use App\Models\Litter;
use App\Service\ImageService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ImageService $service)
    {
        $data = $request->validated();
        $data['image_path'] = 'litters';
        $data['presentation_image'] = $service->uploadImage($data['presentation_image'],$data['image_path'],true);

        if (!$data['presentation_image']) {
            abort(500);
        }

        $litter = Litter::firstOrCreate($data);
        return redirect()->route('admin.litters');
    }
}
