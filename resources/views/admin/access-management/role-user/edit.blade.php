@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                     <h3 class="card-title">{{ __('Update User') }}</h3>
                     <div class="card-actions">
                         <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-narrow-left"></i>
                            {{ __('Back') }}
                         </a>
                     </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.role-users.update', $admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <x-admin.input-text :value="$admin->name" name="name" :label="__('Name')" />
                                </div>
                                <div class="col-md-6">
                                    <x-admin.input-text :value="$admin->email" name="email" :label="__('Email')" />
                                </div>
                                <div class="col-md-6">
                                    <x-admin.input-text type="password" name="password" :label="__('Password')" />
                                </div>
                                <div class="col-md-6">
                                    <x-admin.input-text type="password" name="password_confirmation" :label="__('Confirm Password')" />
                                </div>
                                <div class="col-md-12">
                                    <x-admin.input-select name="role" :label="__('Role')" >
                                        @foreach ($roles as $role)
                                            <option @selected(in_array($role->name, $admin->getRoleNames()->toArray())) value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </x-admin.input-select>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer text-end">
                        <x-admin.submit-button :label="__('Update')" onclick="$('form').submit();" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
