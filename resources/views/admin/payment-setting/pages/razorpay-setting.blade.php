@extends('admin.payment-setting.master')

@section('setting_content')
    <div class="col-12 col-md-9 d-flex flex-column">
        <div class="card-body">
            <h2 class="mb-4">{{ __('Razorpay Settings') }}</h2>
            <form action="{{ route('admin.razorpay-settings.update') }}" method="POST" class="x-form">
                @csrf
                @method('PUT')
                <div class="row">
                    
                    <div class="col-md-6">
                        <x-admin.input-text name="razorpay_currency_rate" :label="__('Currency Rate') . ' (Exchange rate for ' . config('settings.default_currency') . ')'" :value="config('settings.razorpay_currency_rate')" />
                    </div>

                    <div class="col-md-6">
                    <div class="col-md-12">
                        <x-admin.input-select name="razorpay_currency" :label="__('Gateway Currency')" class="select_2">
                            @foreach(config('options.currencies') as $key => $currency)
                            <option @selected(config('settings.razorpay_currency') == $key) value="{{ $key }}">{{ $key }} - {{ $currency }}</option>
                            @endforeach
                        </x-admin.input-select>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <x-admin.input-text name="razorpay_key" :label="__('Razorpay Key')" :value="config('settings.razorpay_key')" />
                    </div>

                    <div class="col-md-6">
                        <x-admin.input-text name="razorpay_secret_key" :label="__('Razorpay Secret Key')" :value="config('settings.razorpay_secret_key')" />
                    </div>
                    <div class="col-md-12">
                        <x-admin.input-select name="razorpay_status" :label="__('Razorpay Status')" >
                            <option @selected(config('settings.razorpay_status') == 'active') value="active">{{ __('Active') }}</option>
                            <option @selected(config('settings.razorpay_status') == 'inactive') value="inactive">{{ __('Inactive') }}</option>
                        </x-admin.input-select>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <x-admin.submit-button :label="__('Save')" onclick="$('.x-form').submit();" />
            </div>
        </div>
    </div>
@endsection
