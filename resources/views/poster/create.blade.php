@extends('layouts.app')

@section('content')
<poster-create
@if (isset($lettre)) :lettre="{{ $lettre }}" @endif
@if (isset($picture)) :picture="{{ $picture }}" @endif
:template="{{ $template }}"
>
</poster-create>
@endsection
