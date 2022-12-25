@extends('layouts.app')

@section('content')


   <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
        </div>
   </div>

   <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-3">
   <figure class="text-center">
    <blockquote class="blockquote">
      <h3>Check out for student entries</h3>
    </blockquote>
    <figcaption class="blockquote-footer">
      Only autorized users receive the ability to <cite title="operations">Add, View, Edit/Update</cite> and <cite title="operations">Delete</cite> data.
    </figcaption>
    <a class="nav-link active" aria-current="page" href="{{ route('student') }}"><button type="button" class="btn btn-warning">Student Data</button></a>
    {{-- < --}}
  </figure>
</div>
</div>
</div>


@endsection

@push('css')

   <style>
        .page-title{
            padding-top: 15vh;
            font-size: 5rem;
            color: #215679;
        }
   </style>
    
@endpush