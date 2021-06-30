@extends('Layouts.layout')
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
        @elseif ($sukses = Session::get('gagal'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
        @endif
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="mb-0">RTPO Table</h3>
                    </div>
                    <div class="col-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-9 text-right">
                                    <a href="" target="_blank" class="btn btn-sm btn-danger" hidden>Cetak PDF</a>
                                </div>
                                <div class="col-3 text-center">
                                <a href="/create" class="btn btn-sm btn-primary">Add Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="customer_table" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>RTPO</th>
                                <th>Kabupaten</th>
                                <th>Class</th>
                                <th>Site Name</th>
                                <th>NE</th>
                                <th>NE ID</th>
                                <th>2G</th>
                                <th>3G</th>
                                <th>4G</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($item as $items)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$items['rtpo']}}</td>
                                <td>{{$items['kabupaten']}}</td>
                                <td>{{$items['class']}}</td>
                                <td>{{$items['site_name']}}</td>
                                <td>{{$items['ne']}}</td>
                                <td>{{$items['ne_id']}}</td>
                                <td>{{$items['d_2G']}}</td>
                                <td>{{$items['d_3G']}}</td>
                                <td>{{$items['d_4G']}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="/edit/{{$items['_id']}}">Edit</a>
                                            <a class="dropdown-item" data-toggle="modal" data-id="{{$items['_id']}}" data-target="#modalDelete-Customer">Delete</a>
                                        </div>
                                    </div>
                                </td>
                                <div class="modal fade" id="modalDelete-Customer" tabindex="-1" role="dialog" aria-labelledby="modalDelete-Customer" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                        <div class="modal-content bg-gradient-danger">

                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="py-3 text-center">
                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                    <h4 class="heading mt-4">You should read this!</h4>
                                                    <p>when you delete your data, you will get a lost your data</p>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="_method" value="Delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="submit" class="btn btn-white" value="Ok, Got it">
                                                </form>
                                                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
