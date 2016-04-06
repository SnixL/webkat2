@if (isset($categories))
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategorien<b class="caret"></b></a>
        <ul class="dropdown-menu">
            @foreach($categories as $category)
                <li><a href="{{ $category->url }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif