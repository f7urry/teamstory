<?php
namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class LogsController extends Controller {
    public function index(Request $request) {
        if (!file_exists(storage_path('logs')))
            return [];
        $logFiles = File::allFiles(storage_path('logs'));

        $list_file=[];
        echo "<ul>";
        foreach($logFiles as $logFile){
            $fname=explode('.',$logFile->getFilename())[0];
            echo "<li><a href='/logs/{$fname}'>{$logFile->getFilename()}</a></li>";
        }
        echo "</ul>";
    }

    public function show($fileName){
        $fileName.=".log";
        if (file_exists(storage_path('logs/'.$fileName))) {
            $path = storage_path('logs/'.$fileName);
            header('Content-Type: text/plain');
            readfile($path);
        }else
            return response()->json(["message"=>"Invalid file name"]);
    }
     public function delete($fileName){
        $fileName.=".log";
        if (file_exists(storage_path('logs/'.$fileName))) {
            $path = storage_path('logs/'.$fileName);
            header('Content-Type: text/plain');
            unlink($path);
        }else
            return response()->json(["message"=>"Invalid file name"]);
    }

}