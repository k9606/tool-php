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
            ->select('id', 'name', DB::raw("if(CHAR_LENGTH(`name`) > 8, concat(substring(`name`, 1, 6), '...'), `name`) as tname"), DB::raw("concat('http://renren.maoyun.tv/ftp', `image`) as image"), DB::raw("date(`updated_at`) as uptime"))
            ->paginate(18);

        return view('drama.index', ['lists' => $lists]);
    }

    public function search(Request $request)
    {
        $searchKey = $request->input('search_key');
        if (!$searchKey || mb_strlen($searchKey) > 10) return json_msg();

        DB::table('drama_down_search_history')
            ->insert([
                'ip' => $request->getClientIp(),
                'key' => $searchKey,
                'type' => 2,
                'created_at' => date('Y-m-d H:i:s', time())
            ]);
        $lists = DB::table('drama')
            ->select('id', 'name', DB::raw("if(CHAR_LENGTH(`name`) > 8, concat(substring(`name`, 1, 6), '...'), `name`) as tname"), DB::raw("concat('http://renren.maoyun.tv/ftp', `image`) as image"), DB::raw("date(`updated_at`) as uptime"))
            ->where('name', 'like', "%$searchKey%")->get();

        return json_msg(200, 'ok', $lists);

    }

    public function link(Request $request)
    {
        $id = $request->input('did');
        if (!is_numeric($id)) return json_msg();

        DB::table('drama_down_search_history')
            ->insert([
                'ip' => $request->getClientIp(),
                'key' => $id,
                'type' => 1,
                'created_at' => date('Y-m-d H:i:s', time())
            ]);

        $data = DB::table('drama_link')
            ->where('drama_id', $id)
            ->orderBy('season')
            ->orderBy('episode')
            ->get(['season', 'episode', 'link'])
            ->toArray();
        if (!$data) return json_msg();

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
