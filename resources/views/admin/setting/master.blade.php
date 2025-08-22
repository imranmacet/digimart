@extends('admin.layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Account Settings
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
                <h4 class="subheader">Business settings</h4>
                <div class="list-group list-group-transparent">
                  <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">General Settings</a>
                  <a href="{{ route('admin.settings.commission.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Author Commission Settings</a>
                  <a href="{{ route('admin.settings.logo.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">Logo Settings</a>
                  <a href="{{ route('admin.settings.smtp.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">SMTP Settings</a>
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
