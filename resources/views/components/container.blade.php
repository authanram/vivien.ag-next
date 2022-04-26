<div {{ $attributes->merge(['class' => 'lg:max-w-5xl xl:px-10 px-5 mx-auto xl:max-w-screen-xl']) }}>
    <div class="lg:pl-32 md:pl-40 xl:pl-36">
        {!! $slot !!}
    </div>
</div>
