

<?php
    //function.phpを起動
    //require_once('function.php');
    //どのデータを持ってくるかを定義
    //$dsn= 'mysql:host=localhost;dbname=laravel_news;charset=utf8';
    //データベース接続&確認 mysqli取得
    //$dbh = dbConnect();
    //データ取得をそして格納
    //$newsdata = getAllNews1($dbh);
    //エラーメッセージ配列作成
    $error_message = array();
    //送信ボタンを押されたら
    if( !empty($_POST['submit']) ) {
        // 表示名の入力チェック
        if( empty($_POST['view_name'])  ){
            $error_message[] = '表示名を入力してください';
         
        }
        if(  empty($_POST['message'])  ) {
            $error_message[] = 'コメントを入力してください。';
        }
        if( empty($error_message) ) {
            NewCreateComments3($id);
            header('Location: detail.php?id='.$id);
        }	
    }
?>

@extends('layout')
@section('contents')
    <h2>さぁ、最新のニュースをシェアしましょう</h2>

    <form  method="POST"  action="{{ route('store')  }}" onSubmit="return checkSubmit()">
        @csrf
        <div class="post">
        <dl>
            <dt>タイトル：</dt>
            <dd><input  name="title" type="text"></dd>
            @if ($errors->has('title'))
                <div class="text-danger"> 
                    <!-- 1番最初のバリデーションに引っかかったエラーを表示 -->
                    {{ $errors->first('title') }}
                </div>
            @endif
            <dt>記事：</dt>
            <dd><textarea name="text" id="text" cols="50" rows="10"></textarea></dd>
            @if ($errors->has('text') )
                <div class="text-danger"> 
                    {{ $errors->first('text')  }}
                </div>
            @endif
            <input class="button" name="submit" type="submit" value="送信">
        </dl>
        </div>
    </form>
    <?php foreach ($error_message as $error): ?>
        <ul><li> <?php echo $error  ?> </li></ul>
    <?php endforeach;?>

    <h1>ニュース一覧</h1>
    @if (session('err_msg'))
            <p class="error" >
                {{session('err_msg')}}
            </p>
    @endif
        <!--<p><a href="form.html">新規作成</a></p>-->
    <?php  if (empty($newsdata )){
                    echo "ニュースはありません";
    } ?>
    <table>
        @foreach($newsdata as $column)
            <div class="box">
                <b>{{  $column->title  }}</b><br><br>
                {{  $column->text  }}<br><br>
                <a href="sampleproject/public/detail/{{  $column->id  }}">  記事全文・コメントを見る</a><br><br>
                <a href="/test"> テスト</a><br><br>
                <form method="GET" action="{{route('delete' ,$column->id )}}" onSubmit="return checkDelete()">
                    <button type="submit" value="削除"　id="">削除</button>
                </form>
            </div>
        @endforeach 
    </table>
    <script>
        function checkSubmit(){
            if (window.confirm('送信して良いですか')){
                return true;
            }else{
                return false
            }
        }
    </script>
    <script>
        function checkDelete(){
            if (window.confirm('削除して良いですか')){
                return true;
            }else{
                return false
            }
        }
    </script>
@endsection