@extends('layouts.backend1.app')

@section('title','Logo')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('public/assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Logo
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.logo.update',$logo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="name" value="{{ $logo->name }}">
                                        <label class="form-label">Logo Name</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">New Image</label>
                                    <input type="file" name="image">
                                    <br>
                                    <b>Old Image:</b> <img src="{{URL::to($logo->image)}}" alt="" height="200" width="500">
                                
                                </div>
                            

                        <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.logo.index') }}">BACK</a>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
                                

                                            
            </div>

    </div>
@endsection

@push('js')
    <!-- Ckeditor -->
    <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor.js') }}"></script>
    

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