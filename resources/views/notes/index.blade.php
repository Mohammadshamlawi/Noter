<center>
    <li style="display: block; width: 100%;">
        <div
            style="margin-top: 15px; padding: 10px; border-radius: 10px; width: calc(100% - 30px); height: fit-content; box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28); background-color: white;">
            <div style="display: flex; align-items: center;">
                <a style="text-decoration: underline;"
                    href="{{ route('show', ['item' => 'note', 'id' => $note->id]) }}"><b>
                        <span style="float:left; color:goldenrod; font-size: 18px;">{{ $note->title }}</span>
                    </b>
                </a>

                <a style="text-decoration: underline;" href="{{ route('show', ['item' => 'note', 'id' => $note->id]) }}">
                    <span
                        style="float: left; font-size: 10px; color: gray; margin-left: 10px;">#{{ $note->id }}</span>
                </a>

                <span style="margin-left: 10px;">{{ $note->is_locked ? '🔒' : '🔓' }}</span>
            </div>
            <span style="float: left; font-size: 10px; color: gray;">{{ $note->created_at->toDateString() }}</span>
            <br>
            <div style="display: block; text-align: left;">
                {!! htmlspecialchars_decode($note->trimmed_content) !!}
            </div>
        </div>
    </li>
</center>
