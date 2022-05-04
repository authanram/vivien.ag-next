@foreach ($eventTemplates as $eventTemplateName)
    <div>
        <a
            href="?filter[category]={{ $eventTemplateName->name }}"
            class="hover:underline"
        >{{ $eventTemplateName->name }}</a>
    </div>
@endforeach
