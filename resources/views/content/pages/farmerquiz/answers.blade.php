@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="py-4 col-md-9">

      <!-- Register Card -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
            <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->
        <div class="card-body mt-2">

          <h4 class="mb-2" style="text-align: justify;font-family: 'Roboto', sans-serif;font-size: 17px;">
            <small>
              Thank you for providing your farm details. Understanding the pest challenges you've faced in the past is essential for tailoring effective pest management strategies. Please take a moment to review and update any details about the pest issues you've encountered on your farm.
            </small>
          </h4>
          <form id="verificationLevelAuthentication" class="mb-3" action="{{ route('farmer.quiz.confirmfarmersanswers') }}" method="POST">
            @csrf

            <div class="row mt-3">
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Farm Name</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->farm_name }}" placeholder="Farm Name" name="farm_name">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Farm Location</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->farm_location }}" placeholder="Farm Location" name="farm_location">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Crop Name</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->crop_name }}" placeholder="Crop Name" name="crop_name">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Production Years</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->production_years }}" placeholder="Production Years" name="production_years">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Farm Size</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->farm_size }}" placeholder="Farm Size" name="farm_size">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Farming Type</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->farming_type }}" placeholder="Farming Type" name="farming_type">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Pest</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->pest }}" placeholder="Pest" name="pest">
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="form-group">
                  <label for="farm_location">Pest Frequency</label>
                  <input type="text" class="form-control" value="{{ $farmerdetails->pest_frequency }}" placeholder="Pest Frequency" name="pest_frequency">
                </div>
              </div>
              <div class="mt-3">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Register Card -->
      <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection
