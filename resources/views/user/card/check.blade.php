@extends('user.layouts.app')
@section('script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
@section('content')
<style>
	.float-end {
	  float: right !important;
	}
	.nav-option li:nth-child(1){
		min-width: 120px;
	}
	.nav-option li:nth-child(2){
		min-width: 85px;
	}
	textarea.form-control {
	  min-height: calc(1.5em + .9rem + 2px);
	}
	.tab-content {
	  padding: 20px 0 0 0;
	}
	.nav-tabs .nav-link:hover {
	  border-color: transparent;
	}
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item"><a href="#">#</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
						<div class="card-header-item"></div>
                    </div>
                    <div class="card-body" >
                        <form id="divCardCheckForm">
							<div class="row">
								<div class="col-12 col-sm-8 mb-3">
									<textarea class="form-control" id="cclist" rows="15" style="resize: none;" placeholder="Cvv List: One per line, auto identify CC info. Example: 

Format: 4307410677217203|01|2023|651|Peter|Pan|1 Some St|Some City|TX|75202|US

Splitter/Separator support: |, \, /, -, or ;"></textarea>
								</div>
								<div class="col-12 col-sm-4">
									<div class="card">
										<div class="card-body project-box">
											<div class="badge bg-success float-end">Completed</div>
											<h5 class="mt-0">
												Price Rate
												<br>
												<span style="color:lime">Approved:</span> -$<span class="s-live">{{ $setting_prices ? array_key_exists('chk_cards', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards'] : 0 : 0 }}</span>
												<br>
												<span style="color:red">Declined:</span> -$<span class="s-die">{{ $setting_prices ? array_key_exists('chk_cards_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards_dead'] : 0 : 0 }}</span>
											</h5>
											<hr>
											<center>
												<!--
												<ul class="nav nav-option d-inline-block">
													<li class="pull-left float-left pr-1 pt-1">
														<select name="check_api" id="check_api" class="form-control select2bs4 " style="font-size:10px !important; width: 100%;"  required>
															<option value="1">CHK.CARDS</option>
															<option value="2">CHECK-CC.RU</option>
														</select>
													</li>
													
													<li class="pull-left float-left pr-1 pt-1 d-none">
														<select name="gate" id="gate" class="form-control select2bs4" style="font-size:10px !important; width: 100%;"  required>
															<option value="1">AUTH</option>
															<option value="2">SALE</option>
															<option value="3">AVS</option>
															<option value="4">CHARGE</option>
														</select>
													</li>
												</ul>
												<hr>
												-->
												<button type="submit" id="check" class="btn btn-success">CHECK</button>
												<button type="submit" id="stop" class="btn btn-danger" disabled="">Stop</button>
												<hr>
												<span style="font-size: initial;">Total: <b style="color:pink;" id="totalcc">0</b> | Checked: <b style="color:orange;" id="totalchecked">0</b> | Approved: <b style="color:lime;" id="cclive">0</b> | Declined: <b style="color:red;" id="ccdie">0</b> | Error: <b style="color:black;" id="ccunknown">0</b></span>
											</center>
											<br>
											<div class="alert alert-danger bg-danger text-white border-0 text-center">
												<b>Checking: <b id="checkstatus">Wait Check...</b></b>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
						<div class="card-header-item"><h5 class="ml-4 mt-2">Results</h5></div>
                    </div>
                    <div class="card-body">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#live" data-bs-toggle="tab" aria-expanded="true" class="nav-link active"> Approved <span class="badge bg-success" id="cclive1">0</span> </a>
							</li>
							<li class="nav-item">
								<a href="#dead" data-bs-toggle="tab" aria-expanded="false" class="nav-link"> Declined <span class="badge bg-danger" id="ccdie1">0</span> </a>
							</li>
							<li class="nav-item">
								<a href="#unknown" data-bs-toggle="tab" aria-expanded="false" class="nav-link"> Unknown <span class="badge bg-info" id="ccunknown1">0</span> </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane show active" id="live">
								<textarea class="form-control" id="livelist" rows="15" style="resize: none; border: 2px solid green;" readonly=""></textarea>
							</div>
							<div class="tab-pane" id="dead">
								<textarea class="form-control" id="deadlist" rows="15" style="resize: none; border: 2px solid red;" readonly=""></textarea>
							</div>
							<div class="tab-pane" id="unknown">
								<textarea class="form-control" id="unknownlist" rows="15" style="resize: none; border: 2px solid brown;" readonly=""></textarea>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->
</div>
@endsection
@push('page_scripts')
<script>
var CHECK_OPTION = 1,
	GATE = 0,
	approved = 0,
	dead = 0,
	unknown = 0,
	total_checked = 0,
	width = 0,
	card_check = 0,
	checking = 1,
	promises = [],
	list = [];
$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		//async: false
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
$('#check').on('click', function(){
	var line = $.grep($("#cclist").val().split(/\r?\n/), function(n, i){
			return (n !== "" && n != null);
		}).map(function (a) {
			return a.trim();
		}),
		total = 0;
	if(line.length){
		checking = 1;
		list = line;
		total = line.length;
		$("#totalcc").html(total);
		start();
	}
});
$('#stop').on('click', function(){
	console.log("Working");
	$("#cclist").prop("readonly", false);
	$("#check").prop("disabled", false);
	$("#stop").prop("disabled", true);
	checking = 0;
});

function start() {
	if (checking == 0) {
		return;
	}
	var lista = $("#cclist").val();
	if(lista.trim().length){
		var array = $.grep(lista.split(/\r?\n/), function(n, i){
				return (n !== "" && n != null);
			}).map(function (a) {
				return a.trim();
			});
		if(array.length){
			var split = array[0].split("|"),
				cc = split[0],
				mes = split[1],
				ano = split[2],
				cvv = split[3],
				card = $.grep(split, function(n, i){
					return (n !== "" && n != null);
				}).map(function (a) {
					return a.trim();
				});
			if (cvv == "") {
				cvv = "123";
			}
			$("#cclist").prop("readonly", true);
			$("#check").prop("disabled", true);
			$("#stop").prop("disabled", false);
			$("#checkstatus").html("Checking started...");
			startchk(cc, mes, ano, cvv, card);
			return;
		}
	}
}
function startchk(cc, mes, ano, cvv, card) {
	var request = $.ajax({
		url: "/process-check-cards",
		data: {
			card: card,
			checkOption: CHECK_OPTION,
			gate: GATE,
			cc: cc,
			mes: mes,
			ano: ano,
			cvv: cvv
		},
		type: "POST",
		dataType: 'json',
		success: function (Reponse) {
			if (Reponse.status == "live") {
				document.getElementById("livelist").innerHTML += Reponse.msg + "\n";
				approved = approved + 1;
				$("#cclive").html(approved);
				$("#cclive1").html(approved);
				//$(".s-live").html(approved);
				card_check = 0;
				remove_line();
				total_checked = total_checked + 1;
				$("#totalchecked").html(total_checked);
			} else if (Reponse.status == "dead") {
				document.getElementById("deadlist").innerHTML += Reponse.msg + "\n";
				dead = dead + 1;
				card_check = 0;
				$("#ccdie").html(dead);
				$("#ccdie1").html(dead);
				//$(".s-die").html(dead);
				remove_line();
				total_checked = total_checked + 1;
				$("#totalchecked").html(total_checked);
			} else if (Reponse.status == "unknown") {
				document.getElementById("unknownlist").innerHTML += Reponse.msg + "\n";
				unknown = unknown + 1;
				card_check = 0;
				$("#ccunknown").html(unknown);
				$("#ccunknown1").html(unknown);
				remove_line();
				total_checked = total_checked + 1;
				$("#totalchecked").html(total_checked);
			} else {
				document.getElementById("unknownlist").innerHTML += Reponse.msg + "\n";
				unknown = unknown + 1;
				$("#ccunknown").html(unknown);
				$("#ccunknown1").html(unknown);
				card_check = 0;
				remove_line();
				total_checked = total_checked + 1;
				$("#totalchecked").html(total_checked);
			}

			if(promises.length == list.length){
				$("#cclist").prop("readonly", false);
				$("#check").prop("disabled", false);
				$("#stop").prop("disabled", true);
				$("#checkstatus").html("Checking Completed.");
				promises = [];
			}
			start();
		},
		error: function () {
			start();
		},
	});
	promises.push(request);
}

function remove_line() {
	var lines = $("#cclist").val().split("\n");
	lines.splice(0, 1);
	$("#cclist").val(lines.join("\n"));
}
</script>
@endpush