@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-header">
                     <h3 class="card-title">{{ __('Custom Pages') }}</h3>
                     <div class="card-actions">
                         <a href="{{ route('admin.custom-page.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i>
                            {{ __('Add new') }}
                         </a>
                     </div>
                    </div>
                    <div class="card-body">
                      

                    </div>
                    <div class="card-footer text-end">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Name</th>
                                            <th>At Nav</th>
                                            <th>Status</th>
                                            <th class="w-8"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pages as $page)
                                        <tr>
                                            <td class="text-start">{{ $page->name }}</td>
                                            <td>
                                                @if($page->show_at_nav)
                                                    <span class="badge bg-green text-green-fg">{{ __('Yes') }}</span>
                                                @else
                                                    <span class="badge bg-red text-red-fg">{{ __('No') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($page->status)
                                                    <span class="badge bg-green text-green-fg">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge bg-red text-red-fg">{{ __('Inactive') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.custom-page.edit', $page->id) }}"
                                                    class="text-primary"><i class="ti ti-edit"></i></a>
                                                <a class="delete-item text-danger"
                                                    href="{{ route('admin.custom-page.destroy', $page->id) }}"><i
                                                        class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data found</td>
                                        </tr>
                                        @endforelse
                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
