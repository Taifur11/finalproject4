@extends('layouts.backend1.app')

@section('title','Pending Events')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL Sliding Events
                            <span class="badge bg-blue">{{ $events->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Title</th>
                                    
                                    <th width="50%">Image</th>
                                    <th width="10%">Sliding</th>
                                    <th width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $key=>$event)
                                        <tr>
                                            <td width="5%">{{ $key + 1 }}</td>
                                            <td width="15%">{{ $event->title }}</td>

                                            <td width="50%"><img src="{{URL::to($event->image)}}" alt="" width="500" height="300"></td>
                                                                                        <td width="10%">
                                                @if($event->status == true)
                                                    <span class="badge bg-blue">Sliding</span>
                                                @else
                                                    <span class="badge bg-pink">Not Sliding</span>
                                                @endif
                                            </td>
                                            <td width="20%" class="text-center">
                                                @if($event->status == false)
                                                    <button type="button" class="btn btn-success waves-effect" onclick="approveEvent({{ $event->id }})">
                                                        <i class="material-icons">done</i>
                                                    </button>
                                                    <form method="post" action="{{ route('admin.event.slider',$event->id) }}" id="approval-form-{{ $event->id }}" style="display: none">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                @else
                                                <button type="button" class="btn btn-danger waves-effect" onclick="approveEvent({{ $event->id }})">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                    <form method="post" action="{{ route('admin.event.notslider',$event->id) }}" id="approval-form-{{ $event->id }}" style="display: none">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
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
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
        function approveEvent(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to Sliding this Event ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form-'+ id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The Event remain not Sliding :)',
                        'info'
                    )
                }
            })
        }
    </script>
@endpush