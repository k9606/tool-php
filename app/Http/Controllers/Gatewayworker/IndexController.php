<?php

namespace App\Http\Controllers\Gatewayworker;

use GatewayClient\Gateway;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $msg = $request->input('msg');
        Gateway::sendToAll($msg);

        return jsonp_msg(200, 'ok', $msg);
    }
}
