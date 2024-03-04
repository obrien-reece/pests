<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') | Materio - HTML Laravel Free Admin Template </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap')</style>

  <!-- Select2 for input type selection styles    -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
  </head>

  <body>


    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->



    <!-- Include Scripts -->
    @include('layouts/sections/scripts')
    <!-- Select2 for input type selection script     -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function () {
      $('#production_years').select2({
        placeholder: "Experience in farming",
        allowClear: true
      });

      // Set the value to an empty string to display the placeholder on page load
      $('#production_years').val('').trigger('change');
    });
    </script>
    <script>
    $(document).ready(function () {
      $('#farmingType').select2({
        placeholder: "Type of farming",
        allowClear: true
      });

      // Set the value to an empty string to display the placeholder on page load
      $('#farmingType').val('').trigger('change');
    });
    </script>
    <script>
    $(document).ready(function () {
      $('#pestFrequencySelect').select2({
        placeholder: "What is the pest frequency",
        allowClear: true
      });

      // Set the value to an empty string to display the placeholder on page load
      $('#pestFrequencySelect').val('').trigger('change');
    });
    </script>
    <script>
    $(document).ready(function () {
      $('#pestSelect').select2({
        placeholder: "Select a pest you've faced before",
        allowClear: true
      });

      // Set the value to an empty string to display the placeholder on page load
      $('#pestSelect').val('').trigger('change');
    });
    </script>

  </body>

</html>
