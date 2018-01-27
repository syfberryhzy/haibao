@extends('layouts.app')

@section('content')
@if (isset($lettre))
    <poster-create :lettre="{{ $lettre }}"></poster-create>
@else
    <poster-create></poster-create>
@endif
@endsection
