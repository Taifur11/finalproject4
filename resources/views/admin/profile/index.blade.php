@extends('layouts.backend1.app')

@section('title','Admin Profile')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('admin.profile.edit',$profile->id) }}" class="btn btn-danger waves-effect">Edit Profile</a>
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>
                              {{ $profile->name }}
                                
                            </h3>
                        </div>
                        <div class="body">
                           <h4>Email Address : {{ $profile->email }}</h4>
                           <h4>Phone Number : {{ $profile->phone_no }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header bg-amber">
                            <h2>
                                Admin Image
                            </h2>
                        </div>
                        <div class="body">
                            <img class="img-responsive" src="{{URL::to($profile->image)}}" alt="" width="266" height="200">
                        </div>
                    </div>

                </div>

            </div>

    </div>
@endsection

@push('js')
  <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>  
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

@endpush