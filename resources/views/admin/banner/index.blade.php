@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Flash Sale Banner') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.banner.update', 1) }}" method="POST" class="x-form">
                            @csrf
                            @method('PUT')
                            <x-admin.input-text name="title" :label="__('Title')" :value="$banner?->title" />
                            <x-admin.input-text name="offer" :label="__('Offer')" :value="$banner?->offer" />
                            <x-admin.input-text name="button_text" :label="__('Button Text')" :value="$banner?->button_text" />
                            <x-admin.input-text name="button_url" :label="__('Button Url')" :value="$banner?->button_url" />
                            <x-admin.input-toggle name="status" :label="__('Status')" :checked="$banner?->status ?? false" />
                        </form>
                    </div>
                    <div class="card-footer text-end">
                        <x-admin.submit-button :label="__('Update')" onclick="$('.x-form').submit();" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
