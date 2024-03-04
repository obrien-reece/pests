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

          <form id="verificationLevelAuthentication" class="mb-3" action="{{ route('farmer.quiz.steptwo.store') }}" method="POST">
            @csrf

            <div class="row mt-3">
             <div class="col-md-6">
                <div class="form-group">
                  <select class="js-example-basic-single form-control" name="pest" id="pestSelect" style="height: 40px; width: 100%;" required>
                    <option value="Aphids">None</option>
                    <option value="Aphids">Aphids</option>
                    <option value="Armyworms">Armyworms</option>
                    <option value="Cabbage loopers">Cabbage loopers</option>
                    <option value="Caterpillars">Caterpillars</option>
                    <option value="Corn earworms">Corn earworms</option>
                    <option value="Cutworms">Cutworms</option>
                    <option value="Diamondback moths">Diamondback moths</option>
                    <option value="European corn borers">European corn borers</option>
                    <option value="Flea beetles">Flea beetles</option>
                    <option value="Fruit flies">Fruit flies</option>
                    <option value="Gypsy moths">Gypsy moths</option>
                    <option value="Hornworms">Hornworms</option>
                    <option value="Japanese beetles">Japanese beetles</option>
                    <option value="Leafhoppers">Leafhoppers</option>
                    <option value="Leafminers">Leafminers</option>
                    <option value="Leafrollers">Leafrollers</option>
                    <option value="Loopers">Loopers</option>
                    <option value="Maggots">Maggots</option>
                    <option value="Mealybugs">Mealybugs</option>
                    <option value="Mites">Mites</option>
                    <option value="Moths">Moths</option>
                    <option value="Plant bugs">Plant bugs</option>
                    <option value="Potato beetles">Potato beetles</option>
                    <option value="Root maggots">Root maggots</option>
                    <option value="Scale insects">Scale insects</option>
                    <option value="Slugs">Slugs</option>
                    <option value="Snails">Snails</option>
                    <option value="Spider mites">Spider mites</option>
                    <option value="Squash bugs">Squash bugs</option>
                    <option value="Stink bugs">Stink bugs</option>
                    <option value="Thrips">Thrips</option>
                    <option value="Tomato hornworms">Tomato hornworms</option>
                    <option value="Vine borers">Vine borers</option>
                    <option value="Weevils">Weevils</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select class="js-example-basic-single form-control" name="pest_frequency" id="pestFrequencySelect" style="height: 40px; width: 100%;" required>
                    <option value="Rare">Rare</option>
                    <option value="Occasional">Occasional</option>
                    <option value="Common">Common</option>
                    <option value="Abundant">Abundant</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Main type of crop" name="crop_name" required>
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Main type of crop" name="farm_size" required>
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
