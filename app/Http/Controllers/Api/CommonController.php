<?php

namespace App\Http\Controllers\Api;

use GatewayClient\Gateway;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    //
    public function index(Request $request)
    {
        $msg = $request->input('msg');
        $ClientId = $request->input('client_id');
        //Gateway::sendToAll($msg, '', $ClientId);

        Gateway::sendToUid(2, $msg);

        return jsonp_msg(200, 'ok', $msg);
    }
}
