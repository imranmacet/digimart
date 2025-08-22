@extends('frontend.dashboard.layouts.master')

@section('content')
    <div class="profile">
        <div class="row gy-4">
            <div class="col-xxl-3 col-xl-4">
                <div class="profile-info">
                    <div class="profile-info__inner mb-40 text-center">

                        <div class="avatar-upload mb-24">

                            <div class="avatar-preview" style="background-image: url({{ asset($user->avatar) }})">
                                <div id="imagePreview">
                                </div>
                            </div>
                        </div>

                        <h5 class="profile-info__name mb-1">{{ $user->name }}</h5>
                        <span class="profile-info__designation font-14">{{ $user->user_type }}</span>
                    </div>

                    <ul class="profile-info-list">
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-user"></i>
                                <span class="text text-heading fw-500">{{ __('Name') }}</span>
                            </span>
                            <span class="profile-info-list__info">{{ $user->name }}</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-mail-forward"></i>
                                <span class="text text-heading fw-500">{{ __('Email') }}</span>
                            </span>
                            <span class="profile-info-list__info">{{ $user->email }}</span>
                        </li>

                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-map-pin"></i>
                                <span class="text text-heading fw-500">{{ __('Country') }}</span>
                            </span>
                            <span class="profile-info-list__info">{{ $user->country }}</span>
                        </li>
                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-currency-dollar"></i>
                                <span class="text text-heading fw-500">{{ __('Balance') }}</span>
                            </span>
                            <span class="profile-info-list__info">$0.00 USD</span>
                        </li>

                        <li class="profile-info-list__item">
                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                <i class="ti ti-basket-check"></i>
                                <span class="text text-heading fw-500">{{ __('Purchased') }}</span>
                            </span>
                            <span class="profile-info-list__info">0 {{ __('items') }}</span>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-xxl-9 col-xl-8">
                <div class="dashboard-card">
                    <div class="dashboard-card__header pb-0">
                        <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading active" id="pills-personalInfo-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-personalInfo" type="button" role="tab"
                                    aria-controls="pills-personalInfo" aria-selected="true">{{ __('Personal
                                    Info') }}</button>
                            </li>
                            @if(isAuthor())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading" id="pills-payouts-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-payouts" type="button" role="tab"
                                    aria-controls="pills-payouts" aria-selected="false" tabindex="-1">{{ __('Payouts') }}</button>
                            </li>
                            @endif
                            <li class="nav-item" role="presentation">
                                <button class="nav-link font-18 font-heading" id="pills-changePassword-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button"
                                    role="tab" aria-controls="pills-changePassword" aria-selected="false"
                                    tabindex="-1">{{ __('Change Password') }}</button>
                            </li>
                        </ul>
                    </div>

                    <div class="profile-info-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-personalInfo" role="tabpanel"
                                aria-labelledby="pills-personalInfo-tab" tabindex="0">
                                <form action="{{ route('profile.update') }}" autocomplete="off" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">

                                            <x-frontend.input-text type="file" name="avatar" :label="__('Avatar')" />

                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-frontend.input-text name="name" :label="__('Name')" :value="$user->name"
                                                :placeholder="__('Full Name')" />
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <x-frontend.input-text name="email" :label="__('Email')" :value="$user->email"
                                                :placeholder="__('Email')" />

                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <x-frontend.input-select name="country" :label="__('Country')" class="select_2">
                                                @foreach (config('options.countries') as $kye => $value)
                                                    <option @selected($user->country == $value) value="{{ $value }}">
                                                        {{ $value }}</option>
                                                @endforeach
                                            </x-frontend.input-select>
                                        </div>

                                        <div class="col-sm-6 col-xs-6">

                                            <x-frontend.input-text name="city" :label="__('City')" :value="$user->city"
                                                :placeholder="__('City')" />

                                        </div>

                                        <div class="col-sm-6 col-xs-6">

                                            <x-frontend.input-text name="address" :label="__('Address')" :value="$user->address"
                                                :placeholder="__('Address')" />

                                        </div>

                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> {{ __('Update Profile') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-payouts" role="tabpanel"
                                aria-labelledby="pills-payouts-tab" tabindex="0">
                                <form action="{{ route('withdraw.info') }}" autocomplete="off" method="POST">
                                    @csrf
                                    <div class="row">
                                        <x-frontend.input-select name="payout_method" :label="__('Payout Method')" class="select_2 withdraw-method">
                                            @foreach($withdrawMethods as $method)
                                            <option @selected($user?->withdrawInfo?->withdraw_method_id == $method->id) value="{{ $method->id }}" >{{ $method->name }}</option>
                                            @endforeach
                                        </x-frontend.input-select>
                                        <div>
                                            @foreach($withdrawMethods as $method)
                                            <div class="method-{{ $method->id }} {{ $user?->withdrawInfo?->withdraw_method_id == $method->id ? '' : 'd-none' }} alert alert-info">{!! nl2br($method->description) !!}</div>
                                            @endforeach
                                        </div>
                                        <x-frontend.text-area name="information" :label="__('Information')" :value="$user?->withdrawInfo?->information" />
                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> {{ __('Update Payout') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-changePassword" role="tabpanel"
                                aria-labelledby="pills-changePassword-tab" tabindex="0">
                                <form action="{{ route('password.update') }}" autocomplete="off" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="col-12">

                                            <x-frontend.input-text type="password" name="current_password"
                                                :label="__('Current Password')" placeholder="********" />

                                        </div>

                                        <div class="col-sm-6 col-xs-6">

                                            <x-frontend.input-text type="password" name="password" :label="__('New Password')"
                                                placeholder="********" />

                                        </div>

                                        <div class="col-sm-6 col-xs-6">

                                            <x-frontend.input-text type="password" name="password_confirmation"
                                                :label="__('Confirm Password')" placeholder="********" />

                                        </div>

                                        <div class="col-sm-12">
                                            <button class="btn btn-main btn-lg"> {{ __('Update Password') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('.withdraw-method').on('change', function() {
            var methodId = $(this).val();
            $('.method-' + methodId).removeClass('d-none');
            $('.method-' + methodId).siblings().addClass('d-none');
        })
    })
</script>
@endpush
