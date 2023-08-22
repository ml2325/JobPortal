<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users(){
        $users=User::all();
        return view('users.users',compact('users'));
    }

   

  


    public function delete_job(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
