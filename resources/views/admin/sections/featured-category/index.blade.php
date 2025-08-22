@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                     <h3 class="card-title">{{ __('Featured Categories') }}</h3>
                    </div>
                    <div class="card-body">
                     <form action="{{ route('admin.featured-categories-section.update', 1) }}" method="POST" class="x-form">
                        @csrf
                        @method('PUT')
                        <x-admin.input-select multiple="multiple" name="categories[]" class="select_2" :label="__('Categories')" >
                            @foreach($categories as $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach($category->subCategories as $subCategory)
                                    <option @selected(in_array($subCategory->id, $featuredCategories?->category_ids ?? [])) value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </optgroup>
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
