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

    public function create()//新規作成-get
    {
        //
    }

    public function store(Request $request)//新規保存-post
    {
//        $user = Post::where('user_name',$user_name)->first();
//        $body = new Post();
//        $body-> body = request('body');
//        $user->save($body);
//        return [];
//        return Post::create([
//            'name' => $user_name['name'],
//        ]);
        return Post::create([//requestからそれぞれの値を取り出してデータベースに入れる
            'body' => $request['body'],
            'user_name' => $request['user_name'],
            'ip' => $request['ip'],
            'room_id' => $request['room_id'],
        ]);
//
//            $post = new Post();
//            $post->body = request('body');
//            $post->user_name = request('user_name');
//            $post->ip = request('ip');
//            $post->room_id = request('room_id');
//            save($post);
//            $restdata = new Post();
//            $form = $request->all();
//            unset($form['_token']);
//            $restdata->fill($form)->save();
//           return redirect('/rest');
//
//        return Post::create([
//           'body' => $request['body'],
//        ]);
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
        return Post::destroy($id);
    }
}
