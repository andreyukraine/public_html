<div class="child_ul">
    @foreach($childs as $child)

            <label class="tree-toggler nav-header">
                    <div class="col-lg-11">
                        @if(count($child->childs))
                            <span id="{{ $child->id }}">{{ $child->name }}</span>
                        @else
                            <span id="{{ $child->id }}">{{ $child->name }}</span>
                        @endif
                    </div>

                    <div class="col-lg-1">
                        <a href="{{ route('category.edit',$child->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('delete.category',$child->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
            </label>
            @if(count($child->childs))
                @include('admin.category.subcat',['childs' => $child->childs])
            @endif

    @endforeach
</div>