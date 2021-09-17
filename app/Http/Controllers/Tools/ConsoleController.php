<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ConsoleController extends Controller
{

    public function artisan($command) {
        echo "Execute :".$command."<br/>";
        $artisan = Artisan::call($command);
        $output = Artisan::output();
        return $output;
    }
    public function consoleCommand($command) {
        echo "Execute :".$command."<br/>";
        $process=new Process($command);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}

