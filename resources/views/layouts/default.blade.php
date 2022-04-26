@extends('layouts.blank')

@section('body')
    <x-background />
    @include('layouts.partials.menu')
    @include('layouts.partials.title')
    @include('layouts.partials.content')
    @include('layouts.partials.footer')
@endsection
