@extends('layout.main')
@section('title','Forecast')
@section('content')

    <div>
        <div>
            <livewire:monthly-cast/>
            <livewire:weekly-cast/>
            
        </div>
    </div>

@endsection