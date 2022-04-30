<x-alpinejs {{ $attributes->merge($extraAttributes->toArray()) }} as="a">
    {{ $slot->isNotEmpty() ? $slot : $text }}
</x-alpinejs>
