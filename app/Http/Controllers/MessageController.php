<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function insertMsg(Request $req){
        $msgInfo = new Message();

        $msgInfo->incoming_id = $req->incoming_id;
        $msgInfo->outgoing_id = $req->outgoing_id;
        $msgInfo->message = $req->message;

        $msgInfo->save();

    }
}
