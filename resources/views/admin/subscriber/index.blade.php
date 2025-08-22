@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Send Newsletter') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.send-newsletter') }}" method="POST" class="x-newsletter-form">
                            @csrf
                            <x-admin.input-text name="subject" label="Subject" />
                            <x-admin.input-textarea name="message" id="editor" label="Message" />

                        </form>
                    </div>
                    <div class="card-footer text-end">
                        <x-admin.submit-button label="Send" onclick="$('.x-newsletter-form').submit()" />
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Subscribers') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subscribers as $subscriber)
                                            <tr>
                                                <td>{{ $subscriber->email }}</td>
                                                <td>{{ formatDate($subscriber->created_at) }}</td>
                                                <td>
                                                    <a class="delete-item text-danger"
                                                        href="{{ route('admin.subscribers.destroy', $subscriber->id) }}"><i
                                                            class="ti ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
