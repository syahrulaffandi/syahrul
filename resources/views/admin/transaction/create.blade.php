@extends('template.app')

@section('pagetitle','Master User')

@push('customcss')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

<style>
    .label-required {
        font-size: 14px;
        color: red;
    }
</style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-warning">
            <form method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf
                    <div class="form-group">
                        <label for="">User <span class="label-required">*</span></label>
                        <select name="user" class="form-control" id="user">
                            @foreach ($user as $usr)
                        <option> {{ $usr->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Kode transaksi <span class="label-required">*</span></label>
                    <input type="" readonly class="form-control input-sm" placeholder="{{ $transaction->transaction_code }}" name="kode" id="kode">
                    </div>

                    <div class="form-group">
                        <label for="">Nama Produk <span class="label-required">*</span></label>
                        <select name="product" class="form-control" id="product">
                            @foreach ($products as $prod)
                        <option data-price ="{{ $prod->price }}" data-stock=
                        " {{ $prod->stock }} "> {{ $prod->product}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Harga <span class="label-required">*</span></label>
                        <input type="number" class="form-control input-sm" placeholder="harga..." name="price" id="price">
                    </div> --}}


                    

                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        
                        <div class="pull-left" style="margin-right:700px;">
                            <a class="btn btn-md btn-danger" href="{{route('transactions.index')}}"><i
                                    class="fa fa-arrow-left"></i> cancel</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="box box-warning">
    <div class="box-body">
        <div class="table">
            <table class="table table-striped table-hover table-responsive" id="table">
                <thead>
                    <tr>
                        <th>Opsi</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Qty</th>
                        <th>total</th>
                        
                        <th></th>
                        
                    </tr>
                </thead>

                <tbody>
                    <tr>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('customscript')
    {{-- <script src="{{URL::asset('js/jquery.js')}}"></script>  --}}
    {{-- <script src="{{URL::asset('js/jquery1.js')}}"></script>  --}}

    <script>
        $(document).ready(function () {
            $("#product").change(function () {
                product = $(this).val();
                price = $(this).find(':selected').data("price");
                stock = $(this).find(':selected').data("stock");
                row = ` <tr>
                    <td>
                        <a href="javascript:void(0)" onclick="$(this).find('#product').submit()"
                            class="btn btn-sm btn-danger"><span class="fa fa-trash"></span>
                        </a>
                    </td>
                    <td></td>
                    <td> ${product} </td>
                            <td> ${price} </td>
                            <td> ${stock}</td>
                            <td>
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" id="quantity-field" step="1" max="" value="0" name="quantity" class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>
                            </td>
                            <td><input type="text"readonly class="form-control input-sm grandtotal"></td>
                        </tr>`;
                $("table tbody").append(row);
            });
            // var hasil = 1 ;
            $('body').on('click', '.button-plus', function (e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
                if (!isNaN(currentVal)) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(0);
                }
            });
            $('body').on('click', '.button-minus', function (e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
                if (!isNaN(currentVal) && currentVal > 0) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(0);
                }

            });
            $('body').on('click', '.button-plus', function () {
 
                $('.grandtotal').val($('.quantity-field').val() * price);
            });
            $('body').on('click', '.button-minus', function () {
  
                if ('.quantity-field' <= 0 ) {
                    // console.log('aaaa');
                    $('.grandtotal').val($('.quantity-field').val() - price);
                }
            });
           
        });
    </script>
      
@endpush

@endsection
