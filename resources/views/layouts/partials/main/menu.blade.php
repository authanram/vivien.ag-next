<div class="h-16 shadow-lg sticky top-0 w-full z-10"></div>
<div class="-mt-16 bg-white border border-gray-100 md:mb-0 mx-auto relative self-stretch sticky top-0 w-full z-40">
    <div class="absolute border-gray-200 left-0 right-0 z-20 -bottom-px border-b-[5px]"></div>
    <x-container class="flex h-16 items-center relative z-20">
        <nav class="flex grow h-full items-center">
            <x-main:menu-item :href="Site::url('welcome')">
                <x-brand />
            </x-main:menu-item>
            <x-menu />
        </nav>
    </x-container>
</div>
