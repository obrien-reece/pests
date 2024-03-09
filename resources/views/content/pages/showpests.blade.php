@extends('layouts/blankLayout')

@section('title', 'Error - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection

@section('content')


<ul>
  @foreach($pests as $pest)
  <li><a href="{{ route('pest-info-upload', ['id' => $pest->id]) }}">{{ $pest->pest_name }}</a></li>
  @endforeach
</ul>

@endsection
