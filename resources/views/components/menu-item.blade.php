@props(['color' => 'teal', 'active' => false])

@php($classList = 'duration-150 focus:bg-opacity-25 focus:bg-COLOR-500 focus:border-COLOR-500 hover:bg-opacity-10 hover:bg-COLOR-500 hover:border-COLOR-500 hover:z-20 inline-flex items-center items-center leading-none lg:px-3 lg:text-base md:border-b-4 pt-1 px-2 self-stretch text-COLOR-600 text-sm transition-none xl:px-4 z-0')
@php($classList .= ' '.($active ? 'bg-COLOR-400 bg-opacity-25 border-COLOR-500' : 'border-gray-200'))
@php($classList = str_replace('COLOR', $color, trim($classList)))

<a {{ $attributes->merge(['class' => $classList]) }} x-data x-ref="root" x-init="$nextTick(() => $refs.root.classList.remove('transition-none'))">
    {{ $slot }}
</a>
