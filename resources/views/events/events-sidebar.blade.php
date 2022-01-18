<x-card class="reject:padding">

    <div class="padding pt-9 pb-7">

        @component('components.title', ['classAttributeText' => 'text-xl md:text-2xl py-1'])
            Nächste Seminare
        @endcomponent

    </div>

    <div class="text-gray-500">

        <div class="border-gray-200 border-b">

            @foreach($events as $event)

                <a
                    class="bg-gray-50 block border-gray-200 border-t hover:bg-{{ $event->eventType->color->color }}-50 leading-tight px-3 py-4 px-10 relative rounded lg:rounded-none"
                    href="{{ routeIfExists('events') }}/#/?types={{ $event->eventType->id }}"
                >
                    <ripple contain dark></ripple>

                    <span class="font-medium text-{{ $event->eventType->color->color }}-600">
                        {{ $event->eventType->name }}
                    </span>

                    <span class="leading-relaxed text-xs ml-0.5">
                        <span class="inline-block mr-0.5 font-medium">
                            {{ $event->dateFromReadable }}
                        </span>
                        <span>
                            ({{ $event->date_from->diffForHumans() }})
                        </span>
                    </span>

                    <span class="block text-sm">
                        {{ $event->description }}
                    </span>

                </a>

            @endforeach

        </div>

        <a
            class="block hover:underline lg:rounded-none md:text-sm px-6 py-3 relative rounded text-{{ accent() }}-600 text-right"
            href="{{ routeIfExists('events') }}"
        >
            <ripple contain dark></ripple>
            Alle Seminare ›
        </a>

    </div>

</x-card>
