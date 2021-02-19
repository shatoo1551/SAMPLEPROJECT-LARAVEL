<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\NewsContoller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsCommentRequest;
class NewsController extends Controller
{
    //最初の画面を表示させる
    public function index()
    {
        $newsdata=Article::all();
        return view("news.index" ,['newsdata'=>$newsdata]);
    }
    //コメント画面を表示させる
    public function showDetail($id)
    {
        $newsdata=Article::find($id);
        return view("news.detail" ) ->with ([
            'newsdata'=>$newsdata,
        ]);
    }
    //ニュースを投稿
    public function exeStore(NewsRequest $request)
    {
        \DB::beginTransaction();
        try{
            $article = new Article;
            $article->title = $request->title;
            $article->text = $request->text;
            $article->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','ニュースを投稿しました');
        return redirect(route('newsdata'));
    }
    //コメントを投稿
    public function exeComments($id,NewsCommentRequest $request)
    {
        \DB::beginTransaction();
        try{
            $comment = new Comment;
            $comment->view_name = $request->view_name;
            $comment->message = $request->message;
            $comment->article_id = $request->id;
            $comment->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg','コメントを投稿しました');
        return redirect(route('detail', $id));
    }
    //ニュース削除
    public function ArticleDestroy($id)
    {
        try {
            Article::destroy($id);
        }catch(\Thorowable $e){
            abort(500);
        }
        \Session::flash('err_msg','ニュース削除しました');
        return redirect(route('newsdata'));
    }
    //コメント削除
    public function CommentDestroy($id)
    {
        $article_id=Comment::find($id)-> article ->id;
        try {
            Comment::destroy($id);
        }catch(\Thorowable $e){
            abort(500);
        }
        \Session::flash('err_msg','コメント削除しました');
        return redirect(route('detail',  $article_id));
    }
}