@extends('layouts.backend1.app')

@section('title','Category Edit')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                          Edit Info
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.info.update',$info->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="address" class="form-control" name="address" value="{{ $info->address }}">
                                    <label class="form-label">Address</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ $info->email }}">
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="phone_no" class="form-control" name="phone_no" value="{{ $info->phone_no }}">
                                    <label class="form-label">Phone Number</label>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.info.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush