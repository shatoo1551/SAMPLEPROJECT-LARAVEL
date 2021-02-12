<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsComments;
use App\Models\NewsContoller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsCommentRequest;
class NewsController extends Controller
{
    //最初の画面を表示させる
    public function index()
    {
        $newsdata=News::all();

        return view("news.index" ,['newsdata' => $newsdata]);
    }
    //コメント画面を表示させる
    public function showDetail($id)
    {
        $newsdata=News::find($id);
        $newsnumber = $id;
        $comments=NewsComments::where('newsnumber' , $newsnumber) ->get();

        if (empty($comments)){
            \Session::flash('err_msg','コメントがありません');
            return redirect(route('news'));
        }
        return view("news.detail" ) -> with ([
            'newsdata' => $newsdata,
            'comments' => $comments,
        ]);
    }
    //ニュースを登録画面を表示
    public function showCreate()
    {
        return view('news.form');
    }
    //ニュースを投稿
    public function exeStore(NewsRequest $request)
    {
        $inputs = $request-> all();
        \DB::beginTransaction();
        try{
            //ニュースを登録する
            News::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','ニュースを投稿しました');
        return redirect(route('newsdata'));
    }
    //コメントを投稿
    public function exeComments($id,  NewsCommentRequest $request)
    {
        
        $inputs = $request-> all();
        \DB::beginTransaction();
        try{
            //ニュースを登録する
            NewsComments::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','コメントを投稿しました');
        return redirect(route('detail', $id));
    }
    //ニュース削除
    public function exeDelete($id)
    {
        try {
            News::destroy($id);
        }catch(\Thorowable $e){
            abort(500);
        }
        \Session::flash('err_msg','ニュース削除しました');
        return redirect(route('newsdata'));
    }
    //コメント削除
    public function exeDeleteComment(Request $request)
    {
        $newsnumber  =$request-> newsnumber;
        $id  =$request-> id;
        try {
            NewsComments::destroy($id);
        }catch(\Thorowable $e){
            abort(500);
        }
        \Session::flash('err_msg','コメント削除しました');
        return redirect(route('detail', $newsnumber));
    }
}

