<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MalasngodingController extends Controller
{
    public function input()
    {
        return view('input');
    }
 
    public function proses(Request $request)
    {
        $this->validate($request,[
           'nama' => 'required|min:3|max:20',
           'pekerjaan' => 'required',
           'usia' => 'required|numeric'
        ]);
 
        return view('proses',['data' => $request]);
    }
}
