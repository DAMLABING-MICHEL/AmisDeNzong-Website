@extends('errors.layout')

@section('content')
    @include('errors.partial', ['number' => '404','info' => 'this page does not exist'])
@endsection