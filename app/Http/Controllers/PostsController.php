<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    protected $post;

    public function index()//一覧表示-get
    {
        return Post::all();
    }

    public function create()//新規作成-get
    {
        //
    }

    public function store()//新規保存-post
    {
        //
    }

    public function show($id)//表示-get
    {
        //
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
