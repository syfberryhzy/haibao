@extends('layouts.app')

@section('content')
<category-lettres :category-lettres="{{ $lettres }}"></category-lettres>
@endsection
