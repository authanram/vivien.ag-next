@props(['value', 'current'])

@php
    $value =  is_bool($value) ? (int)$value : $value;
    $current = is_bool($current) ? (int)$current : $current;
    $current = is_numeric($current) ? (int)$current : $current;
@endphp

@if ($value === $current)
    <span class="block ml-1">
        <x-tinkers.packages.blade.dropdown.icon-check />
    </span>
@endif