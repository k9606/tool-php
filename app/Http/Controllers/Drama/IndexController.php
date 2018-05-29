<?php

namespace App\Http\Controllers\Drama;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $lists = DB::table('drama')
            ->select('id', 'name', DB::raw("concat('http://files.zmzjstu.com/ftp', `image`) as image"))
            ->paginate(18);

        return view('drama.index', ['lists' => $lists]);
    }

    public function link(Request $request)
    {
        $id = $request->input('did');
        if (!is_numeric($id)) return json_msg();

        $sql = 'SELECT season, episode, link FROM `drama_link` where drama_id = ? ORDER BY season, episode';
        $data = DB::select($sql, [$id]);
        if (!$data) return json_msg();
        foreach ($data as $k => $v) {
            $list[$v->season] = [
                'episode' => $v->episode,
                'link' => $v->link
            ];
        }

        return json_msg(200, '请求成功', $list);
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
