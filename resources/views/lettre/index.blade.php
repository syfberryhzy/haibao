@extends('layouts.app')

@section('content')
<lettre-index :lettre-category="{{ $lettreCategory }}" :hot-lettres="{{ $hotLettres->toJson() }}"></lettre-index>
@endsection
