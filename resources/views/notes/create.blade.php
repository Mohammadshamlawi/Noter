<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .categories > li > a:hover::before {
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

        .save-btn {
            border: none;
            background: transparent;
        }

        .save-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">

<form method="POST" action="{{ route('store', ['item' => 'note']) }}"
      style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
    @csrf

    <div class="center">
        <div style="margin-top: 10px; margin-bottom: 10px; padding: 10px; width: 80%;" class="white-box">

            <a href="{{ route('index', ['item' => 'note']) }}" style="float: left;" class="black-22"
               title="Home Page"><span>&#8592;</span></a>

            <button type="submit" style="float: right;" class="black-22 save-btn"><span
                    title="Save">&check;</span></button>

            <div class="center" style="margin-left: 30px; margin-right: 30px;">
                <input class="black-22" alt="Note Title" title="Note Title" placeholder="Title"
                       style="width: 90%; border-radius: 15px; padding: 5px; text-align: center;" required name="title"
                       maxlength="510">

                <input type="checkbox"
                       style="margin-left: 10px; float: right; height: 30px; transform: scale(1.5); cursor: pointer;"
                       name="is_locked" title="Unlocked" onclick="this.title = this.checked ? 'Locked' : 'Unlocked'">
            </div>
        </div>
    </div>

    @if(!empty($titles))
        <div class="center" style="margin-bottom: 10px;">
            <label>
                <select class="black-22" name="parent">
                    @foreach($titles as $id => $title)
                        <option value="{{ $id }}">{{ $title }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    @endif

    <div class="center" style="height: calc(100% - 80px);">
        <textarea class="white-box" name="content" required maxlength="1073741823"
                  placeholder="Content"
                  style="padding: 10px; text-align: left; word-wrap: break-word; white-space: pre-wrap; height: calc(100% - 30px); margin-bottom: 20px;"></textarea>
    </div>

</form>
</body>

</html>
