@props([
    'tooltip' => null,
    'dropdown' => false,
    'tag' => 'span',

    'position' => null,
    'top' => false,
    'right' => false,
    'bottom' => false,
    'left' => false,

    'animation' => 'shift-toward-subtle',
    'arrow' => null,
    'delay' => 0,
    'html' => false,
    'light' => false,
    'options' => [], // https://atomiks.github.io/tippyjs/v6/all-props/
    'trigger' => 'mouseenter focus',
    'offset' => [0, 10],
])

@php
    $placement ??= $top ? 'top' : null;
    $placement ??= $right ? 'right' : null;
    $placement ??= $bottom ? 'bottom' : null;
    $placement ??= $left ? 'left' : null;

    $options = [];

    if ($dropdown) {
        $options = [
            'allowHTML' => true,
            'arrow' => false,
            'interactive' => true,
            'interactiveBorder' => 25,
            'interactiveDebounce' => 75,
            'placement' => $right ? 'bottom-end' : 'bottom-start',
            'role' => 'menu',
            'theme' => 'light',
            'trigger' => 'click',
        ];

        $tooltip = "<div>$tooltip</div>";
    }

    $options = array_merge([
        'allowHTML' => $html,
        'animation' => $animation,
        'arrow' => $arrow ?? true,
        'delay' => [$delay, 0],
        'offset' => $offset,
        'placement' => $placement ?? $position ?? 'top',
        'theme' => $light ? 'light' : null,
        'trigger' => $trigger,
    ], $options);
@endphp

@if ($tooltip)
    <{{ $tag }} {{ $attributes->merge([
        'x-data' => json_encode([compact('options')], JSON_THROW_ON_ERROR),
        'x-tooltip' => $html ? '<span '.$tooltip->attributes.'>'.$tooltip.'</span>' : $tooltip,
        'class' => 'relative '.($dropdown || $trigger === 'click' ? 'cursor-pointer' : ''),
    ]) }}>{{ $slot }}</{{ $tag }}>

    @push('styles')
        @once
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/animations/shift-toward-subtle.min.css"
                integrity="sha512-94pgBYXn0Jk7FOzDr5T0+gzb+Tx4DqLz8BIcIbtOGWnhco4wjtP7neHzK0yF0qIW5Q9okWn/ibOZvvVRnm2Rlg=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
            />
        @endonce

        @if ($dropdown)
            @once
                <link
                    rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/border.min.css"
                    integrity="sha512-5oWooerwnfAs0CTa2UNYOUuYqAGaOmfRiK2e2F8Zm92zYr2SWH5alg0n0oIYzZTQwijWEoRVLbfPHLPMk9f5yw=="
                    crossorigin="anonymous"
                    referrerpolicy="no-referrer"
                />
            @endonce
        @endif

        @if ($options['theme'] === 'light')
            @once
                <link
                    rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/themes/light.min.css"
                    integrity="sha512-zpbTFOStBclqD3+SaV5Uz1WAKh9d2/vOtaFYpSLkosymyJKnO+M4vu2CK2U4ZjkRCJ7+RvLnISpNrCfJki5JXA=="
                    crossorigin="anonymous"
                    referrerpolicy="no-referrer"
                />
            @endonce
        @endif
    @endpush

    @push('scripts')
        @once
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"
                integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
            ></script>

            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/6.3.7/tippy-bundle.umd.min.js"
                integrity="sha512-gbruucq/Opx9jlHfqqZeAg2LNK3Y4BbpXHKDhRC88/tARL/izPOE4Zt2w6X9Sn1UeWaGbL38zW7nkL2jdn5JIw=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
            ></script>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.directive('tooltip', (node, { expression }) => {
                        tippy(node, { content: expression, ...node._x_dataStack[0][0].options });
                    });
                })
            </script>
        @endonce
    @endpush
@else
    {{ $slot }}
@endif