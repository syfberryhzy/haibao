@extends('layouts.app')

@section('content')
<category-pictures :category-pictures="{{ $pictures }}" title="{{ $title }}"></category-pictures>
@endsection
