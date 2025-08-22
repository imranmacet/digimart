@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('KYC Details') }}</h3>
                        <div class="card-actions">
                            <x-admin.back-button :href="route('admin.kyc.index')" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <td>{{ $kyc->user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>{{ __('Email') }}</th>
                                        <td>{{ $kyc->user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>{{ __('Document Type') }}</th>
                                        <td>{{ $kyc->document_type }}</td>
                                    </tr>

                                    <tr>
                                        <th>{{ __('Document Number') }}</th>
                                        <td>{{ $kyc->document_number }}</td>
                                    </tr>

                                    <tr>
                                        <th>{{ __('Document Attachments') }}</th>
                                        <td>
                                            @php
                                                $attachments = json_decode($kyc->documents);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <a
                                                    href="{{ route('admin.kyc.download-document', ['kyc' => $kyc->id, 'attachment_id' => $loop->index]) }}">{{ __('Attachment') }}
                                                    ({{ $loop->iteration }})
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Status') }}</th>
                                        <td>
                                            @switch($kyc->status)
                                                @case('pending')
                                                    <span class="badge bg-orange text-orange-fg">{{ $kyc->status }}</span>
                                                @break

                                                @case('approved')
                                                    <span class="badge bg-green text-orange-fg">{{ $kyc->status }}</span>
                                                @break

                                                @default
                                                    <span class="badge bg-red text-orange-fg">{{ $kyc->status }}</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Action') }}</th>
                                        <td>
                                            <div>
                                                <form action="{{ route('admin.kyc.status', $kyc->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-admin.input-select name="status" label="Status" id="status">
                                                        <option @selected($kyc->status == 'pending') value="pending">{{ __('Pending') }}</option>
                                                        <option @selected($kyc->status == 'approved') value="approved">{{ __('Approved') }}</option>
                                                        <option @selected($kyc->status == 'rejected') value="rejected">{{ __('Rejected') }}</option>
                                                    </x-admin.input-select>
                                                    <div class="{{ $kyc->status == 'rejected' ? '' : 'd-none' }}" id="reason" >
                                                        <x-admin.input-textarea name="reason" :label="__('Reason')" :value="$kyc->reject_reason" />
                                                    </div>
                                                    <x-admin.submit-button :label="__('Update')" onclick="$('form').submit();" />
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer text-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        'use strict';
        $(function() {
            $('#status').on('change', function() {
            let status = $(this).val();
                if(status == 'rejected') {
                    $('#reason').removeClass('d-none');
                }else {
                    $('#reason').addClass('d-none');
                }
            });
        })
    </script>
@endpush
