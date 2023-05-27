@extends('user.layouts.app')
@section('script')
<!-- <script src="{{asset('js/app.js')}}"></script> -->
@endsection
@section('content')
<div class="row">        
	<div class="col-12">
		<div class="card my-4">
			<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
					<h6 class="text-uppercase text-center ps-3">{{$title}}</h6>
				</div>
			</div>
			<div class="card-body px-0 pb-2">
				<form id="divCardCheckForm" class="p-3">
					<div class="row">
						<div class="col-12 col-sm-8 mb-3">
							<textarea class="form-control p-3" id="cclist" rows="15" style="resize: none;" 
							placeholder="Cvv List: One per line, auto identify CC info. Example: Format: 4307410677217203|01|2023|651|Peter|Pan|1 Some St|Some City|TX|75202|US Splitter/Separator support: |, \, /, -, or ;"></textarea>
						</div>
						<div class="col-12 col-sm-4">
							<div class="card">
								<div class="card-body pt-4 p-3">
									<div class="row">
										<div class="col-md-6">
											<h6 class="mb-0">Price Rate</h6>
										</div>
										<div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
											<div class="badge bg-success float-end">Completed</div>
										</div>
									</div>									
									<ul class="list-group">
										<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
											<div class="d-flex align-items-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
													<i class="material-icons text-lg">expand_more</i>
												</button>
												<div class="d-flex flex-column">
													<h6 class="mb-1 text-success text-sm">Approved</h6>
													<!-- <span class="text-xs">27 March 2020, at 12:30 PM</span> -->
												</div>
											</div>
											<div class="d-flex align-items-center text-gradient text-sm font-weight-bold text-success">
												- $ {{ $setting_prices ? array_key_exists('chk_cards', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards'] : 0 : 0 }}
											</div>											
										</li>
										<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
											<div class="d-flex align-items-center">
												<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
													<i class="material-icons text-lg">expand_more</i>
												</button>
												<div class="d-flex flex-column">
													<h6 class="mb-1 text-danger text-sm">Declined</h6>
													<!-- <span class="text-xs">27 March 2020, at 12:30 PM</span> -->
												</div>
											</div>
											<div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
												- $ {{ $setting_prices ? array_key_exists('chk_cards_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards_dead'] : 0 : 0 }}
											</div>											
										</li>
									</ul>
									<hr>
									<div class="text-center">
										<button type="submit" id="check" class="btn btn-success m-0 ">CHECK</button>
										<button type="submit" id="stop" class="btn btn-danger text-white m-0 " disabled="">Stop</button>
										<hr>
										<span style="font-size: initial;">Total: <b style="color:pink;" id="totalcc">0</b> | Checked: <b style="color:orange;" id="totalchecked">0</b> | Approved: <b style="color:lime;" id="cclive">0</b> | Declined: <b style="color:red;" id="ccdie">0</b> | Error: <b style="color:black;" id="ccunknown">0</b></span>
									</div>									
									<div class="alert alert-danger bg-danger text-white border-0 text-center btn-check-wait">
										<b>Checking: <b id="checkstatus">Wait Check...</b></b>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>  

<div class="row">        
	<div class="col-12">
		<div class="card my-4">
			<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
					<h6 class="text-uppercase text-center ps-3">Results</h6>
				</div>
			</div>
			<div class="card-body p-3">
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
						<textarea class="form-control p-3" id="livelist" rows="15" style="resize: none; border: 2px solid green;" readonly=""></textarea>
					</div>
					<div class="tab-pane" id="dead">
						<textarea class="form-control p-3" id="deadlist" rows="15" style="resize: none; border: 2px solid red;" readonly=""></textarea>
					</div>
					<div class="tab-pane" id="unknown">
						<textarea class="form-control p-3" id="unknownlist" rows="15" style="resize: none; border: 2px solid brown;" readonly=""></textarea>
					</div>
				</div>	
			</div>
		</div>
	</div>
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
			$('#check').on('click', function(e){
				e.preventDefault();
				
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