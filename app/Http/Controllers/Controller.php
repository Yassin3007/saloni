<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store_file($options=[])
    {
        $options = array_merge([
            //'source'=>"",
            'validation'=>"file",
            'path_to_save'=>'/uploads/files/',
            'type'=>'',
            'type_id'=>"",
            'user_id'=>NULL,
            'resize'=>[400,15000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER','s3'),
            'optimize'=>false,
            'new_extension'=>"",
            'used_at'=>NULL,
        ],$options);
        return \App\Helpers\UploadFilesHelper::store_file($options);

    }
}
