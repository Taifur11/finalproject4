@extends('layouts.backend.app')

@section('title','Event Edit')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('public/assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('raiser.event.update',$event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ADD NEW Event
                            </h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="title" value="{{ $event->title }}">
                                        <label class="form-label">Event Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="goal" class="form-control" name="goal" value="{{ $event->goal }}">
                                        <label class="form-label">Event Goal</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" id="exdate" class="form-control" name="exdate" value="{{ $event->exdate }}">
                                        <label for="exdate">Select Ending Date</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">New Image</label>
                                    <input type="file" name="image">
                                    <br>
                                    <b>Old Image:</b> <img src="{{URL::to($event->image)}}" alt="" height="200" width="500">
                                
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Categories
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="category">Select Category</label>
                                    <select name="category" id="category" class="form-control show-tick" data-live-search="true">
            @foreach($categories as $category)
<option value="{{ $category->id }}" <?php if($category->id == $event->category_id) echo "selected"; ?> >
    {{ $category->name }}
</option>
            @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('raiser.event.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Body
                            </h2>
                            
                        </div>
                        <div class="body">
                            <textarea name="body" id="tinymce" cols="30" rows="10">{{ $event->body }}</textarea>
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