<div class="hidden lg:block lg:flex-shrink-0">
    <img
        class="h-64 w-64 rounded-full xl:h-60 xl:w-60"
        src="{{ asset('images/sybille-seuffer.jpg') }}"
        alt="Sybille Seuffer"
    />
</div>

<div class="relative lg:ml-16 w-full">

    @include('partials.pattern')

    <blockquote>

        <div class="relative text-gray-600">
            <ui-quote style="min-height:150px"></ui-quote>
        </div>

        <div class="py-4">
            <hr class="border-gray-300 opacity-75">
        </div>

        <footer class="mt-2">
            @include('partials.signature')
        </footer>

    </blockquote>

</div>
