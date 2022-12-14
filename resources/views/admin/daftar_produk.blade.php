@extends('admin.layouts.app')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Daftar Produk</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="card-body" <div class="table-responsive text-nowrap">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
                @elseif($message = Session::get('error'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <table id="example" class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $buku)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$buku->judul_buku}}</strong>
                            </td>
                            <td>{{$buku->kategori}}</td>
                            <td>
                                @if ($buku->jumlah_stok == 0)
                                <span class="badge bg-label-danger me-1">Stok Habis</span>
                                @else
                                <span class="badge bg-label-success me-1">tersisa {{$buku->jumlah_stok}}</span>
                                @endif
                            </td>
                            <td>{{$buku->harga}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('bukus.edit',$buku->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" data-bs-toggle="modal" href=""
                                            data-bs-target="#modalCenter-{{$buku->id}}"><i class="bx bx-trash me-1"></i>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter-{{$buku->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Hapus Kupon</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">Anda yakin ingin menghapus kupon
                                                {{$buku->judul_buku}}</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn delete-btn btn-primary">Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</div>
</div>
@endsection