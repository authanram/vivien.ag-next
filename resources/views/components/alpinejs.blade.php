@props(['data' => [], 'as' => 'div'])

@php($xData = collect()
    ->add($attributes->get('x-data'))
    ->add($attributes->has('x-component') ? 'window.'.$attributes->get('x-component') : '')
    ->add(trim(json_encode($data, JSON_THROW_ON_ERROR|JSON_HEX_TAG|JSON_HEX_AMP), '"'))
    ->filter()
    ->implode(', ...'))

<{{ $as }} {{ $attributes->except(['x-data', 'x-component'])->merge([
    'x-data' => $xData !== '[]' ? '{...'.$xData.'}' : '{}',
]) }}>{{ $slot }}</{{ $as }}>{{--$nextTick(() => $refs.root.classList.remove('transition-none'));--}}
