@extends('layouts.backend.app')

@section('title','Events')

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
                            ALL events
                            <span class="badge bg-blue">{{ $events->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Goal</th>
                                    <th>Raised Money</th>
                                    <th>Remaining Money</th>
                                    <th>WithDrawAble Money</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach($events as $key=>$event)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->goal }}</td>
                                            <td>{{ $event->raised }}</td>

                                            <td>{{ $event->goal-$event->raised }}</td>



                                            <?php 
                                            if($percentage){
                                            ?>
                                            
                                            <td>
                                            <?php 
                                            if($event->raised > 0){
                                            ?>


                                                {{ $event->raised - ($event->raised*$percentage->percentage) }}
    <?php }else{ ?>
                    {{ $event->raised }}
<?php }?>

                                            </td>
                                            
                                            <?php } else{?>



                                            <td>{{ $event->raised }}</td>
                                            <?php }?>

<td class="text-center">
                                                    <button type="button" class="btn btn-success waves-effect" onclick="approveEvent({{ $event->id }})">
                                                        <i class="material-icons">done</i>
                                                    </button>
                                                    <form method="post" action="{{ route('raiser.event.withdrawed',$event->id) }}" id="approval-form-{{ $event->id }}" style="display: none">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                     <a href="{{ route('raiser.event.renew',$event->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                    </a>
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
        function approveEvent(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this Event ",
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
                        'The Event remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>
@endpush