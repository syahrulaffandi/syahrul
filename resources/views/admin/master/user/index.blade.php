@extends('template.app')

@section('pagetitle','Master User')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}">
    <style type="text/css">
    input {
        background-color: dodgerblue;
        color: white;

    }
	</style>
@endsection

@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                   <div class="pull-right">
                <p style="font-size:20px;">Cari Data Pegawai :</p>
                <form style="width:50px;" action="/users/cari" method="GET">
                    <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
                    <input style="margin-left: 5px; margin-bottom: 4.8px; padding: 2.8px 20px;" class="btn btn-primary" type="submit" value="CARI">
                </form>
                   </div>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                        <td>{{ $index + $users->firstItem()}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->username}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            @if ($user->is_admin == false)
                            <span class="label label-primary">User</span>
                            @else
                            <span class="label label-success">Admin</span>
                            @endif
                            </td>
                            <td>
                                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-success"><span class="fa fa-edit"></span></a>
                                <a href="javascript:void(0)" onclick="$(this).find('form').submit()" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                                <form action="{{route ('user.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    </form>
                                </a>
                            </td>
                    
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {!! $users->links()!!}
                </div>
           </div>
        </div>
        <!-- /.box-body -->
@endsection