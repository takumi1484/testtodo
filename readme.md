<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## 検討

- リクエストをhttpsに統一すること。これをしないとherokuに挙げてもhttpリクエスト部分が使えない。現状、データベース全般が使えない
- 削除処理。今回のテーマ的には不要にも思えたが管理画面を作るなりしてput,deleteも実装するべき。get,postだけでは不十分->管理画面でのdelete実装
- データベース内のデータ変更を検知してjsを発火させたい。そうしないととても会話ができるとは思えない。
    時間で定期的に更新をかけるとリクエスト過多でエラーになるしすごく重くなった。タイピング一つ一つを検知して更新とかが妥当か...？
- axiosのリクエストをいちいち書くのは正直面倒だった。importしてuri、取得する値を簡略化するほうがよさそう。
- 自力でリクエスト関連を作り直しても出たhttpとhttpsが混同しているというエラー。herokuにdeployする過程で間違えているかもしれない
- vu.ejsjという名前でありながらオブジェクトや配列をindexで直接指定できない(spliceで解決)、deleteの挙動が怪しいなど...時にはvueを疑う必要もありそう？


## ajax、axios、jquery、非同期通信,,,

ajaxはjsのxmlhttprequestを利用した非同期通信の方式
AJAX=AsynchronousJAvascriptXmlhttprequest(asynchronousは非同期の意)
機能の名前ではなく手法のようなものの名称であり実態のあるものではない

jsには何のインポートもライブラリもなしにデフォルト機能としてxmlhttprequestがある。
これを使えばajax通信は可能。記述は面倒。
つまりjqueryやaxiosが無くともajax通信することもできる（いわゆる生のjs記述）

jqueryには$.ajaxというjsにあるxmlhttprequestをとても簡単に使える機能がある
この機能から$.ajaxを先に知ったせいでajaxを勘違いして使うものだと思っていた。

axiosは導入方法がjqueryと似ていてurlからの読み込みやnodeでのインストールで使える
機能に関してはjqueryの$.ajaxとよく似ていてjsにおけるajax通信をとても簡単に扱えるようにしたもの

