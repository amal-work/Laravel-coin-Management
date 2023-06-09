@extends('admin.layouts.iframe')
@section('content')
<form id="userForm" method="post" action="" enctype="multipart/form-data"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-size:16px; font-weight:700;">News {{ $title }}</h1>
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
                        <h3 class="card-title text-sm">News</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="{{$id}}">
                        
                        
                        
                        
                        
                        <div class="form-group row mb-0">
                            <label for="subject" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">Content<code style="color:red !important;">[*]</code></label>
                            <div class="col-sm-9 col-md-9">
                            <input type="text" class="form-control form-control-sm" id="subject" name="subject" value="{{ $noticeInfo->subject }}" placeholder="Please input " autocomplete="off">
                            </div>
                        </div>
                        {{-- <div class="form-group row mb-0">
                            <label for="key" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">내용<code style="color:red !important;">[필수]</code></label>
                            <div class="col-sm-9 col-md-6">
                                <textarea name="content" id="content">
                                </textarea>
                            </div>
                        </div> --}}
                        
                        
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
            
            // $('.select2').select2({
            // theme: 'bootstrap4'
            // })

            // $('#content').summernote({
            //     height: '300px',
                
            //     callbacks: {
            //         onBlurCodeview: function() {
            //             let codeviewHtml = $(this).siblings('div.note-editor').find('.note-codable').val();
            //             $(this).val(codeviewHtml);
            //         },
            //         onImageUpload: function(files, editor, welEditable) {
            //             var url= sendFile(files, editor, welEditable);
            //         },
            //         onMediaDelete : function(target) {
            //             //deleteSNImage(target[0].src);
            //         }
            //     }
            // });
            // $('#content').summernote('code', {!! json_encode($noticeInfo->content) !!});
            // function sendFile(files, editor, welEditable) {
            //     data = new FormData();
            //     //data.append("file", file);
            //     var i = 0, len = files.length, img, reader, file;
            //     for (var i = 0; i < len; i++) {
            //         file = files[i];
            //         data.append("file[]", file);
            //     }

            //     $.ajax({
            //     data: data,
            //     type: "POST",
            //     url: "/uploadImages",
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     success: function({success, data}) {
            //         data.forEach((element)=>{
            //             var image = $('<img>').attr('src', element ).addClass("img-fluid");
            //             $('#content').summernote("insertNode", image[0]);
            //         });
                    
            //     }
            //     });
            // }
            
            //설정 보관
            // $('body').on('click', '.btnSave', function () {
            $('#userForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                //var data = $('#divProductForm').serialize();
                var subject = $("#subject").val();
                
                if(subject == ""){
                    alert('Please input a content!');
                    return false;
                }

                var id = $("#id").val();
                action = "/admin/contact/notice/"+id;
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

