@foreach ($eventTemplates as $eventTemplateName)
    <div>
        <a
            href="{{ \App\FilterUrl::make('filter.categories', $eventTemplateName->id) }}"
            class="hover:underline"
        >{{ $eventTemplateName->name }}</a>
    </div>
@endforeach
