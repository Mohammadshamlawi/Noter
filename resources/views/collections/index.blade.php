<center>
    <li style="display: block; width: 100%;">
        <button
            style="margin-top: 15px; padding: 10px; border-radius: 10px; width: calc(100% - 30px); height: fit-content; box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28); background-color: white;">
            <div style="display: flex; align-items: center;">
                <a style="text-decoration: underline;"
                    href="{{ route('show', ['item' => 'collection', 'id' => $collection->id]) }}">
                    <b><span style="float:left; color:goldenrod; font-size: 18px;">{{ $collection->title }}</span></b>
                </a>

                <a style="text-decoration: underline;"
                    href="{{ route('show', ['item' => 'collection', 'id' => $collection->id]) }}">
                    <span
                        style="float: left; font-size: 10px; color: gray; margin-left: 10px;">#{{ $collection->id }}</span>
                </a>

                <span
                    style=" margin-left: 15px; float: left; font-size: 10px; color: gray;">{{ $collection->created_at->toDateString() }}</span>
            </div>
        </button>
    </li>
</center>
