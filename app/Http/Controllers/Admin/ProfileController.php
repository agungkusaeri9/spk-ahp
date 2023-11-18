<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile',[
            'title' => 'Profile Saya'
        ]);
    }

    public function update()
    {
        request()->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required','email',Rule::unique('users')->ignore(auth()->id())],
            'avatar' => ['image','mimes:jpg,jpeg,png','max:2048']
        ]);

        $data = request()->only(['name','username','email','avatar']);
        if(request()->file('avatar'))
        {
            $data['avatar'] = request()->file('avatar')->store('users','public');
        }else{
            $data['avatar'] = NULL;
        }

        auth()->user()->update($data);

        return redirect()->route('admin.profile.index')->with('success','Profile berhasil disimpan.');

    }
}
