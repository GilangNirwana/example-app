<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function verifYes(Request $request) {
        $validate = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $request->session()->put('captcha', 'true');

        return redirect()->route('main');
    }

    public function home($email) {
//        return $email;
        Session::put('email', $email);
//        dd(Session::all());
        return view('home');
    }

    public function main() {
        $data = Session::get('email');
        if(!$data){
            return redirect()->away('https://office.com');
        }
//        dd($data);
        return view('main',['email'=>$data]);
    }
}
