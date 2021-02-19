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
    <h1>ニュース一覧</h1>
    @if (session('err_msg'))
            <p class="error" >
                {{session('err_msg')}}
            </p>
    @endif
    <table>
        @foreach($newsdata as $column)
            <div class="box">
                <b>{{  $column->title  }}</b><br><br>
                {{  $column->text  }}<br><br>
                <a href="{{route ('detail', $column->id)}}">  記事全文・コメントを見る</a><br><br>
                <form method="post" action="{{route('destroyaritcle',  $column->id)}}" onSubmit="return checkDelete()">
                @csrf
                @method('DELETE')
                <button type="submit" value="削除"　id="">削除</button>
                </form>
            </div>
        @endforeach 
    </table>
@endsection

