@extends('admin.layouts.app')
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
                    <li class="breadcrumb-item"><a href="#">Setting Management</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
		<form id="divSettingForm" method="POST" action="{{route('admin.setting.checkprice')}}">
			@csrf
			<div class="row">
				<div class="col-12 col-sm-6">
					<div class="card card-primary card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<h4 class="ml-2">Check Buy Card</h4>
						</div>
						<div class="card-body" >
							<div class="row">
								<div class="col-12 col-sm-12">
									<div class="row col-12">
										<label>Chk.cards Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="chk_cards_buy" name="chk_cards_buy" value="{{ $s_checker_price ? array_key_exists('chk_cards_buy', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['chk_cards_buy'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AUTH Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_auth_buy" name="checkcc_ru_auth_buy" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_auth_buy', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_auth_buy'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - SALE Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_sale_buy" name="checkcc_ru_sale_buy" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_sale_buy', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_sale_buy'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AVS Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_avs_buy" name="checkcc_ru_avs_buy" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_avs_buy', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_avs_buy'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - CHARGE Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_charge_buy" name="checkcc_ru_charge_buy" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_charge_buy', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_charge_buy'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6 d-none">
									<div class="row col-12">
										<label>Chk.cards Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="chk_cards_buy_dead" name="chk_cards_buy_dead" value="{{ $s_checker_price ? array_key_exists('chk_cards_buy_dead', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['chk_cards_buy_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AUTH Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_auth_buy_dead" name="checkcc_ru_auth_buy_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_auth_buy_dead', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_auth_buy_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - SALE Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_sale_buy_dead" name="checkcc_ru_sale_buy_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_sale_buy_dead', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_sale_buy_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AVS Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_avs_buy_dead" name="checkcc_ru_avs_buy_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_avs_buy_dead', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_avs_buy_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - CHARGE Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_charge_buy_dead" name="checkcc_ru_charge_buy_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_charge_buy_dead', $s_checker_price['check_buycard']) ? $s_checker_price['check_buycard']['checkcc_ru_charge_buy_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="card card-primary card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<h4 class="ml-2">Check Cards</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-12 col-sm-6">
									<div class="row col-12">
										<label>Chk.cards Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="chk_cards" name="chk_cards" value="{{ $s_checker_price ? array_key_exists('chk_cards', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['chk_cards'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AUTH Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_auth" name="checkcc_ru_auth" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_auth', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_auth'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - SALE Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_sale" name="checkcc_ru_sale" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_sale', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_sale'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AVS Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_avs" name="checkcc_ru_avs" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_avs', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_avs'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - CHARGE Live Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_charge" name="checkcc_ru_charge" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_charge', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_charge'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="row col-12">
										<label>Chk.cards Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="chk_cards_dead" name="chk_cards_dead" value="{{ $s_checker_price ? array_key_exists('chk_cards_dead', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['chk_cards_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AUTH Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_auth_dead" name="checkcc_ru_auth_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_auth_dead', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_auth_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - SALE Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_sale_dead" name="checkcc_ru_sale_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_sale_dead', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_sale_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - AVS Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_avs_dead" name="checkcc_ru_avs_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_avs_dead', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_avs_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru - CHARGE Dead Price:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_charge_dead" name="checkcc_ru_charge_dead" value="{{ $s_checker_price ? array_key_exists('checkcc_ru_charge_dead', $s_checker_price['check_cards']) ? $s_checker_price['check_cards']['checkcc_ru_charge_dead'] : '' : '' }}" class="form-control" placeholder="$0">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<div class="col-12 col-sm-12 mb-5">
					<ul class="nav float-right">
						<li class="pull-right float-right mx-3 pt-1" style="">
							<button type="submit" class="btn btn-success btn-sm btnSave" >Save</button>
						</li>
					</ul>
				</div>
			</div>
		</form>
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
		
		$("#divSettingForm input").on("keyup", function(){
			var valid = /^\d{0,5}(\.\d{0,2})?$/.test(this.value),
				val = this.value;
			if(!valid){
				console.log("Invalid input!");
				this.value = val.substring(0, val.length - 1);
			}
		});
    </script>
@endpush