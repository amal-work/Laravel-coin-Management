@extends('admin.layouts.iframe')
@section('content')
<form id="userForm" method="post" action="" enctype="multipart/form-data"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-size:16px; font-weight:700;">Testimonial {{ $title }}</h1>
            </div><!-- /.col -->
            <div style="position: fixed; z-index: 99; padding: 4px; right: 20px; background-color: lightgray; border-radius: 0.5rem;">
                <button type="submit" class="btn btn-primary btn-xs btnSave">Save</button>
                <button type="button" class="btn bg-indigo btn-xs btnClose">Close</button>
            </div>
            </div><!-- /.col -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title text-sm">Testimonial</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{$id}}">
                        
                        <div class="form-group row mb-0">
                            <label for="name" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">name<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-9">
                            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $testmonialInfo->name }}" placeholder="Please input " autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="tagline" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">tagline<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-9">
                            <input type="text" class="form-control form-control-sm" id="tagline" name="tagline" value="{{ $testmonialInfo->tagline }}" placeholder="Please input " autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="score" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">score<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-9">
                            <input type="text" class="form-control form-control-sm" id="score" name="score" value="{{ $testmonialInfo->score }}" placeholder="Please input " autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="key" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">content<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-9">
                                <textarea name="content" id="content" style="width: 100%" rows="5">{{ $testmonialInfo->content }}</textarea>
                            </div>
                        </div>                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')    
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });            
            // $('body').on('click', '.btnSave', function () {
            $('#userForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                console.log('form data is ===>>>', formData);
                //var data = $('#divProductForm').serialize();
                var content = $("#content").val();
                
                if(content == ""){
                    alert('Please input a content!');
                    return false;
                }

                var id = $("#id").val();
                console.log('form id is ===>>>', id)
                action = "/admin/contact/testimonial/"+id;                
                //formData.submit();
                $.ajax({
                    url: action,
                    data: formData,
                    type: "POST",
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function ({status, data}) {
                        if(status="success"){
                            alert("Successfully saved");
                            //$('#beforeImage').val(data.image);
                            window.opener.refreshTable();
                            window.close();
                        }
                    },
                    error: function (data) {
                    }
                });
                
            });
            
            $('.btnClose').on('click', function (e) {
                window.close();
            });
            
        });	  
    </script>
@endsection

