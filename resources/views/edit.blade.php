@extends('Layouts.layout')
@section('content')

<div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Edite Data</h3>
                </div>
                {{-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> --}}
            </div>
        </div>
        <div class="card-body">
            <form action="/update/{{$data->_id}}" method="POST">
                {{csrf_field()}}
                <h6 class="heading-small text-muted mb-4">Data</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <?php
                                $tanggal=date('d F Y');
                                ?>
                                <label class="form-control-label" for="input-first-name">Tanggal Transaksi</label>
                                <input name="tanggal" type="text" id="input-first-name" class="form-control form-control-alternative"  required="required" value="{{$tanggal}}" >
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Nama RTPO</label>
                                <input type="text" name="rtpo" id="input-last-name" class="form-control form-control-alternative" value="{{$data->rtpo}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Pilih Class Site</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text form-control-alternative" for="inputGroupSelect01">Options</label>
                                    </div>

                                    <select name="class" class="custom-select form-control-alternative" id="inputGroupSelect01">
                                        <option selected>Pilih Class Site</option>
                                        <option value="Diamond">Diamond</option>
                                        <option value="Platinum">Platinum</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Bronze">Bronze</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">NE ID</label>
                                <input type="text" name="ne_id" id="input-last-name" class="form-control form-control-alternative" value="{{$data->ne_id}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">NE</label>
                                <input type="text" name="ne" id="input-last-name" class="form-control form-control-alternative" value="{{$data->ne}}" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Site Name</label>
                                <input type="text" name="site_name" id="input-last-name" class="form-control form-control-alternative" value="{{$data->site_name}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Site Impact</label>
                                <input type="text" name="site_impact" id="input-last-name" class="form-control form-control-alternative" value="{{$data->site_impact}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Site SysInfo</label>
                                <input type="text" name="site_sysinfo" id="input-last-name" class="form-control form-control-alternative" value="{{$data->site_sysinfo}}" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">2G</label>
                                <input type="text" name="d_2G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->d_2G}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">3G</label>
                                <input type="text" name="d_3G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->d_3G}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">4G</label>
                                <input type="text" name="d_4G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->d_4G}}" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">2G coverage</label>
                                <input type="text" name="c_2G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->c_2G}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">3G coverage</label>
                                <input type="text" name="c_3G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->c_3G}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">4G coverage</label>
                                <input type="text" name="c_4G" id="input-last-name" class="form-control form-control-alternative" value="{{$data->c_4G}}" required="required" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Kabupaten</label>
                                <input type="text" name="kabupaten" id="input-last-name" class="form-control form-control-alternative" value="{{$data->kabupaten}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Duration</label>
                                <input type="text" name="duration" id="input-last-name" class="form-control form-control-alternative" value="{{$data->duration}}" required="required" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Last Update</label>
                                <input type="text" name="last_update" id="input-last-name" class="form-control form-control-alternative" value="{{$data->last_update}}" required="required" >
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4" />
                <div class="col-12 text-right">
                    <button class="btn btn-icon btn-3 btn-success">
                        <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>

                        <span class="btn-inner--text">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    {{-- <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tables</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0">Light table</h3>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="budget">Address</th>
                                <th scope="col" class="sort" data-sort="status">Telp</th>
                                <th scope="col" class="sort" data-sort="status">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Argon Design System</span>
                                        </div>
                                </th>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Argon Design System</span>
                                        </div>
                                </th>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Argon Design System</span>
                                        </div>
                                </th>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
