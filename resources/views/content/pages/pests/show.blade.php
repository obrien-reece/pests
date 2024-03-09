@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

<h2>{{ $pest->pest->pest_name }}</h2>

<div class="container">

@if($pest->image_1)
    <img style="float: right; clear: both;margin-bottom: 20px;margin-left: 20px;" src="{{ asset($pest->image_1) }}" alt="Image 1">
@endif

@if($pest->image_2)
    <img style="float: right; clear: both;margin-bottom: 20px;margin-left: 20px;" src="{{ asset($pest->image_2) }}" alt="Image 2">
@endif

@if($pest->image_3)
    <img style="float: right; clear: both;margin-bottom: 20px;margin-left: 20px;" src="{{ asset($pest->image_3) }}" alt="Image 3">
@endif
      {!! $pest->description !!}
</div>

@endsection
