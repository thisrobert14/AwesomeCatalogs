@extends('layouts.app')

@section('content')
@livewire('catalogs.list-catalog', [
'catalog' => $catalog,
'starsCount' => $starsCount
])
@endsection