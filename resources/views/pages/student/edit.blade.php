{{-- Layout of the edit modal --}}
<form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form">
    @csrf
        <div class="col-lg-6">
            <div class="form-group">
                <label>Student Name:</label>
                <input class="form-control" name="name" value="{{ $student->name }}" type="text" placeholder="Enter the student's name" required>
            </div>
        </div>
        <div class="row gx-5 mt-3">
            <div class="col-lg-4">
                <label>Student Age:</label>
                <input class="form-control" name="age" value="{{ $student->age }}" type="text" placeholder="Enter the student's age" required>
            </div>
            <div class="col-lg-4 mt-4">
                <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>