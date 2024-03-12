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
<div class="row gy-4">
  <!-- Congratulations card -->

  <div class="col-md-12 col-lg-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-1"><small style="font-size: 15px;">Farmer <strong>{{ Auth::user()->name }}</strong></small></h4>
        <p class="pb-0">Farm: <strong>{{ $farmerdetails->farm_name }}</strong> </p>
        <h4 class="text-primary mb-1" style="margin-top: 40px;">{{ $farmerdetails->farm_size }} @if($farmerdetails->farm_size <=1) acre @else acres @endif</h4>
        <p class="mb-2 pb-1"><span class="mdi mdi-pin" style="color: green;"></span>: <strong>{{ $farmerdetails->farm_location }}</strong></p>
      </div>
      <img src="{{asset('assets/img/icons/misc/triangle-light.png')}}" class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background">
    </div>
  </div>

  <!-- Transactions -->
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Farm Statistics</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
        <p class="mt-3"><span class="fw-medium">These are the insights to your farm</span></p>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-bug-outline"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Pest Faced</div>
                <h5 class="mb-0"><small style="font-size: 14px;">{{ $farmerdetails->pest }}</small></h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-chart-timeline-variant"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Frequency</div>
                <h5 class="mb-0"><small style="font-size: 14px;">{{ $farmerdetails->pest_frequency }}</small></h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow">
                  <i class="mdi mdi-clock-outline"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Years</div>
                <h5 class="mb-0"><small style="font-size: 14px;">{{ $farmerdetails->production_years }}</small></h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-info rounded shadow">
                  <i class="mdi mdi-ev-plug-type2"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Farming Type</div>
                <h5 class="mb-0"><small style="font-size: 14px;">{{ $farmerdetails->farming_type }}</small></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->

  <!-- Farmer location area weather -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Current Weather</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="weatherDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ $farmerdetails->farm_location }}">
              <i class="mdi mdi-weather-partly-cloudy mdi-24px"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center gap-3">
          <h3 class="mb-0">{{ $weatherData['main']['temp'] }}°C</h3>
          <i class="mdi mdi-weather-cloudy mdi-36px"></i>
        </div>
        <p class="mb-0">{{ $weatherData['weather'][0]['description'] }}</p>
        <div class="d-grid mt-3 mt-md-4">
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Details</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Farmer location area weather -->

  <div class="col-xl-4 col-md-6">
    <div class="mb-4 d-flex justify-content-between align-items-center">
      <h5 class="fw-bold mb-0">List of Pests in {{ $farmerdetails->farm_location }}</h5>
    </div>
    <div class="row gy-4">
      @foreach($pests as $pest)
      @if($loop->index < 4)
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="avatar">
              <div class="avatar-initial bg-danger rounded-circle shadow-sm">
                <i class="mdi mdi-bug-outline"></i>
              </div>
            </div>
          </div>
          <div class="card-body mt-mg-1">
            <h6 class="mb-2">{{ $pest->pest_name }}</h6>
            <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
              <h4 class="mb-0 me-2"><small style="font-size: 12px;">{{ $pest->crop_attacked }}</small></h4>
              <small class="text-danger mt-1">{{ $pest->devastation_severity }}</small>
            </div>
            <a href="{{ route('show-pest', ['id' => $pest->id]) }}" style="color: grey; font-size: 12px;">
              More info
              <span class="mdi mdi-chevron-right"></span>
            </a>
          </div>
        </div>
      </div>
      @endif
      @endforeach
  </div>
</div>

<!-- Four Cards -->
<div class="col-xl-4 col-md-6">
  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold mb-0"></h5>
    <div>
      <a href="{{ route('index-of-pests', ['farmer' => Auth::id(), 'location' => $farmerdetails->farm_location]) }}">
        <i class="mdi mdi-eye-outline" title="View All"></i>
      </a>
    </div>
  </div>
  <div class="row gy-4">
    @foreach($pests as $pest)
    @if($loop->index > 4 && $loop->index < 9)
    <div class="col-sm-6">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <div class="avatar">
            <div class="avatar-initial bg-danger rounded-circle shadow-sm">
              <i class="mdi mdi-bug-outline"></i>
            </div>
          </div>
        </div>
        <div class="card-body mt-mg-1">
          <h6 class="mb-2">{{ $pest->pest_name }}</h6>
          <div class="d-flex flex-wrap align-items-center mb-2 pb-1">
            <h4 class="mb-0 me-2"><small style="font-size: 12px;">{{ $pest->crop_attacked }}</small></h4>
            <small class="text-danger mt-1">{{ $pest->devastation_severity }}</small>
          </div>
          <a href="{{ route('show-pest', ['id' => $pest->id]) }}" style="color: grey; font-size: 12px;">
            More info
            <span class="mdi mdi-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
    @endif
    @endforeach
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="weatherDetailsModalLabel">Weather Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="weather-info">
              <i class="mdi mdi-thermometer mdi-36px" style="color: red;"></i>
              <p>Temperature: <span class="badge rounded-pill bg-label-danger me-1">{{ $weatherData['main']['temp'] }}°C</span></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="weather-info">
              <i class="mdi mdi-weather-cloudy mdi-36px"></i>
              <p>
                Weather:
                <span class="badge rounded-pill bg-label-info me-1">
                  {{ $weatherData['weather'][0]['description'] }}
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="weather-info">
              <i class="mdi mdi-water mdi-36px" style="color: #684AA0;"></i>
              <p>Humidity: <span class="badge rounded-pill bg-label-primary me-1">{{ $weatherData['main']['humidity'] }}%</span></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="weather-info">
              <i class="mdi mdi-speedometer mdi-36px" style="color: green;"></i>
              <p>Wind Speed: <span class="badge rounded-pill bg-label-success me-1">{{ $weatherData['wind']['speed'] }} m/s</span></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="weather-info">
              <i class="mdi mdi-gauge mdi-36px" style="color: #9C7521;"></i>
              <p>Pressure: <span class="badge rounded-pill bg-label-warning me-1">{{ $weatherData['main']['pressure'] }} hPa</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection
