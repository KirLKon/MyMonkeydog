<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageService
{
    CONST MAX_WIDTH_IMAGE = 1200;
    CONST MAX_WIDTH_MINI = 150;
    CONST WEBP_QUALITY = 75;

    private $manager;
    private $imageFolder = 'public/images/';

    public function __construct()
    {
        $this->manager = new ImageManager(Driver::class);
    }

    public function uploadImage($file,$path = false,$needMiniature = false)
    {
        $imageName = $this->saveImage($file,$path,md5(time() . $file->getClientOriginalName()));
        if ($needMiniature) {
            $this->saveImage($file,$path,$imageName.'_mini',self::MAX_WIDTH_MINI);
        }
        return $imageName;
    }

    public function deleteOldPicture($path,$imageName)
    {

        if (Storage::exists($this->imageFolder . $path . '/' . $imageName . '.jpg')) {
            Storage::delete($this->imageFolder . $path . '/' . $imageName . '.jpg');
        }
        if (Storage::exists($this->imageFolder . $path . '/' . $imageName . '.webp')) {
            Storage::delete($this->imageFolder . $path . '/' . $imageName . '.webp');
        }
        if (Storage::exists($this->imageFolder . $path . '/' . $imageName . '_mini.jpg')) {
            Storage::delete($this->imageFolder . $path . '/' . $imageName . '_mini.jpg');
        }
        if (Storage::exists($this->imageFolder . $path . '/' . $imageName . '_mini.webp')) {
            Storage::delete($this->imageFolder . $path . '/' . $imageName . '_mini.webp');
        }
    }

    private function saveImage($file,$path,$imageName,$maxWidth = self::MAX_WIDTH_IMAGE)
    {
        $ext = $file->getClientOriginalExtension();
        $image = $this->manager->read($file);

        if ($image->width() > $maxWidth) {
            $image->resize($maxWidth,$image->height() * $maxWidth/$image->width());
        }
        $mainImageFileName = $this->imageFolder;
        if ($path) {
            $mainImageFileName.= $path . '/';
        }
        $mainImageFileName.= $imageName.'.'.$ext;
        if (!Storage::put($mainImageFileName, $image->toJpg())) {
            return false;
        }
        return $this->saveWebp($image,$path,$imageName);
    }

    private function saveWebp($image,$path,$imageName)
    {
        $imageWebp = $this->manager->read($image);
        $imageWebpFilePath = $this->imageFolder;
        if ($path) {
            $imageWebpFilePath.= $path . '/';
        }
        $imageWebpFilePath.=$imageName.'.webp';
        if (!Storage::put($imageWebpFilePath, $imageWebp->toWebp(self::WEBP_QUALITY))) {
            return false;
        }
        return $imageName;
    }
}
