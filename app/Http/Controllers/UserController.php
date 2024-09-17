<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;



class UserController extends Controller
{
    //here create all crud logic
    public function loadAllUsers(){
        if(auth()->user()->role == 'admin'){
            $all_users = User::all();
            return view('users',compact('all_users'));
        }
        else{
            return (401);
        }

    }

    public function loadAddUserForm(){
        if(auth()->user()->role == 'admin'){
            return view('add-user');
        }
        else{
            return (401);
        }

    }

    public function AddUser(Request $request){
        if(auth()->user()->role == 'admin'){
            $request->validate([
                'full_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required',
                'password' => 'required|confirmed|min:8',
            ]);
            try {
                // register user here
                $new_user = new User;
                $new_user->name = $request->full_name;
                $new_user->email = $request->email;
                $new_user->phone_number = $request->phone_number;
                $new_user->password = Hash::make($request->password);
                $new_user->save();

                return redirect('/users')->with('success','User Added Successfully');
            } catch (\Exception $e) {
                return redirect('/add/user')->with('fail',$e->getMessage());
            }
        }
        else{
            return (401);
        }
        // perform form validation here



    }

    public function EditUser(Request $request)
{
    if (auth()->user()->role == 'admin') {
        // Perform form validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'phone_number' => 'required|string',
        ]);

        try {
            $update_user = User::where('id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);

            // Check if any rows were updated
            if ($update_user > 0) {
                return redirect('/users')->with('success', 'User Updated Successfully');
            } else {
                return redirect('/edit/user/' . $request->user_id)->with('fail', 'User update failed or no changes made.');
            }
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return redirect('/edit/user/' . $request->user_id)->with('fail', 'An error occurred: ' . $e->getMessage());
        }
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}



    public function loadEditForm($id){
        if(auth()->user()->role == 'admin'){
            $user = User::find($id);

            return view('edit-user',compact('user'));
        }
        else{
            return (401);
        }

    }

    public function deleteUser($id){
        if(auth()->user()->role == 'admin'){
            try {
                User::where('id',$id)->delete();
                return redirect('/users')->with('success','User Deleted successfully!');
            } catch (\Exception $e) {
                return redirect('/users')->with('fail',$e->getMessage());

            }
        }
        else{
            return (401);
        }

    }
}
