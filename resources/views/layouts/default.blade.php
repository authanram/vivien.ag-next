@extends('layouts.blank')

@section('body')
    <x-menu:main />
    @stack('title')
    @include('layouts.partials.content')
    @include('layouts.partials.footer')
@endsection
