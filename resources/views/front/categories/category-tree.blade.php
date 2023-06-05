

<!-- category-tree.blade.php -->
<ul class="dropdown-menu">
    @foreach($subCategory as $sub)
        <li class="dropdown-submenu">
            <a class="dropdown-item {{count($sub->children) ? 'dropdown-toggle' : ''}}"
               href="{{route('index.categories', ['category' => $sub->id])}}">{{ $sub->title }}</a>
            @if(count($sub->children))
                @include('front.categories.category-tree', ['subCategory' => $sub->children])
            {{--@else
                <li><a class="dropdown-item dropdown-toggle" href="{{ route('index.categories') }}">{{ $sub->title }}</a></li>--}}
            @endif
        </li>
    @endforeach
</ul>

