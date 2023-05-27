<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card my-2">
                <div class="card-header p-3">
                    <div class="alert bg-gradient-primary shadow-primary alert-dismissible text-white" role="alert">
                        <h5 class="text-white">Turn Pocket Change into a Fortune</h5>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h6 class="text-center text-sm ">
                        Unbeatable Offer: Save <?php echo e($discount->discount); ?>% with No Refund Purchase (Buy NoRef)
                    </h6>
                    <h6 class="text-center text-sm ">
                        Or get 100% Refund for Declined Cards, Excluding Checking Fee! (Buy Ref)
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <a href="javascript:void(0)" class="btn bg-gradient-success w-100 mb-0 toast-btn btnBuyCard" >Buy Selected Cards</a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6 pt-1">
                            <span class="total-checked text-success pr-3" style="font-weight: bold;font-size: 22px;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4 ">
            <div class="card my-2">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">search</i>
                </div>
                <div class="text-end pt-1">
                    <!-- <p class="text-sm mb-0 text-capitalize">Search</p>   -->
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 pb-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-2">
                            <label>Categroy</label>
                            <select name="category" id="category" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  >
                                <option value="">==All==</option>
                                <option value="megadiscount" >[MEGA DSICOUNT]Expire Soon</option>
                                <option value="almostfree">Almost Free</option>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->category); ?>" ><?php echo e($category->category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-2">
                            <label>Bin</label>
                            <input type="text" class="form-control form-control-sm" id="bin" name="bin" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-2">
                            <label>Country</label>
                            <select name="country" id="country" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  >
                                <option value="">==All==</option>

                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country); ?>"><?php echo e($country->country); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-2">
                            <label>State</label>
                            <select name="state" id="state" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  >
                                <option value="">==All==</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-2">
                            <label>City</label>
                            <select name="city" id="city" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  >
                                <option value="">==All==</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mb-2">
                            <label>Zip</label>
                            <input type="text" class="form-control form-control-sm" id="zip" name="zip" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  >
                                <option value="">==All==</option>
                                <option value="3">AMERICAN_EXPRESS</option>
                                <option value="5">MASTER_CARD</option>
                                <option value="4">VISA</option>
                                <option value="6">DISCOVER</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static mt-4">
                            <button class="btn btn-sm btn-primary btnSearch float-right">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card my-2">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-uppercase text-center ps-3"><?php echo e($title); ?></h6>
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

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>
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
            pageLength: 10,                        
			searching: false,
            autoWidth: false,
            scrollX: true,            
            fixedColumns: false,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: "none",
                    target: ""
                }
            },
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: "none",
                    target: ""
                }
            },
            language: {
                paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←' 
                }
            },
            // fixedHeader: true,
            ajax: {
                url: "<?php echo e(route('user.card')); ?>",
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
                {title: "Action/Result", data: 'action', name: 'action', orderable:false, searchable: false, className: "text-center"},
            ],
            order: [2, 'asc'],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        table.columns.adjust().draw();
        // table.on('shown.bs.tab', function(e){
        //     console.log(909090);
        //     $($.fn.dataTable.tables(true)).DataTable()
        //         .columns.adjust()
        //         .responsive.recalc();
        // });

		//table.buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');

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
            console.log('btn search');
            refreshTable();
        });

        $('body').on('click', '.btnEdit', function () {
            console.log('btnEdit button');
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
					card.html('<img src="<?php echo e(asset('user_assets/images/loading.gif')); ?>" width="18" />').prop('disabled', true);
				},
                success: function ({status, data}) {
                    if(status == "success"){
                        card.parents('.btn-wrap').css("color", "blue")                        
                        card.parents('.btn-wrap').html('<div class="alert alert-success alert-dismissible text-white custom_info" role="alert">'
                                                + data
                                                +'</div>');//.html(data)
                    }else{
                        card.parents('.btn-wrap').css("color", "red")
                        card.parents('.btn-wrap').html('<div class="alert alert-warning alert-dismissible text-white custom_info" role="alert">'
                                                +'<span class="text-sm">'+data+'</span>'
                                                +'</div>');                        
                    }
                },
                error: function (data) {
                    card.parents('.btn-wrap').css("color", "red")
                    card.parents('.btn-wrap').html('<div class="alert alert-warning alert-dismissible text-white custom_info" role="alert">'
                                                +'<span class="text-sm">'+'You must buy more credit to get this card'+'</span>'
                                                +'</div>'); //.html('You must buy more credit to get this card')
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
            console.log('buy card button');
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
							$('#cardTable').find('.btn-wrap-'+e).css("color", "red")
                                                .html('<div class="alert alert-secondary alert-dismissible text-white" role="alert">'
                                                +'<span class="text-sm">'+'You have successfully purchased~~~ this card.'+'</span>'
                                                +'</div>');
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\3.Projects\2023_Projects\May Projects\0518-Laravel(Creative Web Designer with LARAVEL knowledge)-USA-asdauwh8\public_html-latest\resources\views/user/card/list.blade.php ENDPATH**/ ?>