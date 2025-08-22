@extends('frontend.dashboard.layouts.master')

@section('content')
    <div class="wsus__dash_order_table">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5>Update Item</h5>
                <p>Manage your items.</p>
            </div>
            <div>
                <a href="{{ route('user.items.index') }}" class="btn btn-primary">
                    {{ __('Back') }}
                </a>
            </div>
        </div>

    </div>
    <form action="" method="POST" enctype="multipart/form-data" id="product_form">
        @csrf
        <ul class="nav nav-pills mt-4">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('user.items.edit', $item->id) }}">Edit
                    Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('user.items.changelog', $item->id) }}">Changelogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.items.history', $item->id) }}">History</a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-7">

                @forelse($histories as $history)

                <div class="wsus__dash_order_table mt-3">
                    <h6>{{ $history->title }}</h6>
                    <p>{{ $history->body }}</p>
                    <p>{{ __('Status') }} : {{ Str::replace('_', ' ', $history->status ) }}</p>
                    <hr>
                    <span>{{ __('Date') }}: {{ formatDate($history->created_at) }}</span>
                </div>
                @empty
                <div class="wsus__dash_order_table mt-3">
                    No Data
                </div>
                @endforelse
            </div>
            <div class="col-md-5">
                <div class="wsus__dash_order_table mt-3">
                    <div>
                        <h6></h6>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <b>{{ __('ID') }}</b>
                        </div>
                        <div class="col-6 text-end">
                            <span>#{{ $item->id }}</span>
                        </div>
                        <hr style="margin-top: 16px;">
                        <div class="col-6">
                            <b>{{ __('Name') }}</b>
                        </div>
                        <div class="col-6 text-end">
                            <span>{{ $item->name }}</span>
                        </div>
                        <hr style="margin-top: 16px;">

                        <div class="col-6">
                            <b>{{ __('Category') }}</b>
                        </div>
                        <div class="col-6 text-end">
                            <span>{{ $item->category->name }} / {{ $item->subCategory->name }}</span>
                        </div>
                        <hr style="margin-top: 16px;">

                        <div class="col-6">
                            <b>{{ __('Status') }}</b>
                        </div>
                        <div class="col-6 text-end">
                            @if ($item->status == 'approved')
                                <span class="badge bg-success">{{ __('Approved') }}</span>
                            @elseif($item->status == 'pending')
                                <span class="badge bg-warning">{{ __('Pending') }}</span>
                            @elseif($item->status == 'soft_reject')
                                <span class="badge bg-secondary">{{ __('Soft Reject') }}</span>
                            @elseif($item->status == 'hard_reject')
                                <span class="badge bg-secondary">{{ __('Hard Reject') }}</span>
                            @elseif($item->status == 'resubmitted')
                                <span class="badge bg-primary">{{ __('Resubmitted') }}</span>
                            @endif
                        </div>
                        <hr style="margin-top: 16px;">

                        <div class="col-6">
                            <b>{{ __('Publish Date') }}</b>
                        </div>
                        <div class="col-6 text-end">
                            <span>{{ formatDate($item->created_at) }}</span>
                        </div>
                        <hr style="margin-top: 16px;">

                        <div class="col-12">
                            <a href="{{ route('user.items.download', $item->id) }}"
                                class="btn btn-primary w-100">{{ __('Download') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>
@endsection
