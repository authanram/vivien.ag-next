<x-card>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex justify-center">

            <a
                class="text-gray-400 hover:text-gray-500 flex"
                href="https://www.facebook.com/sybille.seuffer"
                target="_blank"
            >
                @component('components.svg')
                    facebook
                @endcomponent
                <span class="ml-2">Facebook</span>
            </a>

            <a
                class="ml-6 text-gray-400 hover:text-gray-500 hidden"
                href="#"
            >
                @component('components.svg')
                    twitter
                @endcomponent
                <span class="sr-only">Twitter</span>
            </a>

        </div>
    </div>
</x-card>
