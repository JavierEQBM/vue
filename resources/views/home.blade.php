@extends('layouts.app')

@section('content')

<div class="container">
    <container-throughts-component :throughts="{{$throughts}}"></container-throughts-component>
</div>
@endsection
