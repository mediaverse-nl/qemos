@if (count($breadcrumbs))

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}">
                        @if ($loop->first)
                            <i class="fa fa-home" aria-hidden="true"></i>
                        @endif
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    @if ($loop->first)
                        <i class="fa fa-home" aria-hidden="true"></i>
                    @endif
                    {{ $breadcrumb->title }}
                </li>
            @endif

        @endforeach
    </ol>

@endif