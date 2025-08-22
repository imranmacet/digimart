@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Create Role') }}</h3>
                        <div class="card-actions">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                                <i class="ti ti-arrow-narrow-left"></i>
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <x-admin.input-text name="role" :label="__('Role Name')" />
                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($permissions as $groupName => $permissionItems)
                                <div class="col-md-4 mb-3">
                                    <h3 class="text-primary">{{ $groupName }}</h3>
                                    @foreach ($permissionItems as $permission)
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]">
                                            <span class="form-check-label">{{ $permission->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                       </form>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" onclick="$('form').submit();" class="btn btn-primary">{{ __('Create') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
