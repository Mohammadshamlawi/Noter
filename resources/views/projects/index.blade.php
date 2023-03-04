<center>
    <li style="display: block; width: 100%;">
        <button
            style="margin-top: 15px; padding: 10px; border-radius: 10px; width: calc(100% - 30px); height: fit-content; box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28); background-color: white;">
            <div style="display: flex; align-items: center;">
                <a style="text-decoration: underline;"
                    href="{{ route('show', ['item' => 'project', 'id' => $project->id]) }}">
                    <b><span style="float:left; color:goldenrod; font-size: 18px;">{{ $project->title }}</span></b>
                </a>

                <a style="text-decoration: underline;"
                    href="{{ route('show', ['item' => 'project', 'id' => $project->id]) }}">
                    <span
                        style="float: left; font-size: 10px; color: gray; margin-left: 10px;">#{{ $project->id }}</span>
                </a>

                <span
                    style=" margin-left: 15px; float: left; font-size: 10px; color: gray;">{{ $project->created_at->toDateString() }}</span>

                <span style="margin-left: 10px;">{{ $project->is_locked ? '🔒' : '🔓' }}</span>
            </div>
        </button>
    </li>
</center>
