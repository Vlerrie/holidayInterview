<ul class="list-group">
    @foreach($holidays as $holiday)
        <li class="list-group-item">
            {{$holiday->date}}
            {{$holiday->name}}
        </li>
    @endforeach
</ul>
