@extends('template.app')

@section('content')

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua" style="cursor:pointer;" >
        <div class="inner">
            <h3>{{ $transactions }}</h3>
            <p>Penjualan Bulan ini</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green" style="cursor:pointer;">
        <div class="inner">
            <h3>{{ $productsSale}}</h3>
            <p>Unit Terjual Bulan ini</p>
        </div>
        <div class="icon">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow" style="cursor:pointer;">
        <div class="inner">
            <h3>{{ $customer }}</h3>
            <p>Customers</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red" style="cursor:pointer;">
        <div class="inner">
            <h3>{{ $products }}</h3>
            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="fa fa-dropbox"></i>
        </div>
    </div>
</div>
@endsection
