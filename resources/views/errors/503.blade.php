@extends('errors.layout')

@section('content')
    @include('errors.partial', ['number' => '503','info' => 'Service Unavailable'])
@endsection