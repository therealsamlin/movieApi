<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 23/06/2016
 * Time: 10:33 AM
 */

namespace App\Api\V1\Helpers;


class S3
{
    /**
     * @param $image
     * @param string $folder
     * @return mixed
     */
    public function uploadImage($image, $folder = 'general')
    {

        // create unique file name
        $imageHash = substr(base_convert(time(), 10, 36) . md5(microtime()), 0, 16);
        $imageFileName = $imageHash . '.' . $image->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/' . $folder . '/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');
        $fileUrl = $s3->url($imageFileName);

        return $fileUrl;

    }
}