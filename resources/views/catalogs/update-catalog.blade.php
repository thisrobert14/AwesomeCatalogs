@extends('layouts.app')

@section('content')
@livewire('catalogs.update-catalog', [
'catalog' => $catalog
])
@endsection