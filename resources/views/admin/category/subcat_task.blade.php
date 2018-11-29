<div class="child_ul">
    @foreach($childs as $child)
        <li>
            <label class="tree-toggler nav-header">
                @if(count($child->childs))
                    <span id="{{ $child->id }}">{{ $child->name }}</span>
                @else
                    <span id="{{ $child->id }}">{{ $child->name }}</span>
                @endif
            </label>
            @if(count($child->childs))
                @include('admin.category.subcat',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</div>