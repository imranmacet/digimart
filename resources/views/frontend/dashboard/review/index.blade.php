@extends('frontend.dashboard.layouts.master')

@section('content')
    <div class="wsus__dash_order_table">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5>{{ __('All Reviews') }}</h5>
                <p>{{ __('Your reviews information') }}.</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="sn">
                            Item
                        </th>
                        <th class="p_date" style="width: 150px !important">
                            Rating
                        </th>

                        <th class="details">
                            Review
                        </th>
                        <th class="p_date">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td class="details">

                                <div class="d-flex">
                                    @if ($review->item->preview_type == 'image')
                                        <img style="width: 80px; height: 80px; object-fit: cover" src="{{ asset($review->item->preview_image) }}"
                                            alt="">
                                    @elseif($review->item->preview_type == 'video')
                                        <img src="{{ asset('default/video.webp') }}" alt="">
                                    @elseif($review->item->preview_type == 'audio')
                                        <img src="{{ asset('default/audio.webp') }}" alt="">
                                    @endif
                                    <div class="ms-3">
                                        <h6>{{ $review->item->name }}</h6>
                                        <div class="d-flex">
                                            <span class="text-primary">{{ $review->item->category->name }}</span> <span
                                                class="ms-2 me-2">/</span> <span
                                                class="text-primary">{{ $review->item->subCategory->name }}</span>
                                        </div>
                                        <div><small>By {{ $review->item->author->name }}</small></div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @for($i = 1; $i <= $review->stars; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </td>
                            <td>
                                {{ $review->body }}
                            </td>

                            <td>{{ formatDate($review->created_at) }}</td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>
        </div>
        <div>
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
