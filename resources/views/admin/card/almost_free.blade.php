@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Card Value</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">a</a></li>
                            <li class="breadcrumb-item active">aa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @elseif(session('failed'))
                    <div class="alert alert-danger">
                        {{session('failed')}}
                    </div>
                @endif
                <form action="{{route('admin.card.card_change', ['id' => 1])}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <h4 for="">Current Almost Free Account's Price</h4>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Almost Free Card Value" value="{{($data==null)?0: $data->price}}" name="charge">
                      </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </section>
    </div>   
@endsection
