<x-card even>

    @include ('partials.recent-publications')

</x-card>

<x-card class="bg-opacity-90 margin reject:padding">

    @component ('components.menu', [
        'classAttributePadding' => 'lg:px-6 md:px-8 px-3',
        'classAttribute' => 'bg-opacity-90',
        'slug' => 'footer',
    ])@endcomponent

</x-card>

<x-card
    class="margin overflow-hidden"
    even
    pattern
>

    @include ('partials.quote')

</x-card>
