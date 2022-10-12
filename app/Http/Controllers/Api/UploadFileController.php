<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class UploadFileController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    //

    public function storeFile(Request $request)
    {

        $url = time().'.'. $request->url->extension();
        $request->url->move(public_path('/uploads/image_video'), $url);
		$fileName = $request->name;

        $saveFile = UploadFile::create([
            'name' => $fileName,
            'url' => $url
        ]);

        return response()->json(['data' => $saveFile]);
    }

    public static function getListImageDate()
    {
        return UploadFile::orderby('created_at')->get()->groupBy(function($data){
            return $data->created_at->format('Y-m-d');
        });
	}


    
}
