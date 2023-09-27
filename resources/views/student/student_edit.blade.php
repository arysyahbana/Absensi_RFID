@extends('layouts.main')
@section('title', 'Edit Student')

@section('container')
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold">Tambah Data Siswa</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('update-student', $edit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col col-6">
                                        <div class="form-group">
                                            <label>UID</label>
                                            <input type="text" class="form-control form-control-sm" id="uid"
                                                name="uid" value="{{ $edit->uid }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input type="text" class="form-control form-control-sm" id="nama"
                                                name="nama" value="{{ $edit->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="text" class="form-control form-control-sm" id="nis"
                                                name="nis" value="{{ $edit->nis }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <input type="text" class="form-control form-control-sm" id="jurusan"
                                                name="jurusan" value="{{ $edit->jurusan }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
