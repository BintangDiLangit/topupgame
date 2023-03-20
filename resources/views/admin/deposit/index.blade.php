@extends('admin.layouts.master')
@section('title')
    Deposit
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">Deposit</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/deposit" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Amount : </label>
                    <input type="number" class="form-control" name="amount">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
