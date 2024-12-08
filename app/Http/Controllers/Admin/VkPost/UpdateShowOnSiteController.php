<?php

namespace App\Http\Controllers\Admin\VkPost;

use App\Http\Controllers\Controller;
use App\Http\Requests\VkPost\UpdateShowOnSiteRequest;
use App\Models\Vk\VkPost;


class UpdateShowOnSiteController extends Controller
{
    public function __invoke(VkPost $vkPost, UpdateShowOnSiteRequest $request)
    {
        $data = $request->validated();
        $vkPost->update($data);
        return redirect()->back();
    }
}
