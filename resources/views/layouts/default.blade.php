@extends('layouts.blank')

@section('body')
    @include('layouts.partials.menu')
    @stack('title')
    @include('layouts.partials.content')
    @include('layouts.partials.footer')
@endsection
