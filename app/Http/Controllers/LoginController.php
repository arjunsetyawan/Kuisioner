<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Captcha;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    //Authentikasi login
    public function auth(Request $request)
    {
        $input = $request->all();
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',

        ]);

        //Validasi Captcha
        $recaptcha_secret = "6Le1A8ImAAAAAEJ6__CVfPZC_-6G8m_2My8aYiKL";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $input['g-recaptcha-response']);
        $response = json_decode($response, true);
        //

        if ($response["success"] === true) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        } else {
            return back()->with('loginError', 'Mohon Untuk isi validasi!');
        }
        return back()->with('loginError', 'Email atau password salah!');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
