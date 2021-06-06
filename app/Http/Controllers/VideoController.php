<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    //

       
    public function vediohome()
    {
        return view('home');
    } 

       
    public function vediopost()
    {
        return view('post');
    } 

}
