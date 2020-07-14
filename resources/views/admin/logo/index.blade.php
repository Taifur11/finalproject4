@extends('layouts.backend1.app')

@section('title','Services Show')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div class="container-fluid">

        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('admin.logo.create') }}">
                <i class="material-icons">add</i>
                <span>Add  LOGO</span>
            </a>
        </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Site Logo
                                <span class="badge bg-blue"></span>
                            </h2>
                        </div>
                        <div class="body">

                
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th width="20%">Name</th>
                                            <th width="50%">Image</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        
                                        <tr>
                                            
                                            <td width="20%"><b>
                                            <?php if($logo){ ?> {{$logo->name}} <?php } else{ 
                                                echo "  Logo Name";
                                                } ?>
                                            </b></td>
                                            <td width="50%"><img src="
                                <?php if($logo){ ?>
                            {{URL::to($logo->image)}}
                                <?php } ?>" alt="Logo Here" width="100" height="100"></td>
                                                                <td width="30%"class="text-center"><br>

                                    <div class="block-header">
                <a  class="btn btn-primary" href="

                <?php if($logo){ ?>
                {{route('admin.logo.edit',$logo->id)}} <?php } ?>">
                <i class="material-icons">edit</i>
                <span>Edit Logo</span>
                </a>
            </div>
                            

                                            </td>
                                            

                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
 
    </script>
@endpush