@props(['slug' => null, 'markdown' => false, 'replace' => []])

@if ($slug)
    @php($content = util()->content($slug, $markdown)->body)
    <div {{ $attributes }}>
        {!! count($replace) ? str_replace(array_keys($replace), array_values($replace), $content) : $content !!}
    </div>
@endif
