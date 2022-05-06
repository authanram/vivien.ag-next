@php /** @var \App\FilterUrl $filterUrl */ @endphp

@foreach ($tags as $tag)
    <div>
        <a href="{{ $filterUrl->with($tag->id, 'tag') }}" class="hover:underline">
            {{ $tag->name }}
        </a>
    </div>
@endforeach
