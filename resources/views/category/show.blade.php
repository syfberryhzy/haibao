@extends('layouts.app')

@section('content')
<category-show :attributes="{{ $categories }}"></category-show>
@endsection
