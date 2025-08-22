@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Featured Author') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.featured-author-section.update', 1) }}" class="x-form" method="POST">
                            @csrf
                            @method('PUT')
                            <x-admin.input-text name="title" :label="__('Title')" :value="$featuredAuthor?->title" />
                            <x-admin.input-text name="subtitle" :label="__('Subtitle')" :value="$featuredAuthor?->subtitle" />
                            <x-admin.input-select class="select_2" name="author" :label="__('Author')">
                                @foreach($authors as $author)
                                    <option @selected($featuredAuthor?->author_id == $author->id) value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </x-admin.input-select>
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
