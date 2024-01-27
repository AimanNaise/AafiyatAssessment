<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function form(){
        return view('welcome');
    }

    public function save(Request $request){
        $validation= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
        ]);
        // dd($request); ----> checked
        $saved = new User();
        $saved->name = $request->name;
        $saved->email = $request->email;
        $saved->gender = $request->gender;
        $saved->birthday = $request->birthday;
        $saved->is_active = $request->status;
        $saved->password = bcrypt($request->password);
        $saved->save();
        if($saved->save()){
            return back()->with('success', 'User already saved');
            }
          else{
            return back()->with('error', 'Error, Please try again!');
          }
    }

    public function table(){
        $user=User::where('is_active',1)->get();
        return view('table',['activeusers'=>$user]);

    }

    public function delete($id){
        $user=User::find($id);
        $user->is_active=false;
        $user->deleted_at=now();
        $user->save();
        if($user){
        return back()->with('success', 'User already deleted');
        }
      else{
        return back()->with('error', 'Try again!');
      }
    }
}
