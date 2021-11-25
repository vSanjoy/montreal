@extends('site.layouts.app', [])
@section('content')

    @foreach ($bannerList as $item)
        {{ $item->title }}<br>
    @endforeach

@endsection