@extends('layouts.app')

@section('content')
<picture-index 
    :picture-category="{{ $pictureCategory }}" 
    :hot-Pictures="{{ $hotPictures->toJson() }}" 
    :new-Pictures="{{ $newPictures->toJson() }}">
</picture-index>
@endsection
