@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>
    </ul>
    <div class="card mb-4">
      <h4 class="card-header">Profile Details</h4>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{asset('assets/img/avatars/farmer.png')}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
          <div class="button-wrapper">
            <h3>User Profile</h3>
            <p>Welcome to your profile page. Here you can view and manage your account details.</p>
          </div>
        </div>
        <div class="card-body pt-2 mt-1">
          <form id="formAccountSettings" method="POST" action="{{ route('pages-account-settings-account-update') }}">
            @csrf
            @method('PATCH')
            <div class="row mt-2 gy-4">
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="name" name="name" value="{{ $farmerdetails->name }}" autofocus />
                  <label for="name">Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="email" name="email" id="emai" value="{{ $farmerdetails->email }}" />
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="farmname" name="farm_name" value="{{ $farmerdetails->farm->farm_name }}" placeholder="Farm Name" />
                  <label for="farm_name">Farm Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="farm_size" name="farm_size" value="{{ $farmerdetails->farm->farm_size }} acres" />
                  <label for="farm_size">Farm Size</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="farm_location" name="farm_location" class="form-control" placeholder="e.g, Embu" value="{{ $farmerdetails->farm->farm_location }}" />
                    <label for="farm_location">Farm Location</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="crop_name" name="crop_name" placeholder="Main Type of crop grown" value="{{ $farmerdetails->farm->crop_name }}"/>
                  <label for="crop_name">Main Type of Crop</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="pest" name="pest" placeholder="Pest Experience" value="{{ $farmerdetails->farm->pest }}"/>
                  <label for="pest">Pest Experienced</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="pest_frequency" name="pest_frequency" placeholder="Pest Frequency" value="{{ $farmerdetails->farm->pest_frequency }}"/>
                  <label for="pest">Pest Frequency</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" name="production_years" placeholder="Production Years" value="{{ $farmerdetails->farm->production_years }}"/>
                  <label for="production_years">Production Years</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" id="farming_type" name="farming_type" placeholder="Farming Type" value="{{ $farmerdetails->farm->farming_type }}"/>
                  <label for="farming_type">Farming Type</label>
                </div>
              </div>
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary btn-sm me-2">Save changes</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /Account -->

      <div class="card">
        <h5 class="card-header fw-normal">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <div class="form-check mb-3 ms-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" onchange="toggleSubmitButton(this)" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-sm btn-danger" id="deactivateButton" data-bs-toggle="modal" data-bs-target="#deleteAccountModal" disabled>Deactivate Account</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Account for Farmer Modal -->
  <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Account Deactivation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to deactivate your account? This action cannot be undone.
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ route('pages-account-settings-account-delete', ['id' => Auth::id()]) }}">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-danger">Deactivate Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Account for Farmer Modal -->

  <script>
  function toggleSubmitButton(checkbox) {
    var submitButton = document.getElementById('deactivateButton');
    submitButton.disabled = !checkbox.checked;
  }
  </script>

  @if(Session::has('success'))
  <script>
  toastr.options = {
    'progressBar' : true,
    "showMethod": "fadeIn",
    "positionClass": "toast-bottom-right",
    "hideMethod": "fadeOut",
    "closeButton": true,
    "newestOnTop": false,
  }
  toastr.success("{{ session('success') }}");
  </script>
  @endif
  @endsection
