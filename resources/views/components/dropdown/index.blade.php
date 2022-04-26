@props(['button' => false, 'icon' => 'chevron', 'tag' => 'div'])

@php($classAttributeButton = $button ? 'border hover:bg-gray-50 pl-2 pr-1 py-1 rounded' : '')

<div class="font-display max-w-min text-sm">
    <x-tinkers.packages.blade.tooltip {{ $attributes->merge(['dropdown' => true, 'tag' => $tag]) }}>
        <x-slot:tooltip>
            {{ $content ?? '...' }}
        </x-slot:tooltip>
        <button class="flex items-center space-x-2 whitespace-nowrap {{ $classAttributeButton }}">
            <div>{{ $slot }}</div>
            @if ($icon !== false)
                @if ($icon === 'dots')
                    <x-tinkers.packages.blade.dropdown.icon-dots />
                @elseif ($icon === 'menu')
                    <x-tinkers.packages.blade.dropdown.icon-menu />
                @elseif ($icon === 'chevron')
                    <x-tinkers.packages.blade.dropdown.icon-chevron />
                @endif
            @endif
        </button>
    </x-tinkers.packages.blade.tooltip>
</div>