<?php namespace Admin\Services;

use Auth;
use Image;

/**
 * A service class to upload image
 *
 * @author gab
 * @package Admin\Services
 */
class ImageUploader
{
    /**
     * Send mail to guest for password reset
     *
     * @param file $view
     * @param integer $user_id
     * @param integer $width
     * @param integer $height
     * @param string $path
     * @param string $image_type
     * @return Image
     */
    public function upload($file, $user_id, $width, $height, $path, $image_type = "/profile_picture.jpg")
    {
        /* $img = Image::make($file->getRealPath())->resize(128, 128);

        return $img->save($path . $user_id . $image_type);*/

        if (!is_dir($path . $user_id)) {
            mkdir($path . $user_id);
        }

        $target_dir = $path . $user_id . $image_type;
        $target_file = $target_dir;

        $image = new SimpleImage();
        $image->load($file);
        $image->resize($width, $height);

        return ['success' => $image->save($target_file)];

    }
}
