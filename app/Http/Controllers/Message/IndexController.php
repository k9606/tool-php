<?php

namespace App\Http\Controllers\Message;

use GatewayClient\Gateway;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('drama.chat');
    }

    public function bind(Request $request)
    {
        $userId = Auth::user()['id'];

        $clientId = $request->input('client_id');

        Gateway::bindUid($clientId, $userId);
        //vpd($userId,2);
    }

    public function link(Request $request)
    {
        $id = $request->input('did');
        if (!is_numeric($id)) return json_msg();

        $data = DB::table('drama_link')
            ->where('drama_id', $id)
            ->orderBy('season')
            ->orderBy('episode')
            ->get(['season', 'episode', 'link'])
            ->toArray();

        foreach ($data as $v) {
            $season[] = $v->season;
        }

        $season = array_unique($season);

        //for ()

        foreach ($data as $dv) {
            foreach ($season as $sv) {
                if ($dv->season == $sv) {
                    $newData[$sv][] = [
                        'episode' => $dv->episode,
                        'link' => $dv->link
                    ];
                }
            }
        }

        return json_msg(200, '请求成功', $newData);
    }

    public function dramaLink(Request $request)
    {
        $dramaId = $request->input('drama_id');
        if (is_numeric($dramaId)) {
            return json_msg();
        }
        $dramaId = 15;
        $list = DB::table('drama_link')->select('season', 'episode', 'link')->where('drama_id', $dramaId)->get();
        foreach ($list as $v) {
            $arr['s'] = $v->season;
        }

        return json_msg(200, '请求成功', $list);
    }
}
