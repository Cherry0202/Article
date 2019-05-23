<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Zipper;

class ZipController extends Controller
{
    function index(){
        $files = glob(resource_path('sample/'));
        Zipper::make(public_path('sample.zip'))->add($files)->close();

        return response()->download(public_path('sample.zip'));
    }
}
