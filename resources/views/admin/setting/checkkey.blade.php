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
		<form id="divSettingForm" method="POST" action="{{route('admin.setting.checkkey')}}">
			@csrf
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card card-primary card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<ul class="nav float-right">
								<li class="pull-right float-right mx-3 pt-1" style="">
									<button type="submit" class="btn btn-success btn-sm btnSave" >Save</button>
								</li>
							</ul>
						</div>
						<div class="card-body" >
							<div class="row">
								<div class="col-12 col-sm-12">
									<div class="row col-12">
										<label>Chk.cards Key:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="chk_cards_key" name="chk_cards_key" value="{{ $s_checker_key ? array_key_exists('chk_cards_key', $s_checker_key) ? $s_checker_key['chk_cards_key'] : '' : '' }}" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="row col-12">
										<label>Check-cc.ru Key:</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<code style=""></code>
												<div class="input-group input-group-sm mb-2 mr-sm-2">
													<input type="text" id="checkcc_ru_key" name="checkcc_ru_key" value="{{ $s_checker_key ? array_key_exists('checkcc_ru_key', $s_checker_key) ? $s_checker_key['checkcc_ru_key'] : '' : '' }}" class="form-control">
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
    </script>
@endpush