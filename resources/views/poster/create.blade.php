@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<poster-create :lettre="{{ $lettre }}"></poster-create>
=======
<poster-create
@if (isset($lettre)) :lettre="{{ $lettre }}" @endif
@if (isset($picture)) :picture="{{ $picture }}" @endif
:template="{{ $template }}"
>
</poster-create>
>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049
@endsection
