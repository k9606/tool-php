<?php

namespace App\Http\Controllers\Drama;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function dramaList()
    {
        $list = DB::table('drama')->limit(18)->get();
        foreach ($list as $v) {
            $v->image = 'http://files.zmzjstu.com/ftp' . $v->image;
        }
        return json_encode($list);
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
        //return json_msg(200, '请求成功', $list);
    }
}
