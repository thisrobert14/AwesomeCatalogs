@extends('layouts.app')

@section('content')
@livewire('resources.list-resource', [
'resource' => $resource
])
@endsection