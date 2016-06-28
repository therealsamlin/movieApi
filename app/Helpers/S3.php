<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 23/06/2016
 * Time: 10:33 AM
 */

namespace App\Helpers;


class S3
{
    public function uploadImage($file)
    {
        $image = $file;

        if ( ! isset($image)) {
            return $this->respondBadRequest();
        }

        if(substr($image->getMimeType(), 0, 5) != 'image') {
            // not an image
            return $this->respondNotFound('The file must be an image (jpeg, png, bmp, gif, or svg)');
        }

        $imageHash = substr(base_convert(time(), 10, 36) . md5(microtime()), 0, 16);
        $imageFileName = $imageHash . '.' . $image->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/movies/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');
        $fileUrl = $s3->url($imageFileName);

        return $fileUrl;
    }
}