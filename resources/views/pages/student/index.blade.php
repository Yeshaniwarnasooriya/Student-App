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
                            <label><strong>Student Name:</strong></label>
                            <input class="form-control" name="name" type="text" placeholder="Enter the student's name" required>
                        </div>
                    </div>
                    <div class="row gx-5 mt-3">
                        <div class="col-lg-4">
                            <label><strong>Student Age:</strong></label>
                            <input class="form-control" name="age" type="text" placeholder="Enter the student's age" required>
                        </div>
                        <div class="mt-0 col-lg-4 form-group">
                            <label><strong>Student Image:</strong></label>
                            <input class="form-control" name="images" type="file" placeholder="Select the Student Image"
                                accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="col-lg-4 mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col--lg-12 mt-4">
            <div>
                <table class="table table-light table-striped table-hover">
                    <thead>
                      <tr>
                         <th scope="col">No.</th>
                         <th scope="col">Name</th>
                         <th scope="col">Age</th>
                         <th scope="col">Image</th>
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
                           <td>{{ $student->image }}</td>
                           <td>

                            @if ($student->status == 0)
                                <span class="badge bg-secondary">Inactive</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
    
                           </td>
                           <td>
                                {{-- Delete Button --}}
                                <a href="{{ route('student.remove', $student->id) }}" class="btn btn-outline-danger" style="--bs-btn-padding-y: .19rem; --bs-btn-padding-x: .25rem;">
                                    <span class="material-symbols-outlined">Delete</span>
                                </a>
                                {{-- Button to convert the Inactive status to Active --}}
                                <a href="{{ route('student.active', $student->id) }}" class="btn btn-outline-success" style="--bs-btn-padding-y: .19rem; --bs-btn-padding-x: .25rem;">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </a>
                                {{-- Button to edit the available data --}}
                                <a href="javascript:void(0)" class="btn btn-outline-primary" style="--bs-btn-padding-y: .19rem; --bs-btn-padding-x: .25rem;">
                                    <span class="material-symbols-outlined" onclick="studentEditModal({{ $student->id }})">Edit</span>
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

<!-- Modal -->
<div class="modal fade" id="studentEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="studentEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="studentEditLabel">Edit Student Data</h1>
          <button type="button" class="btn-close" onclick="studentEditModal({{ $student->id }})" ></button>
        </div>
        <div class="modal-body" id="studentEditContent">
          
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

 @push('js')
    <script>
        function studentEditModal(student_id){
            var data = {
                 student_id: student_id,
            };
            $.ajax({
                url: "{{ route('student.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function (response) {
                    $('#studentEdit').modal('show');
                    $('#studentEditContent').html(response);
                }
             });
        }
    </script>
 @endpush 