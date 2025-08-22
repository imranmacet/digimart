@extends('admin.layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Payment Settings
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card">
          <div class="row g-0">
            <div class="col-12 col-md-3 border-end">
              <div class="card-body">
                <h4 class="subheader">Settings</h4>
                <div class="list-group list-group-transparent">
                  <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Paypal Setting</a>
                  <a href="{{ route('admin.stripe-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Stripe Setting</a>
                  <a href="{{ route('admin.razorpay-settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Razorpay Setting</a>
                </div>
               
              </div>
            </div>
            @yield('setting_content')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
