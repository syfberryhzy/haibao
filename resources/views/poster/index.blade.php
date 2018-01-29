@extends('layouts.app')

@section('content')
<poster-index :attributes="{{ $posters }}"></poster-index>
@endsection
