@php /** @var \App\FilterUrlGenerator $filterUrl */ @endphp

@foreach ($eventTemplates as $eventTemplate)
    <div>
        <a href="{{ $filterUrl->with($eventTemplate->id, 'category') }}" class="hover:underline">
            {{ $eventTemplate->name }}
        </a>
    </div>
@endforeach
