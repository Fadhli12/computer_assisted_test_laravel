@if (isset($breadcrumbs))
<ul class="breadcrumb">
    @foreach ($breadcrumbs AS $breadcrumb)
    <li class="breadcrumb-item">
        @if (isset($breadcrumb['url']))
        <a href="{{$breadcrumb['url']}}">{{$breadcrumb['label']}}</a>
        @else
            <span>{{$breadcrumb['label']}}</span>
        @endif
    </li>
    @endforeach
</ul>
@endif
