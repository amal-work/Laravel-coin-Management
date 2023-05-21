@extends('user.layouts.app')
@section('script')
{{-- <script src="{{asset('admin_assets/js/coin/coin.js')}}"></script> --}}
@endsection
@section('content')
 
    <div class="row">
        <div class="col-12">
          <div class="card my-2">
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <tbody>
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
                                        <option value="megadiscount" >[MEGA DSICOUNT]Expire Soon</option>
                                        <option value="almostfree">Almost Free</option>

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
                                    <button class="btn btn-sm btn-primary btnSearch shadow-primary float-right btn_margin0">Search</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            
        </div>
        <div class="col-12">
            <div class="card my-2">
                <div class="card-header p-3">       
                    <div class="alert bg-gradient-primary shadow-primary alert-dismissible text-white" role="alert">
                        <h5 class="text-white">Turn Pocket Change into a Fortune</h5>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>             
                    <h6 class="text-center text-sm "> 
                        Unbeatable Offer: Save {{$discount->discount}}% with No Refund Purchase (Buy NoRef)                        
                    </h6>
                    <h6 class="text-center text-sm ">
                        Or get 100% Refund for Declined Cards, Excluding Checking Fee! (Buy Ref)
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">                        
                        <div class="col-lg-2 col-sm-3 col-6">                             
                            <a href="javascript:void(0)" class="btn bg-gradient-success w-100 mb-0 toast-btn btnBuyCard" >Buy Selected Cards</a>
                        </div>       
                        <div class="col-lg-2 col-sm-3 col-6 pt-2"> 
                            <span class="total-checked text-success pr-3" style="font-weight: bold;font-size: 22px;"></span> 
                        </div>                     
                    </div>               
                </div>            
            </div>
        </div>        
    </div>
    
    <div class="row">        
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-uppercase text-center ps-3">{{$title}}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="cardTable" class="table align-items-center mb-0" cellspacing="0" width="100%">
                                
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   

@endsection
@push('page_scripts')
    <script>
		var CHECK_OPTION = 1,
			GATE = 0;
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			$('#check_api, #gate').trigger('change');
        });	
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
		
		$('#check_api').on('change', function(){
			var a = $(this),
				v = a.val(),
				g = a.parents('.nav-option').find('#gate').parent('li');
			CHECK_OPTION = v;
			if(v == 2)
				g.removeClass('d-none');
			else
				g.addClass('d-none');
		});
		$('#gate').on('change', function(){
			var a = $(this),
				v = a.val();
			GATE = v;
		});
		
        var table = $('#cardTable').DataTable({
            processing: false,
            serverSide: true,
            scrollY: "640px",
            pageLength: 100,
			searching: false,
            // fixedHeader: true,
            ajax: {
                url: "{{ route('user.card') }}",
                data: function ( d ) {
                    d.category = $('#category').val();
                    d.bin = $('#bin').val();
                    d.country = $('#countryd').val();
                    d.state = $('#state').val();
                    d.city = $('#city').val();
                    d.zip = $('#zip').val();
                    d.type = $('#type').val();
                }
            },
            columns: [
                // {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false, 'exportable' : false, 'printable'  : true},
                {title: '<input type="checkbox" class="checkAll">', data: 'check', name: 'check', 'render' : null, orderable  : false, 'searchable' : false},
                {title: "Type", data: 'type', name: 'type', width:"40px", orderable:false, searchable: false, },
                {title: "Bin", data: 'bin', name: 'bin'},
                {title: "Exp Date", data: 'exp_date', name: 'exp_date'},
                {title: "Category", data: 'category', name: 'category'},
                {title: "Country", data: 'country', name: 'country'},
                {title: "State", data: 'state', name: 'state'},
                {title: "City", data: 'city', name: 'city'},
                {title: "Zip", data: 'zip', name: 'zip'},
                {title: "Action/Result", data: 'action', name: 'action', orderable:false, searchable: false, width: "40px", className: "text-center"},
            ],
            order: [2, 'asc'],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

		table.buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
		
		// Handle click on "Select all" control
		$('body').on('click', '.checkAll', function () {
			var rows = table.rows({search:'applied'}).nodes();
			$('input[type="checkbox"]', rows).prop('checked', this.checked);
			rowSelect();
		});
		
		// Handle click on checkbox to set state of "Select all" control
		$('body').on('change', '#cardTable tbody input[type="checkbox"]', function () {
			// If checkbox is not checked
			if (!this.checked) {
				var el = $('.checkAll').get(0);
				// If "Select all" control is checked and has 'indeterminate' property
				if (el && el.checked && ('indeterminate' in el)) {
					// Set visual state of "Select all" control 
					// as 'indeterminate'
					el.indeterminate = true;
				}
			}
			rowSelect();
		});
		
		$('body').on('click', '.sorting', function () {
			$('.total-checked').empty();
			$('.checkAll').prop('checked', false);
		});
		
		function rowSelect(){
			var rows_selected = $('#cardTable').find('.chkRow'),
				total_price = 0;
			$.each(rows_selected, function(index, row){
				var price = $(this).data('price');
				if($(this).is(':checked')){
					total_price += price;
				}
			});
			if(total_price == 0){
				$('.total-checked').empty();
				$('.checkAll').prop('checked', false);
			}else{
				$('.total-checked').html('$'+total_price.toFixed(2));
			}
		}

        // $('body').on('click', '.btnEdit', function () {
        //     var coinId = $(this).attr('data-id');
        //     window.open('/admin/coin/edit/' + coinId, '정보 수정', 'scrollbars=1, resizable=1, width=1000, height=620');
        //     return false;
        // });
        $('body').on('click', '.btnSearch', function () {
            refreshTable();
        });
        $('body').on('click', '.btnEdit', function () {
            
            //if(!confirm('You want to buy this card?')){return}
            var card = $(this);
            var cardId = $(this).attr('data-id'),
				type = $(this).attr('data-type');
            var action = '/card/' + cardId;
            
            $.ajax({
                url: action,
                data: {type: type, check: CHECK_OPTION, gate: GATE},
                type: "POST",
                dataType: 'json',
				beforeSend: function() {
					card.html('<img src="{{ asset('user_assets/images/loading.gif') }}" width="18" />').prop('disabled', true);
				},
                success: function ({status, data}) {
                    if(status == "success"){
                        card.parents('.btn-wrap').css("color", "blue")
                        card.parents('.btn-wrap').html(data)
                    }else{
                        card.parents('.btn-wrap').css("color", "red")
                        card.parents('.btn-wrap').html(data)
                    }
                },
                error: function (data) {
                    card.parents('.btn-wrap').css("color", "red")
                    card.parents('.btn-wrap').html('You must buy more credit to get this card')
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
            var action = '/search_state/'+country;
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
            if(state == 0) {
                return;
            }
            var action = '/search_city/'+state;
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
        function refreshTable() {
            $('#cardTable').DataTable().ajax.reload();
			$('.checkAll').prop('checked', false);
			$('.total-checked').empty();
        }
        
        $('body').on('click', '.btnBuyCard', function () {            
            //var form = $('#divProductForm');
            var table = $('#cardTable').DataTable(); 
            var products = "";
            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function(){
                // If checkbox doesn't exist in DOM
                if(this.checked){
                    // Create a hidden element
                    products += this.value + "|";
                }
            });
            products = products.slice(0,-1);
            if(products == "")
            {
                alert("Please select one or more cards!");
                return false;
            }
            var action = '/cards';
            alert(products = products.slice(0,-1));
            $.ajax({
                url: action,
                data: {products},
                type: "POST",
                dataType: 'json',
                success: function ({status, data, rows}) {
					if(rows.length){
						rows.forEach( (e, i) => {
							$('#cardTable').find('.btn-wrap-'+e).css("color", "blue").html('You have successfully purchased this card.')
						});
					}
                    if(status != "success"){
                        alert(data);
                        // location.reload();
                    }
                },
                error: function (data) {
                    alert('Please check your cash.')
                }
            });
        });

    </script>
@endpush