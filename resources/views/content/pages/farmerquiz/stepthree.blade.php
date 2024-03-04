@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="py-4 col-md-6">

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
              Understanding the pest challenges you've faced in the past is essential for tailoring effective pest management strategies. Please take a moment to provide details about the pest issues you've encountered on your farm.
            </small>
          </h4>

          <form id="verificationLevelAuthentication" class="mb-3" action="{{ route('farmer.quiz.stepthree.store') }}" method="POST">
            @csrf

            <div class="row mt-3">
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <select class="js-example-basic-single form-control" name="farming_type" id="farmingType" style="height: 40px; width: 100%;" required>
                    <option value="Subsistence farming">Subsistence farming</option>
                    <option value="Cash crop farming">Cash crop farming</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <select class="js-example-basic-single form-control" name="production_years" id="production_years" style="height: 40px; width: 100%;" required>
                    <option value="0-15 years">0-15 years</option>
                    <option value="15-30 years">15-30 years</option>
                  </select>
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
