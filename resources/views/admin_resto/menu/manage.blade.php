@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Food Menu</h3>
                    <p class="text-subtitle text-muted">Manage Food Menu </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Food Menu </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-content')
    <section class="section">
        @include('components.message')
    </section>

    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Data</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                        <tr>
                                            <th data-sortable="">No</th>
                                            <th data-sortable="">Price</th>
                                            <th data-sortable="">Thumbnails</th>
                                            <th data-sortable="">Menu</th>
                                            <th data-sortable="">Tipe</th>
                                            <th data-sortable="">Penulis</th>
                                            <th data-sortable="">Diinput Pada</th>
                                            <th data-sortable="">Edit</th>
                                            <th data-sortable="">Hapus</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($datas as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> <p>Rp. {{ $data->price }}</p></td>
                                                <td>
                                                    <img height="200px" style="border-radius: 20px"
                                                         src='{{asset("$data->thumbnail")}}' alt="">
                                                </td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->desc}}</td>
                                                <td>{{ $data->type }}</td>

                                                <td>{{ $data->created_at }}</td>

                                                <td>
                                                    <a href="{{url('food-menu/'.$data->id.'/edit')}}">
                                                        <button id="{{ $data->id }}" type="button"
                                                                class="btn btn-primary">Edit Data
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button id="{{ $data->id }}" data-toggle="modal" type="button"
                                                            class="btn btn-danger btn-delete">Delete Data
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Apakah Anda Yakin ingin menghapus data ini ?
                    </h5>
                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Aksi Ini Tidak Dapat Dibatalkan
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary hide-modal" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class=" d-sm-block">Close</span>
                    </button>

                    <a class="btn-destroy" href="">
                        <button type="button" class="btn btn-danger ml-1 hide-modal " data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class=" d-sm-block">Delete</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
    </script>

    <script type="text/javascript">
        $(function () {
            var table = $('#table_data').DataTable({
                processing: true,
                serverSide: false,
                columnDefs: [{
                    orderable: true,
                    targets: 0
                }],
                dom: 'T<"clear">lfrtip<"bottom"B>',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [
                    'copyHtml5',
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export {{ \Carbon\Carbon::now()->year }}'
                    },
                    'csvHtml5',
                ],
            });


        });

        $('body').on("click", ".btn-delete", function () {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("href", window.location.origin + "/Food Menu/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>


@endpush
