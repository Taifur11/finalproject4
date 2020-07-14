@extends('layouts.backend1.app')

@section('title','Event')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('public/assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.logo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                                <div class="form-group">
                                    <label for="logo">Featured Image</label>
                                    <input type="file" name="logo">
                                </div>
                                <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.logo.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
@endsection

@push('js')
   

@endpush