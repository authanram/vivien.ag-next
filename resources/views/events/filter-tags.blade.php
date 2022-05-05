@foreach ($eventTemplates as $eventTemplateName)
    <div>
        <a
            href="{{ \App\FilterUrl::make('filter.tags', $eventTemplateName->id) }}"
            class="hover:underline"
        >{{ $eventTemplateName->name }}</a>
    </div>
@endforeach
