@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
        <h2 class="font-w600 title mb-2 me-auto ">Dashboard</h2>
        <div class="weather-btn mb-2">
            <span class="me-3 font-w600 text-black"><i class="fa fa-cloud me-2"></i>21</span>
            <select class="form-control style-1 default-select  me-3 ">
                <option>Medan, IDN</option>
                <option>Jakarta, IDN</option>
                <option>Surabaya, IDN</option>
            </select>
        </div>
        <a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 me-3"></i>Filter
            Periode</a>
    </div>
@endsection
