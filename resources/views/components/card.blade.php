@php($classes = 'bg-white border border-gray-100 margin mx-auto padding relative rounded-lg self-stretch shadow-md w-full')

<div {{ $makeAttributes(['class' => classAttribute($classes)->when($even, 'bg-opacity-90')]) }}>

    @if ($pattern)

        @component ('components.pattern')@endcomponent

    @endif

    <div {{ classAttribute('relative')->when($pattern, 'lg:flex lg:items-center') }}>

        {!! $slot !!}

    </div>

</div>
