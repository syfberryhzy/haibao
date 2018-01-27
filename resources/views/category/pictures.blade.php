@extends('layouts.app')

@section('content')
<category-pictures :category-pictures="{{ $pictures }}"></category-pictures>
@endsection
