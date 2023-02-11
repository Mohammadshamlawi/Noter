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

        a {
            background-color: transparent;
            color: inherit;
            text-decoration: inherit;
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
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

        ul {
            list-style-type: none;
            border-bottom: 1px ridge #454546;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            list-style-type: none;
            width: 25%;
        }

        li a {
            display: block;
            text-align: center;
            padding: 9px 10px;
            padding-bottom: 3px;
            text-decoration: none;
        }

        li a:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        }

        li a:hover::before {
            width: 200%;
            height: 200%;
            transform: translate(-50%, -50%) scale(1);
        }

        .selected {
            border-bottom: 0.5px ridge blue;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">

    <div style="display: flex; justify-items: center;" class="justify-center">
        <input placeholder="Search" id="search_bar"
            style="background: white; padding: 15px; border-radius: 50px; box-shadow: 0 4px 6px 0 rgba(32, 33, 36, .28); width: 50%; margin-top: 30px; font-size: 22px; color: rgb(66, 66, 66);">
    </div>

    <div style="display: flex; justify-items: center; width: 100%; margin: 0; padding: 0;" class="justify-center">
        <ul id="tabs" style="width: 70%; margin-top: 10px;">
            <li id="note" @class(['selected' => $item === 'note'])><a href="{{ route('main', ['item' => 'note']) }}">Notes</a>
            </li>
            <li id="project" @class(['selected' => $item === 'project'])><a
                    href="{{ route('main', ['item' => 'project']) }}">Projects</a></li>
            <li id="collection" @class(['selected' => $item === 'collection'])><a
                    href="{{ route('main', ['item' => 'collection']) }}">Collections</a></li>
        </ul>
    </div>

    <div style="display: block; width: 100%; height: 100%; margin-bottom: 50px;">
        <center>
            <ul id="content"
                style="list-style-type: none; width: 70%; border: none; text-align: center; margin: 0; padding: 0; height: 100%;">
                @each($item . 's.index', $items, $item, 'empty')
            </ul>
        </center>
    </div>

</body>

</html>
