<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5;
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .justify-center {
            justify-content: center
        }

        .min-h-screen {
            min-height: 100vh
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }
        }

        .selected {
            border-bottom: 0.5px ridge blue;
        }

        .categories {
            list-style-type: none;
            border-bottom: 1px ridge #454546;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .categories>li {
            display: inline-block;
            list-style-type: none;
            width: 25%;
        }

        .categories>li>a {
            display: block;
            text-align: center;
            padding: 9px 10px;
            padding-bottom: 3px;
            text-decoration: none;
        }

        .categories>li>a:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        }

        .categories>li>a:hover::before {
            width: 200%;
            height: 200%;
            transform: translate(-50%, -50%) scale(1);
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .white-box {
            border-radius: 10px;
            width: 70%;
            height: fit-content;
            box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28);
            background-color: white;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        .black-22 {
            color: black;
            font-size: 22px;
        }

        .delete {
            margin-bottom: 10px;
            color: white;
            background-color: red;
            border-radius: 10px;
            box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28);
            padding: 10px 20px;
            text-decoration: none;
        }

        .delete:hover {
            background-color: #e53e3e;
            text-decoration: none;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">

    <div style="position: absolute; top: 0px; bottom: 0px; left: 0px; right: 0px;">

        <div class="center">
            <div style="margin-top: 10px; padding: 10px; width: 80%;" class="white-box">

                <a href="{{ route('index', ['item' => 'project']) }}" style="float: left;" class="black-22"
                    title="Home Page"><span>&#8592;</span></a>

                <a href="{{ route('show', ['item' => 'project', 'id' => $project->id]) }}" class="center black-22"
                    style="font-size: 14px; float: right; width: 22px; height: 33px; align-items: center;">#{{ $project->id }}</a>

                <a class="center black-22" href="{{ route('edit', ['item' => 'project', 'id' => $project->id]) }}"
                    style="float: right; align-items: center; margin-right: 10px;"
                    title="Edit"><span>&#9998;</span></a>

                <div class="center" style="margin-left: 30px; margin-right: 30px; text-align: center;">
                    <b><span class="black-22">{{ $project->title }}</span></b>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 20px; height: fit-content;" class="center">
            <ul id="content"
                style="list-style-type: none; width: 70%; border: none; text-align: center; margin: 0; padding: 0; height: 100%;">
                @each('notes.index', $project->notes, 'note', 'empty')
            </ul>
        </div>

        <div class="center">
            <form method="POST" action="{{ route('destroy', ['item' => 'project', 'id' => $project->id]) }}">
                @method('DELETE')
                @csrf

                <button class="delete">Delete</button>
            </form>
        </div>

    </div>
</body>

</html>
