<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
    protected $post;

    public function index()//一覧表示-get//uriの後に何も書かないとこっちが呼び出される？？
    {
        $items = Room::all();
        return $items->toArray();
    }

    public function create()//新規作成-get
    {
        //
    }

    public function store(Request $request)//新規保存-post
    {
        return Room::create([
            'room_id' => $request['room_id'],
        ]);
    }

    public function show($room_id)//表示-get
    {
        $item = Room::where('room_id',$room_id)->get();//urlに続けて/そしてroom_idで絞込
        return $item->toArray();
    }

    public function edit($id)//編集-get
    {
        //
    }

    public function update($id)//更新-put/patch
    {
        //
    }

    public function destroy($id)//削除-delete
    {
        return Room::destroy($id);
    }
}

