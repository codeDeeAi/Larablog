<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Bloguser;
use Illuminate\Http\Request;

class BloguserController extends Controller
{
    // public function create(Request $request)
    // {

    //     //  Validation
    //     $this->validate($request, [
    //         'firstName' => 'required',
    //         'lastName' => 'required',
    //         'username' => 'required|unique:blogusers',
    //         'phone' => 'required|min:6|unique:blogusers',
    //         'email' => 'required|email|unique:blogusers',
    //         'password' => 'required|min:6',
    //         'password2' => 'required',
    //     ]);

    //     return response()->json([
    //         'message' => 'hello',
    //         $request->signup_firstname,
    //         $request->signup_lastname,
    //         $request->signup_username,
    //         $request->signup_email,
    //         $request->signup_phone,
    //         $request->signup_password,
    //         // $request
    //     ]);

       

    //     // $password = bcrypt($request->password);

    //     // $user = Bloguser::create([
    //     //     'email' => $request->email,
    //     //     'firstName' => $request->firstName,
    //     //     'lastName' => $request->lastName,
    //     //     'password' => $password,
    //     //     'phone' => $request->phone,
    //     //     'username' => $request->username
    //     // ]);
    // }

    protected function viewUsers()
    {
        return Bloguser::all();
    }

    public function editUsers(Request $request)
    {
        // Validation
        $this->validate($request, [
            'lastName' => 'bail',
            'username' => "bail|unique:users,id,$request->id",
            'phone' => "bail|min:6|unique:users,id,$request->id",
            'email' => "bail|email|unique:users,id,$request->id",
            'password' => "bail|min:6|unique:users,id,$request->id",
            'password2' => 'bail',
        ]);
            
        if ($request->password == '') {
            // Update user
            Bloguser::where('id', $request->id)->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        } else {
            // encryt password
            $password = bcrypt($request->password);
            // Update user
            Bloguser::where('id', $request->id)->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => $password
            ]);
        }
    }


    public function deleteUser(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'username' => 'required',
        ]);


        Bloguser::where('id', $request->id)->delete();
    }


    // ========================AUTHENTICATION=====================
    public function userLogin(){

    }
}
