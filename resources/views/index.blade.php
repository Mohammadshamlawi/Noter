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
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
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

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }
        }

        .selected {
            border-bottom: 1px ridge blue;
        }

        .categories {
            list-style-type: none;
            border-bottom: 1px ridge #454546;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .categories > li {
            display: inline-block;
            list-style-type: none;
            width: 25%;
        }

        .categories > li > a {
            display: block;
            text-align: center;
            padding: 9px 10px 3px;
            text-decoration: none;
        }

        .categories > li > a:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
        }

        .categories > li > a:hover::before {
            width: 200%;
            height: 200%;
            transform: translate(-50%, -50%) scale(1);
        }

        .center {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">

    <div style="display: flex; justify-items: center;" class="justify-center">
        <input placeholder="Search" id="search_bar"
            style="background: white; padding: 15px; border-radius: 50px; box-shadow: 0 4px 6px 0 rgba(32, 33, 36, .28); width: 50%; margin-top: 30px; font-size: 22px; color: rgb(66, 66, 66);">

        <a href="{{ route('create', ['item' => $item]) }}" title="Create {{ ucwords($item) }}"
            style="text-align: center; text-decoration: none; font-size: 40px; align-items: center; margin-top: 30px; margin-left: 20px;">+</a>
    </div>

    <div style="display: flex; justify-items: center; width: 100%; margin: 0; padding: 0;" class="justify-center">
        <ul id="tabs" class="categories" style="width: 70%; margin-top: 10px;">
            <li id="note" @class(['selected' => $item === 'note'])><a href="{{ route('index', ['item' => 'note']) }}">Notes</a>
            </li>
            <li id="project" @class(['selected' => $item === 'project'])><a
                    href="{{ route('index', ['item' => 'project']) }}">Projects</a></li>
            <li id="collection" @class(['selected' => $item === 'collection'])><a
                    href="{{ route('index', ['item' => 'collection']) }}">Collections</a></li>
        </ul>
    </div>

    <div style="display: block; width: 100%; height: 100%; margin-bottom: 50px;">
        <div class="center">
            <ul id="content"
                style="list-style-type: none; width: 70%; border: none; text-align: center; margin: 0; padding: 0; height: 100%;">
                @each($item . 's.index', $items, $item, 'empty')
            </ul>
        </div>

        <div class="center">
            {{ $items->links() }}
        </div>
    </div>

</body>

</html>
