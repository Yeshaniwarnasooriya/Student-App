@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Student List</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('student.create') }}" method="post" enctype="multipart/form">
                @csrf
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" name="name" type="text" placeholder="Enter the student's name">
                        </div>
                    </div>
                    <div class="row gx-5 mt-3">
                        <div class="col-lg-6">
                            <input class="form-control" name="age" type="text" placeholder="Enter the student's age">
                        </div>
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
                         <th scope="col">No.</th>
                         <th scope="col">Name</th>
                         <th scope="col">Age</th>
                         <th scope="col">Status</th>
                         <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                        
                        <tr>
                           <th scope="row">{{ ++$key }}</th>
                           <td>{{ $student->name }}</td>
                           <td>{{ $student->age }}</td>
                           <td>

                            @if ($student->status == 0)
                                <span class="badge bg-secondary">Inactive</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
    
                           </td>
                           <td>
                                {{-- Delete Button --}}
                                <a href="{{ route('student.remove', $student->id) }}" class="btn btn-danger">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                                {{-- Button to convert the Inactive status to Active --}}
                                <a href="{{ route('student.active', $student->id) }}" class="btn btn-success">
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