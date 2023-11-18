<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
       return view('admin.pages.change-password',[
        'title' => 'Change Password'
       ]);
    }

    public function update()
    {
        request()->validate([
            'current_password' => ['required'],
            'password' => ['required','confirmed','min:5'],
            'password_confirmation' => ['required']
        ]);


        if(Hash::check(request('current_password'),auth()->user()->password))
        {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);

            return redirect()->route('admin.profile.index')->with('success','Password berhasil diubah.');
        }else{
            return redirect()->route('admin.change-password.index')->with('error','Password yang anda masukan salah.');
        }


    }
}
