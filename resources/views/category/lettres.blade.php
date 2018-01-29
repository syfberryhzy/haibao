@extends('layouts.app')

@section('content')
<category-lettres :category-lettres="{{ $lettres }}" title="{{ $title }}"></category-lettres>
@endsection
