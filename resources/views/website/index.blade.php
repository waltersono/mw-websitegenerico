@extends('layouts.web')
@section('title')
Website Generico | Inicio
@endsection

@section('content')
  @include('website.components.navbar')
  @include('website.components.carousel')
  @include('website.components.content')
  @include('website.components.footer')
@endsection