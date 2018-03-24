<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    protected $post;

    public function index()//一覧表示-get
    {
        $items = Post::all();
        return $items->toArray();
    }

    public function create($user_name)//新規作成-get
    {
        $user = Post::where('user_name',$user_name)->first();
        $body = new Post();
        $body-> body = request('body');
        $user->save($body);

        return [];
    }

    public function store()//新規保存-post
    {
        //
    }

    public function show($room_id)//表示-get
    {
        $item = Post::where('room_id',$room_id)->get();//urlに続けて/そしてroom_idで絞込
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
        //
    }
}
