<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function userImageUpload($query)
    {
        $image_name = rand(1000, 120000000);
        $ext = strtolower($query->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'img/upload/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path, $image_full_name);
        return $image_url; // Just return image
    }
}
