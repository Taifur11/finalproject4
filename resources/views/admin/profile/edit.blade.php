@extends('layouts.backend1.app')

@section('title','Admin Profile Edit')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('public/assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Profile Update
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" class="form-control" name="name" value="{{ $profile->name }}">
                                        <label class="form-label">Admin Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" name="email" value="{{ $profile->email }}">
                                        <label class="form-label">Admin Email</label>
                                    </div>
                                </div>
                                
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="phone_no" class="form-control" name="phone_no" value="{{ $profile->phone_no }}">
                                        <label class="form-label">Phone Number</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">Choose New Image</label>
                                    <input type="file" name="image">
                                    <br>
                                    <b>Old Image:</b> <img src="{{URL::to($profile->image)}}" alt="" height="100" width="200">
                                </div>

                                <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.profile.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Ckeditor -->
    <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor.js') }}"></script>
    <!-- Select Plugin Js -->
    <script src="{{ asset('public/assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

        <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
});

    </script>

@endpush