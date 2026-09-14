<?php

namespace App\Http\Controllers\I_am\About;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('about.index');
    }
}
