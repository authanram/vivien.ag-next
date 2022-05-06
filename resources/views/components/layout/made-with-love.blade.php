<div {{ $attributes->merge(['class' => 'cursor-default flex items-center space-x-1 leading-none']) }}>
    <span>Made with</span>
    <span class="-mt-0.5">
        <x-tooltip delay="250" html>
            <x-slot:tooltip>
                For the world's
                <span class="md:block">
                <span class="font-semibold">best mom</span>!!
                <span class="text-red-500 text-[.65rem]">❤ ❤</span>
            </span>
            </x-slot:tooltip>
            <span class="text-red-500 text-[.65rem]">❤</span>&nbsp;
        </x-tooltip>
    </span>
    <span>and
        <a
            class="text-{{ $accent }}-600 hover:text-{{ $accent }}-500 hover:underline"
            href="https://laravel.com"
            title="https://laravel.com"
        >Laravel</a>
    </span>
</div>
