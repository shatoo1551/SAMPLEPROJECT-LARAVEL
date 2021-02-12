<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <link href="index.blade.css" type="text/css" rel="stylesheet">
    <title>Document</title>
    <style>
                .post{
            width:600px;
            border-bottom: solid gray 1px;
            padding-bottom: 10px;
        }
        .post-p{
            width:100%;
        }
        .post-button{
            float:right;
        }
        .box{
            background-color:rgb(250, 151, 151);
            padding-left:10px;
            padding-top:20px;
            width:1075px;
            color:black;
            text-decoration: none;
            width:100%;
            margin-bottom:10px
        }
        header{
        height:40px;
        background-color: #C9FFC3;
        font-family: normal;
        font-size: 12px;
        }
        body{
            background-color: rgb(67, 130, 247);
        }
        dt{
            float:left;
            clear:both;
        }
        .comment {
        background:#d3acd4;
        padding: 20px;
        width:200px;
        height:160px;
        margin-top: 20px;
        margin-left: 20px;
        float: left;
        }
        header{
            height:40px;
            background-color: #C9FFC3;
            font-family: normal;
            font-size: 12px;
            color: darkgrey;
        }
        a{
        text-decoration: none;
        }

        body{
            background-color: rgb(85, 139, 240);
        }
        dt{
        float:left;
        clear:both;
        }
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
        @yield('contents')
    <footer>
        @include('footer')
    </footer>
</body>
</html>
