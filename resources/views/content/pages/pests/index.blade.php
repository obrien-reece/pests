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

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">List of potential pests in {{ $farmerdetails->farm_location }}</h1>
  <!-- Temperature and Humidity Information -->
  <div class="row mb-4">
    <div class="col-md-6">
      <div class="card shadow h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Weather Conditions</h5>
          <p class="card-text">The data has been generated based on the current weather conditions in {{ $farmerdetails->farm_location }}:</p>
          <ul class="flex-grow-1">
            <li>Temperature: <span class="badge rounded-pill bg-label-danger me-1"> {{ $weatherData['main']['temp'] }}°C</span></li>
            <li>Humidity:<span class="badge rounded-pill bg-label-warning me-1"> {{ $weatherData['main']['humidity'] }}%</span></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Additional Card -->
    <div class="col-md-6">
      <div class="card shadow h-100">
        <div class="card-body">
          <h5 class="card-title">Insights and Data Source</h5>
          <p class="card-text">Gain valuable insights into local pest risks based on real-time weather data. Our information is meticulously sourced from trusted agricultural databases and verified for accuracy, empowering farmers in {{ $farmerdetails->farm_location }} to make informed decisions.</p>
        </div>
      </div>
    </div>
  </div>
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Pest Name</th>
        <th>Main Target Crop</th>
        <th>Severity</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pests as $pest)
      <tr>
        <td>{{ $pest->pest_name }}</td>
        <td>{{ $pest->crop_attacked }}</td>
        <td><span class="badge rounded-pill
          @if($pest->devastation_severity == 'Mild')bg-label-warning
          @elseif($pest->devastation_severity == 'Severe')bg-label-danger
          @elseif($pest->devastation_severity == 'Moderate')bg-label-primary
          @endif
          me-1">
          {{ $pest->devastation_severity }}
        </td>
        <td>
          <a href="{{ route('show-pest', ['id' => $pest->id]) }}"><i class="mdi mdi-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Pest Name</th>
        <th>Main Target Crop</th>
        <th>Severity</th>
        <th>View</th>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
