@extends('layouts.app')

@section('content')
@livewire('catalogs.delete-catalog', [
'catalog' => $catalog
])
@endsection