<?php
namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class StorageUtil {

    public static function uploadFile($path, $file) {
        $filename = md5("file_" . date("d_m_YHis")) . "." . $file->getClientOriginalExtension();
        $store = $file->storeAs('public/' . $path, $filename);
        return $path."/".$filename;
    }

    public static function downloadFile($fileName) {
        $path = Storage::path('public/' . $fileName);
        if (Storage::exists('public/' . $fileName)) {
            return response()->download(storage_path('app/public/' . $path . $fileName));
        }

        abort(404,"File not found");
    }

    public static function viewFile($fileName) {
        if(strpos($fileName,"assets")!==false)
            $path=public_path(). $fileName;
        else{
            $fileName='public/' . $fileName;
            $path = Storage::path($fileName);
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}