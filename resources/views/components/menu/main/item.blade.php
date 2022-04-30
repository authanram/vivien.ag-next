<a {{ $attributes ?? '' }} x-data x-ref="root" x-init="$nextTick(() => $refs.root.classList.remove('transition-none'))">
    {{ $href('ff') }}
</a>
