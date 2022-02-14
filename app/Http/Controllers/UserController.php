<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatuser;
use Session;
use DB;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function signupPage(){
        return view('signup');
    }

    public function loginPage(){
        return view('login');
    }

    public function userPage(){
        return view('user');
    }

    public function chatPage(){
        return view('chat');
    }

    protected function fetchImgUrl($req){

            $image = $req->file('image');
            $image_name = rand(10, 1000000);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $imgUrl = $upload_path.$image_full_name;
            $image->move($upload_path, $image_full_name);
            return $imgUrl;
        
    }


    public function doSignup(Request $req){
        $user = new Chatuser();
        
        $user->unique_id = rand(10, 1000000);
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->password = md5($req->password);
        $imgUrl =$this->fetchImgUrl($req);
        $user->image = $imgUrl;
        $user->status = "Active Now";

        $user->save();

        return view('/login');
    }

    public function doLogin(Request $req){
        $userInfo = Chatuser::where('email', $req->email)->first();
        $allUserInfo = Chatuser::where('status', 'Active Now')->get();
        $userEmail = $userInfo->email;
        $userPassword = $userInfo->password; 
        if($userEmail === $req->email && $userPassword === md5($req->password)){
            Session::put('uid', $userInfo->unique_id);
            return view('user', [
                'userInfo' => $userInfo,
                'allUsers' => $allUserInfo,
            ]);
        }
        else{
            return view('login')->with('msg', 'Login info invalid');
        }
        
    }

    public function chatDuet($uid1){
        $user2 = Chatuser::where('unique_id', $uid1)->first();
        $user1 = Chatuser::where('unique_id', Session::get('uid'))->first();
        DB::select("
            select * from messages where 
        ");
        return view('chat', [
            'user1' => $user1,
            'user2' => $user2,
            // 'msgDatas' => $msgData,
        ]);
    }

    public function backToUser(){
        return view('user');
    }

    
}
