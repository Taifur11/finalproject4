@extends('layouts.backend1.app')

@section('title','Category Create')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           ADD NEW Category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.percentage.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="percentage" class="form-control" name="percentage">
                                    <label class="form-label">Percentage</label>
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.percentage.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush