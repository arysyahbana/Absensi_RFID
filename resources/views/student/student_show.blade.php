@extends('layouts.main')
@section('title', 'Siswa')

@section('container')
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2 class="font-weight-bold">Data Siswa</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('create-student') }}" class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle"></i> Tambah
                                Data</a>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Nama Siswa</th>
                                        <th>NIS</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $data)
                                        <tr>
                                            <td>{{ $data->uid }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->nis }}</td>
                                            <td>{{ $data->jurusan }}</td>
                                            <td><a href="{{ route('edit-student', $data->id) }}"
                                                    class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i>
                                                    Edit</a>
                                                <a href="{{ route('delete-student', $data->id) }}"
                                                    onclick="return confirm('data akan dihapus')"
                                                    class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
