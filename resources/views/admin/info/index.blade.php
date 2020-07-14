@extends('layouts.backend1.app')

@section('title','Single Event')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->

            <div class="block-header">
                <a  class="btn btn-primary" href="{{ route('admin.info.create') }}">
                <i class="material-icons">add</i>
                <span>Add Info</span>
                </a>
                <a  class="btn btn-danger" href="{{ route('admin.info.edit',$info->id) }}">
                <i class="material-icons">edit</i>
                <span>Edit Info</span>
                </a>
            </div>
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>
                              {{ $info->name }}
                                
                            </h3>
                        </div>
                        <div class="body">
                           <h4>Address : {{ $info->address }}</h4>
                           <h4>Phone Number : {{ $info->phone_no }}</h4>
                           <h4>Email : {{ $info->email }}</h4>
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