<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;

class VueController extends Controller
{
    public function testVue(){
        return view('test.test_vue',[
            'hello' => 'la_la'
        ]);
    }
}
