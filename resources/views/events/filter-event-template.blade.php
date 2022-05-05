@foreach ($eventTemplates as $eventTemplateName)
    <div>
        <a
            href="{{ query()->filter('category', (string)$eventTemplateName->id) }}"
            class="hover:underline"
        >{{ $eventTemplateName->name }}</a>
    </div>
@endforeach
