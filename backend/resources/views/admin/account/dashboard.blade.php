@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row mb-4">
		<div class="col-7 align-self-center">
			<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ dayParts() }} {{ \Auth::guard('admin')->user()->first_name }}!</h3>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item">@lang('custom_admin.label_dashboard')</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="col-5 align-self-center">
			<div class="customize-input float-right">
				<span class="custom-select-set-date-time form-control bg-white border-0 custom-shadow custom-radius">{{ getCurrentDateTime() }}</span>
				</select>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Start Second Cards -->
	<!-- ============================================================== -->
	<div class="card-group mb-5">
		<div class="card border-right">
			<div class="card-body">
				<div class="d-flex d-lg-flex d-md-block align-items-center justfy-content-center">
					<div>
						<div class="d-inline-flex align-items-center">
							<h2 class="text-dark mb-1 font-weight-medium text-centre">@lang('custom_admin.message_welcome_to_admin_panel')</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Second Cards -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Start Second Cards -->
	<!-- ============================================================== -->
	<div class="card-group">
		<div class="card border-right mr-3">
			<div class="card-body">
				<div class="d-flex d-lg-flex d-md-block align-items-center">
					<div>
						<div class="d-inline-flex align-items-center">
							<h2 class="text-dark mb-1 font-weight-medium"><span>{{ $totalService }}</span></h2>
						</div>
						<h6 class="font-weight-normal mb-0 w-100 text-truncate">@lang('custom_admin.label_total_service')</h6>
					</div>
					<div class="ml-auto mt-md-3 mt-lg-0">
						<span class="opacity-7">
							<a href="{{ route('admin.service.list') }}" class="hover-success"><i data-feather="command" class="feather-icon"></i></a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card border-right mr-3">
			<div class="card-body">
				<div class="d-flex d-lg-flex d-md-block align-items-center">
					<div>
						<div class="d-inline-flex align-items-center">
							<h2 class="text-dark mb-1 font-weight-medium"><span>{{ $totalPortfolio }}</span></h2>
						</div>
						<h6 class="font-weight-normal mb-0 w-100 text-truncate">@lang('custom_admin.label_total_portfolio')</h6>
					</div>
					<div class="ml-auto mt-md-3 mt-lg-0">
						<span class="opacity-7">
							<a href="{{ route('admin.portfolio.list') }}" class="hover-warning"><i data-feather="aperture" class="feather-icon"></i></a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="card border-right">
			<div class="card-body">
				<div class="d-flex d-lg-flex d-md-block align-items-center">
					<div>
						<div class="d-inline-flex align-items-center">
							<h2 class="text-dark mb-1 font-weight-medium"><span>{{ $totalEnquiry }}</span></h2>
						</div>
						<h6 class="font-weight-normal mb-0 w-100 text-truncate">@lang('custom_admin.label_total_enquiry')</h6>
					</div>
					<div class="ml-auto mt-md-3 mt-lg-0">
						<span class="opacity-7">
							<a href="{{ route('admin.enquiry.list') }}" class="hover-danger"><i data-feather="help-circle" class="feather-icon"></i></a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Second Cards -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Start Sales Charts Section -->
	<!-- ============================================================== -->
	{{-- <div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Net Income</h4>
					<div class="net-income mt-4 position-relative" style="height:294px;"></div>
					<ul class="list-inline text-center mt-5 mb-2">
						<li class="list-inline-item text-muted font-italic">Sales for this month</li>
					</ul>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- ============================================================== -->
	<!-- End Sales Charts Section -->
	<!-- ============================================================== -->

@endsection
