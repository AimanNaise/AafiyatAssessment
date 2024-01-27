<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    // Display the form view
    public function form(){
        return view('welcome');
    }

    // Save user data from the form
    public function save(Request $request){
        // Validation rules for form fields
        $validation= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
        ]);

        // Create a new User instance
        $saved = new User();
        
        // Set user data from the form
        $saved->name = $request->name;
        $saved->email = $request->email;
        $saved->gender = $request->gender;
        $saved->birthday = $request->birthday;
        $saved->is_active = $request->status;
        $saved->password = bcrypt($request->password);
        
        // Save the user data
        $saved->save();
        
        // Check if user data is saved successfully
        if($saved->save()){
            return back()->with('success', 'User already saved');
        } else {
            return back()->with('error', 'Error, Please try again!');
        }
    }

    // Display the table view with active users
    public function table(){
        // Get active users from the database
        $user = User::where('is_active', 1)->get();
        
        // Return the table view with active users data
        return view('table',['activeusers'=>$user]);
    }

    // Soft delete user 
    public function delete($id){
        // Find the user by ID
        $user = User::find($id);
        
        // Set is_active to false and mark as deleted
        $user->is_active = false;
        $user->deleted_at = now();
        
       
        $user->save();
        
        // Check if user is deleted successfully
        if($user){
            return back()->with('success', 'User already deleted');
        } else {
            return back()->with('error', 'Try again!');
        }
    }
}