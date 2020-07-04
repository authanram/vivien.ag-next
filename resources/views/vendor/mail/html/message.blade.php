@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
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
<a href="https://vivien.ag">https://vivien.ag</a> | <a href="mailto:me@vivien.ag">me@vivien.ag</a> | <a href="tel:004974533264">Telefon 07453 3264</a>
@endcomponent
@endslot
@endcomponent
