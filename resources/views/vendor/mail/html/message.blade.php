@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url'), 'accent' => $accent])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
<a href="https://vivien.ag" style="color:{{$accent}}">www.vivien.ag</a> | <a href="mailto:me@vivien.ag" style="color:{{$accent}}">me@vivien.ag</a> | <a href="tel:004974533264" style="color:{{$accent}}">Telefon 07453 3264</a>
@endcomponent
@endslot
@endcomponent
