@extends('home.layouts.index')
@section('content')
  @foreach($sections as $section)
    @include('home.sections.'.$section)
  @endforeach
@endsection
