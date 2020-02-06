@extends('template.app')

@section('pagetitle','edit Product')

@push('customcss')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <style>
        .label-required{
            font-size: 14px;
            color: red;
        }
    </style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
        <form action="{{route('user.update',$users->id)}}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Nama <span class="label-required">*</span></label>
                        <input type="text" name="name" class="form-control input-sm" placeholder="Nama Produk..."
                            required maxlength="60" value="{{ $users->name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Username<span class="label-required">*</span></label>
                        <input type="text" name="username" class="form-control input-sm" placeholder="Harga Produk..."
                            required min="0" max="9999999999" value="{{ $users->username }}">
                    </div>

                    <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="email" name="email" class="form-control input-sm" placeholder="Stok Produk..."
                            required min="0" max="9999999999" value="{{ $users->email }}">
                    </div>

                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-left">
                    <a class="btn btn-md btn-danger" href="/product"><i class="fa fa-arrow-left"></i> back</a>
                </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-success"> <i class="fa fa-save"></i> update</button>
                    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('customscript')
    <script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //description
            $('#description').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": false,
                }
            });
        });
    </script>
@endpush

