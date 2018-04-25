<?php

namespace App\Http\Controllers\Drama;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DramaController extends Controller
{
    //
    public function dramaList()
    {
        $list = DB::table('drama')->limit(25)->get();
        foreach ($list as $v) {
            $v->image = 'http://files.zmzjstu.com/ftp' . $v->image;
        }
        return json_encode($list);
    }
}
