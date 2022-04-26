<div class="cursor-default flex items-center space-x-1">
    <span>Made with</span>
    <span class="-mt-0.5">
        <x-tooltip delay="250" html>
            <x-slot:tooltip>
                For the world's
                <span class="md:block">
                <span class="font-bold">best mom</span>!!
                <span class="text-red-500 text-[.65rem]">❤ ❤</span>
            </span>
            </x-slot:tooltip>
            <span class="text-red-500 text-[.65rem]">❤</span>&nbsp;
        </x-tooltip>
    </span>
    <span>and
        <a
            class="text-{{ util()->accent() }}-600 hover:text-{{ util()->accent() }}-500 hover:underline"
            href="https://laravel.com"
            title="Goto laravel.com"
        >Laravel</a>
    </span>
</div>
