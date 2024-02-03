<?php

namespace App\Http\Controllers\Admin\Puppy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Puppy\UpdateRequest;
use App\Models\Dog;
use App\Models\Puppy;
use App\Models\PuppyImage;
use App\Service\ImageService;

class DestroyPuppyImageController extends Controller
{
    public function __invoke(PuppyImage $puppyImage,ImageService $service)
    {
        $service->deleteOldPicture('puppies',$puppyImage->image_name);
        $puppyImage->delete();
        return redirect()->back();

    }
}
