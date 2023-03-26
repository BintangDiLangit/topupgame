@extends('admin.layouts.master')
@section('title')
    Transaksi
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">List Transaksi</h4>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table style-1" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Transaksi ID</th>
                            <th>Payment Channel</th>
                            <th>Status Payment</th>
                            <th>Status Payment Vendor</th>
                            <th>Amount</th>
                            <th>Produk ID</th>
                            <th>Email</th>
                            <th>User ID</th>
                            <th>Nama Game</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $item)
                            <tr>
                                <td>
                                    <h6>{{ $loop->iteration }}</h6>
                                </td>
                                <td>
                                    {{ $item->transaction_id }}
                                </td>
                                <td>
                                    {{ $item->payment_channel }}
                                </td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                <td>
                                    {{ $item->status_payment_vendor }}
                                </td>
                                <td>
                                    {{ $item->amount }}
                                </td>
                                <td>
                                    {{ $item->produk_id }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->id_user }}
                                </td>
                                <td>
                                    {{ $item->game_name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('public/vendor/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
@endpush
