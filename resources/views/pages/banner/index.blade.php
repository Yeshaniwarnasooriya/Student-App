@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Banner List</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('banner.create') }}" method="post" enctype="multipart/form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" name="title" type="text" placeholder="Enter the Banner Title">
                        </div>
                        <div class="mt-3 form-group">
                            <input class="form-control" name="images" type="file" placeholder="Enter the Banner Image"
                                accept="image/jpg, image/jpeg, image/png">
                        </div>
                    </div>
                    <div class="row gx-5 mt-3">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col--lg-12">
            <div>
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                         <th scope="col">#</th>
                         <th scope="col">Title</th>
                         <th scope="col">Status</th>
                         <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                        
                        <tr>
                           <th scope="row">{{ ++$key }}</th>
                           <td>{{ $banner->title }}</td>
                           <td>

                            @if ($banner->status == 0)
                                <span class="badge bg-secondary">Inactive</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
    
                           </td>
                           <td>
                                {{-- Delete Button --}}
                                <a href="{{ route('banner.remove', $banner->id) }}" class="btn btn-danger">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                                {{-- Button to convert the Inactive status to Active --}}
                                <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-success">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </a>

                           </td>
                        </tr> 
                        
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')

    <style>
        .page-title{
            padding-top: 10vh;
            font-size: 5rem;
            color: #216a79;
        }
    </style>

@endpush