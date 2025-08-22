@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Order Details') }}</h3>
                        <div class="card-actions">
                            <x-admin.back-button :href="route('admin.orders.index')" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <tbody>
                                        <tr>
                                            <td><b>{{ __('Order ID') }}</b></td>
                                            <td>{{ $order->code }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('User') }}</b></td>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Transaction ID') }}</b></td>
                                            <td>{{ $order->transaction->payment_id }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Payment Method') }}</b></td>
                                            <td>{{ $order->transaction->payment_gateway }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Total Amount') }}</b></td>
                                            <td>{{ config('settings.currency_icon') }}{{ $order->transaction->paid_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Paid in Amount') }}</b></td>
                                            <td>{{ $order->transaction->paid_in_amount }}
                                                {{ $order->transaction->paid_in_currency_icon }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Exchange Rate') }}</b></td>
                                            <td>{{ $order->transaction->exchange_rate }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{ __('Status') }}</b></td>
                                            <td><span
                                                    class="badge bg-green text-green-fg">{{ $order->transaction->status }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>Product</th>
                                    <th class="text-center" style="width: 1%">Qnt</th>
                                    <th class="text-end" style="width: 1%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->purchaseItems as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $item->item->name }}</p>
                                        <div class="text-secondary">Author {{ $item->item->author->name }}</div>
                                    </td>
                                    <td class="text-center">
                                        1
                                    </td>
                                    
                                    <td class="text-end">{{ config('settings.currency_icon') }} {{ $item->item->price }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="3" class="strong text-end">Total</td>
                                    <td class="text-end">{{ config('settings.currency_icon') }}{{ $order->transaction->paid_amount }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer text-end">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
