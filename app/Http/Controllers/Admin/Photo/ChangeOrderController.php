<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Competence\Skill;
use App\Models\Photo;

class ChangeOrderController extends Controller
{
    public function __invoke(Photo $photo, $new_order_number)
    {
        Photo::where('order_number',$new_order_number)->update(['order_number' => $photo->order_number]);
        $photo->update(['order_number' => $new_order_number]);
        return redirect()->back();
    }
}
