@extends('layouts.backend1.app')
@section('title','Admin Dashboard')
@push('css')

@endpush

@section('content')

            <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            

                        <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect" style="height: 145px;">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Approved Events</div>
                            <div class="number count-to" data-from="0" data-to="{{ $events1->count() }}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect" style="height: 145px;">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Pending Events</div>
                            <div class="number count-to" data-from="0" data-to="{{ $events->count() }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect" style="height: 145px;">
                        <div class="icon">
                            <i class="material-icons">subscriptions</i>
                        </div>
                        <div class="content">
                            <div class="text">Subscribers</div>
                            <div class="number count-to" data-from="0" data-to="{{ $subscribers->count() }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect" style="height: 145px;">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Raisers</div>
                            <div class="number count-to" data-from="0" data-to="{{ $raisers->count() }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            

            </div>



@endsection
@push('js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

        <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

    
    <script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush