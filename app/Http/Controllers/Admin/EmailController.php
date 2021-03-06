<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use Config;
use Session;
use App\Model\Email;

class EmailController extends Controller
{
    // 当前应用邮件列表
    public function getIndex(Request $request)
    {
        return view('admin.email.index');
    }

    public function postLists(Request $request)
    {
        $fields = array('id', 'user_id', 'email', 'subject', 'pushed_at', 'created_at');
        $searchFields = array('user_id', 'email', 'subject');

        $data = Email::where('app_id', Session::get('current_app_id'))
            ->whereDataTables($request, $searchFields)
            ->orderByDataTables($request)
            ->skip($request->start)
            ->take($request->length)
            ->get($fields);
        foreach ($data as &$v) {
            $user = Cache::get(Config::get('cache.users') . $v->user_id);
            $v->user_id = $user['username'];
        }
        $draw = (int)$request->draw;
        $recordsTotal = Email::where('app_id', Session::get('current_app_id'))->count();
        $recordsFiltered = strlen($request->search['value']) ? count($data) : $recordsTotal;

        return $this->response->array(compact('draw', 'recordsFiltered', 'recordsTotal', 'data'));
    }

    // 显示邮件详细
    public function getShow(Request $request, $id)
    {
        if (! Email::where('app_id', Session::get('current_app_id'))->exists()) {
            return $this->response->array(array('code' => 0, 'message' => 'Forbidden'));
        }

        $email = Email::find($id);

        return view('admin.email.show')->with(compact('email'));
    }
}
