@extends('layouts.blank')

@section('body')
    <x-menu.main.menu />
    @stack('title')
    @include('layouts.partials.content')
    @include('layouts.partials.footer')
@endsection
