@extends('admin.layouts.master')
@section('title')
    Vendor
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-sm-flex d-block">
            <div class="me-auto mb-sm-0 mb-3">
                <h4 class="card-title mb-2">List Vendor</h4>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalMasterKategori">+
                Tambah Vendor</button>
            <!-- Modal -->
            <div class="modal fade" id="modalMasterKategori">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Vendor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <form action="{{ route('admin.vendor.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama : <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control input-rounded"
                                        placeholder="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sumber :</label>
                                    <input type="text" name="sumber" class="form-control input-rounded"
                                        placeholder="sumber">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <th>Nama</th>
                            <th>Sumber</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $item)
                            <tr>
                                <td>
                                    <h6>{{ $loop->iteration }}</h6>
                                </td>
                                <td>
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    {{ $item->sumber }}
                                </td>
                                <td>
                                    <div class="d-flex action-button">
                                        <button type="button" class="btn btn-info btn-xs light px-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter{{ $item->id }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z"
                                                    stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Vendor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.vendor.update', ['id' => $item->id]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama : <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="nama"
                                                                    class="form-control"
                                                                    placeholder="nama"
                                                                    value="{{ $item->nama }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Sumber :</label>
                                                                <input type="text" name="sumber"
                                                                class="form-control"
                                                                placeholder="sumber"
                                                                value="{{ $item->sumber }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $item->id }}"
                                            class="ms-2 btn btn-xs px-2 light btn-danger">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6H5H21" stroke="#fff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z"
                                                    stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="deleteModal{{ $item->id }}"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Vendor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.vendor.destroy', ['id' => $item->id]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            Anda yakin menghapus item ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
