<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        
        if($request->hasfile('image')){
            $img = $request->file('image');
            $folder = public_path('images/profile');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move($folder, $imgName);
            $user->image = $imgName;
        }

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('admin/user')->with('status', 'User Created Successfully!');

        // User::create($request->all());
        // return redirect('admin/user')->with('status', 'Created successfully!');
    }

    public function show($id)
    {
        //return view('backend.profile.show');

        $user = User::findOrFail($id);
        return view('backend.users.show', compact('user'));
    }

    public function profile(){
        $user = Auth::user()->id;
        return view('backend.profile.show', compact('user'));
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));

    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if($request->hasfile('image')){
            $img = $request->file('image');
            $folder = public_path('images/profile');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move($folder, $imgName);
            $user->image = $imgName;
        }

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('admin/user')->with('status', 'User Updated Successfully!');

    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/user')->with('status', 'Deleted User Successfully!');
    }
}
