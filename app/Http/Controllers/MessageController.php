<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use App\Models\Chatuser;


class MessageController extends Controller
{
    public function inMsg(Request $req){
        $msgInfo = new Message();

        $msgInfo->incoming_id = $req->incoming_id;
        $msgInfo->outgoing_id = $req->outgoing_id;
        $msgInfo->message = $req->message;

        $msgInfo->save();

        $allMsg = Message::all();
        // $allMsg = DB::table('messages')
        //             ->where(
        //                 [ 'incoming_id', '=', $uid1],
        //                 [ 'incoming_id', '=', Session::get('uid')],
        //                 [ 'outgoing_id', '=', Session::get('uid')],
        //                 [ 'outgoing_id', '=', $uid1], 
        //             )->get();
        $user2 = Chatuser::where('unique_id', $req->incoming_id)->first();
        $user1 = Chatuser::where('unique_id', $req->outgoing_id)->first();
        return view('chat', [
            'allMsg' => $allMsg,
            'user1' => $user1,
            'user2' => $user2,
        ]);

    }





    

    // public function setData(Request $req){
        // $validator = Validator::make($request->all(), [
        //     'msg' => 'required'
        // ]);

        // if($validator->fails()){
        //     return response->json([
        //         'status' => 400,
        //         '' => $validator->messages(),
        //     ]);
        // }
        // else{
            // $setmsg = new Message();
            // $setmsg->incoming_id = $req->input('inid');
            // $setmsg->outgoing_id = $req->input('outid');
            // $setmsg->message = $req->input('msg');

            // $setmsg->save();

            // return response()->json([
            //     'status' => 200,
            //     'msg' => 'data added succesfully',
            // ]);
        // }
    // }


    // public function fetchMsgData(){
    //     $msgData = Message::all();
    //     return response()->json([
    //         'msgData' => $msgData,
    //     ]);
    // }
}
