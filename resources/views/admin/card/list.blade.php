@extends('admin.layouts.app')
@section('script')
<script src="{{asset('admin_assets/js/coin/coin.js')}}"></script>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Card Management</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <table class="mx-2" style="padding:15px;">
        <tr>
            <td style="width:40px">
                <label>Category:</label>
            </td>
            <td style="width:120px">
                <style>
                    .select2-selection__rendered {
                        line-height: 27px !important;
                    }
                    .select2-container .select2-selection--single {
                        height: 31px !important;
                    }
                    .select2-selection__arrow {
                        height: 0px !important;
                    }
                </style>
                <select name="category" id="category" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
                    <option value="">==All==</option>
                    <!-- <option value="megadiscount" >[MEGA DSICOUNT]Expire Soon</option>
                    <option value="almostfree">Almost Free</option> -->

                    @foreach ($categories as $category)
                        <option value="{{$category->category}}" >{{$category->category}}</option>
                    @endforeach
                </select>
            </td>
            <td style="width:40px; padding-left:10px">
                <label>Bin:</label>
            </td>
            <td style="width:120px">
                <input type="text" class="form-control form-control-sm" id="bin" name="bin" value="">
            </td>
            <td style="width:40px; padding-left:10px">
                <label>Country:</label>
            </td>
            <td style="width:120px">
                <select name="country" id="country" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
                    <option value="">==All==</option>

                    @foreach ($countries as $country)
                        <option value="{{$country->country}}">{{$country->country}}</option>
                    @endforeach
                </select>
            </td>
            <td style="width:40px; padding-left:10px">
                <label>State:</label>
            </td>
            <td style="width:120px">
                <select name="state" id="state" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
                    <option value="">==All==</option>
                </select>
            </td>
            <td style="width:40px; padding-left:10px">
                <label>City:</label>
            </td>
            <td style="width:120px">
                <select name="city" id="city" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
                    <option value="">==All==</option>
                </select>
            </td>
            <td style="width:40px; padding-left:10px">
                <label>Zip:</label>
            </td>
            <td style="width:120px">
                <input type="text" class="form-control form-control-sm" id="zip" name="zip" value="">
            </td>
            <td style="width:40px; padding-left:10px">
                <label>Type:</label>
            </td>
            <td style="width:120px">
                <select name="type" id="type" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
                    <option value="">==All==</option>
                    <option value="3">AMERICAN_EXPRESS</option>
                    <option value="5">MASTER_CARD</option>
                    <option value="4">VISA</option>
                    <option value="6">DISCOVER</option>
                </select>
            </td>
            <td style="width: auto">
                <button class="btn btn-sm btn-primary btnSearch float-right">Search</button>
            </td>
        </tr>
    </table>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav float-right">
                            <li class="pull-right float-right pr-3 pt-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                          </span>
                                        </div>
                                        <input type="number" max="100", step="0.1" name="price" id="price" class="form-control" placeholder="price">
                                      </div>
                                </div>
                            </li>
                            <li class="pull-right float-right pr-3 pt-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            Category
                                          </span>
                                        </div>
                                        <input type="text" name="fcategory" id="fcategory" class="form-control" placeholder="category">
                                      </div>
                                </div>
                            </li>
                            <li class="pull-right float-right pr-3 pt-1">
                                <div class="form-group">
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="txtFile" accept=".txt">
                                        <label class="custom-file-label" for="txtFile">Choose txt file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <span class="btn input-group-text btn-success btnImport" style="color: white; background-color: #28a745">Upload</span>
                                      </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pull-right float-right pr-3 pt-1" style="">
                                <a href="javascript:void(0)" class="btn btn-success btnAdd" >New</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" >
                        <form id="divCardForm">
                            <table id="cardTable" class="table  table-hover table-bordered table-striped projects text-xs" cellspacing="0" width="100%">
                                
                            </table>
                        </form>
                    </div>
                        
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });	
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $(function () {
            bsCustomFileInput.init();
        });
        var table = $('#cardTable').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "520px",
            pageLength: 100,
            // fixedHeader: true,
            ajax: {
                url: "{{ route('admin.card.list') }}",
                data: function ( d ) {
                    d.category = $('#category').val();
                    d.bin = $('#bin').val();
                    d.country = $('#country').val();
                    d.state = $('#state').val();
                    d.city = $('#city').val();
                    d.zip = $('#zip').val();
                    d.type = $('#type').val();
                }
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false, 'exportable' : false, 'printable'  : true},
                {title: "Type", data: 'type', name: 'type', width:"40px", orderable:false, searchable: false, },
                {title: "Bin", data: 'bin', name: 'bin'},
                {title: "Exp Date", data: 'exp_date', name: 'exp_date'},
                {title: "Category", data: 'category', name: 'category'},
                {title: "Country", data: 'country', name: 'country'},
                {title: "State", data: 'state', name: 'state'},
                {title: "City", data: 'city', name: 'city'},
                {title: "Zip", data: 'zip', name: 'zip'},
                {title: "Price", data: 'price', name: 'price', width:'80px'},
                {title: "Action", data: 'action', name: 'action', orderable:false, searchable: false, width: "140px", className: "text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
        $('body').on('click', '.btnAdd', function () {
            
            window.open('/admin/card/edit/' + 0, 'Add', 'scrollbars=0, resizable=1, width=700, height=670');
            return false;
        });
        $('body').on('click', '.btnEdit', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/card/edit/' + id, 'Edit', 'scrollbars=0, resizable=1, width=700, height=670');
            return false;
        });
        $('body').on('click', '.btnSearch', function () {
            refreshTable();
        });
        $('body').on('click', '.btnDelete', function () {
            if(!confirm('You want to delete?')){return}
            var msgId = $(this).attr('data-id');
            var action = '/admin/card/edit/' + msgId;
            
            $.ajax({
                url: action,
                data: {status},
                type: "DELETE",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        refreshTable();
                        alert('Successfully deleted.');
                    }else{
                        alert('Failed to delete.');
                    }
                },
                error: function (data) {
                }
            });
        });
        $('#country').change(function(){ 
            
            var country = $(this).val();
            $('#state').html('<option value="">==All==</option>');
            $('#city').html('<option value="">==All==</option>');
            if(country == 0) {
                return;
            }
            var action = '/admin/card/search_state/'+country;
            $.ajax({
                url: action,
                data: {},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        $('#state').html('<option value="">==All==</option>');
                        data.forEach( (element, index) => {
                            $('#state').append(`<option value="${element.state}"> 
                                    ${element.state} 
                                </option>`); 
                        });
                    }
                },
                error: function (data) {

                }
            });
        });
        $('#state').change(function(){ 
            
            var state = $(this).val();
            $('#city').html('<option value="">==All==</option>');
            if(country == 0) {
                return;
            }
            var action = '/admin/card/search_city/'+state;
            $.ajax({
                url: action,
                data: {},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        $('#city').html('<option value="">==All==</option>');
                        data.forEach( (element, index) => {
                            $('#city').append(`<option value="${element.city}"> 
                                    ${element.city} 
                                </option>`); 
                        });
                    }
                },
                error: function (data) {

                }
            });
        });
        $('body').on('click', '.btnImport', function () {
            if($('#txtFile').val() == "")
            {
                alert('please choose a txt file.')
                return false;
            }
            if($('#price').val() <= 0)
            {
                alert('please input price.')
                return false;
            }
            if($('#fcategory').val() == "")
            {
                alert('please input category.')
                return false;
            }
            if(!confirm('You really want to upload this file?')) return false;
            var fd = new FormData();
            var files = $('#txtFile')[0].files[0];
            fd.append('file', files);
            fd.append('price', $('#price').val());
            fd.append('category', $('#fcategory').val());
            var action = '/admin/card/upload';
            $.ajax({
                url: action,
                data: fd,
                type: "POST",
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function ({status, data}) {
                    if(status == "success"){
                        
                        alert('Successfully uploaded.');
                        location.reload();
                    }else{
                        alert('Failed to upload.');
                    }
                },
                error: function (data) {
                }
            });
        })
        function refreshTable() {
            $('#cardTable').DataTable().ajax.reload();
        }
        
    </script>
@endpush