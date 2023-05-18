@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">홈</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">홈</a></li>
                            <li class="breadcrumb-item active">현황</li>
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
                <form action="{{url('admin/number/change')}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <h4 for="">Current Number</h4>
                    
                    <div class="custom-control custom-switch">
                    <input type="checkbox"  name="status" class="custom-control-input" {{ $data->status == 0 ? "" : "checked" }}  id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">(this status will be changed after click on button, current status is <span style="color:red;font-size:20px;"> {{ $data->status == 1 ? "Enabled" : "Disabled" }})</span></label>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">X</span>
                        </div>
                        <input type="number"  id="number" class="form-control" value="{{$data->number}}" name="number">
                      </div>
                    <button type="submit"  id="btn" class="btn btn-primary">Change</button>
                </form>
            </div>
        </section>
    </div>

    <script>
       
    </script>
   
@endsection
