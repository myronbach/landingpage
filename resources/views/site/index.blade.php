@extends('layouts.site') {{--вказує, що даний файл розширує файл /layouts/site.blade.php--}}

{{-- секція 'header'--}}
@section('header')
    @include('site.header'){{-- підключаємо вміст секції із іншого файлу--}}
@endsection

{{--секція 'content'--}}
@section('content')
    @include('site.content'){{-- підключаємо вміст секції з іншого файлу--}}
@endsection
