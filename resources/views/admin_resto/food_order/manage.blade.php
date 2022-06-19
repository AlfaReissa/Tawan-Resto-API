@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Semua Data Pesanan</h3>
                    <p class="text-subtitle text-muted">Pesanan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
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
                <div class="">

                    {{ $datas->links() }}

                    <div class="card-body">
                        <div class="row">
                            @forelse ($datas as $data)
                                <div class="card">

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <h4 class="
                                                @if($data->created_at->diffInMinutes()>60) text-danger @else text-success @endif
                                                "
                                                >{{ $data->created_at->diffInMinutes() }} Menit Yang Lalu</h4>
                                                <p class="text-body">Address : {{$data->address}}</p>
                                                <p class="text-body mt-0">Total Pesanan
                                                    : {{$data->total_price_rupiah_format}}</p>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <h4 class="card-title text-sm-start text-lg-end ">Order Number
                                                    #{{"HALALKAN".$data->id}}</h4>
                                                <h5 class="text-lg-end text-sm-start">Status : {{$data->status}}</h5>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">

                                        <div class="row ">

                                            <button class="visually-hidden btn col-md-3 col-sm-12 my-1 mx-1 btn-outline-secondary"
                                                    type="button"
                                                    data-toggle="collapse"
                                                    data-target="#user_detail_xz{{$data->id}}" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                Data Pengguna
                                            </button>

                                            <button class="visually-hidden btn col-md-3 col-sm-12 my-1 mx-1 btn-outline-secondary"
                                                    type="button"
                                                    data-toggle="collapse"
                                                    data-target="#driver_detail_xz{{$data->id}}" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                Data Driver
                                            </button>

                                            <button class=" btn col-md-3 col-sm-12 my-1 mx-1 btn-outline-secondary"
                                                    type="button"
                                                    data-toggle="collapse"
                                                    data-target="#order_detail_xz{{$data->id}}" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                Pesanan
                                            </button>

                                        </div>
                                        <div>
                                            <div class="collapse" id="order_detail_xz{{$data->id}}">
                                                <div class="p-1">
                                                    <div class="p-1 mt-2">
                                                        <h5 class="text-body">
                                                            Daftar Pesanan
                                                        </h5>
                                                        @foreach($data->ordered_item as $xza)
                                                            <div class="border p-3 mt-2">
                                                                <img height="90px" style="border-radius: 20px" src="{{$xza->order->menu->thumbnail_url}}" alt="">
                                                                <div class="text-black">{{$xza->order->menu_name}} x{{$xza->order->quantity}}</div>
                                                                <div class="text-black"><span style="font-weight: bold">Catatan : </span>{{$xza->order->notes}}</div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse" id="user_detail_xz{{$data->id}}">
                                                <div class="border p-1 mt-2">
                                                    <div class="avatar avatar-xl mb-3">
                                                        <img
                                                            src="{{$data->user->photo_path}}"
                                                            alt="" srcset="">
                                                    </div>
                                                    <ul>
                                                        <li class="mt-3">Nama : {{$data->user->name}}</li>
                                                        <li>Email : {{$data->user->email}}</li>
                                                        <li>Contact : {{$data->user_contact}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="collapse" id="driver_detail_xz{{$data->id}}">
                                                <div class="border p-1 mt-2">
                                                    <div class="avatar avatar-xl mb-3">
                                                        <img
                                                            src="{{$data->user->photo_path}}"
                                                            alt="" srcset="">
                                                    </div>
                                                    <ul>
                                                        <li class="mt-3">Nama : {{$data->user->name}}</li>
                                                        <li>Email : {{$data->user->email}}</li>
                                                        <li>Contact : {{$data->user_contact}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end">

                                            <div class="dropdown align-content-end">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href='{{url("/resto-admin/food-order/".$data->id."/detail")}}'>
                                                        Edit Pesanan
                                                    </a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty

                            @endforelse
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
                        Are You Sure want to delete this ingredients?
                    </h5>
                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    All related data with this Ingredients will be deleted.
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
                paging: false,
                searching: false,
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
            $(".btn-destroy").attr("href", window.location.origin + "/menu/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>

@endpush
