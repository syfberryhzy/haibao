@extends('layouts.app')

@section('content')
<category-lettres :category="{{ $category} }"></category-lettres>
@endsection
