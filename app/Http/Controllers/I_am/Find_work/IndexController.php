<?php

namespace App\Http\Controllers\I_am\Find_work;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('about.find_work');
    }
}
