@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">{{ $pageTitle }}</h4>
					{{ Form::open([
								'method'=> 'POST',
								'class' => '',
								'route' => [$routePrefix.'.'.$editUrl.'-submit', $id],
								'name'  => 'updatePortfolioCategoryForm',
								'id'    => 'updatePortfolioCategoryForm',
								'files' => true,
								'novalidate' => true]) }}

						{{ Form::hidden('id', $id, ['id' => 'id', 'class' => 'form-control']) }}

						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_title')<span class="red_star">*</span></label>
										{{ Form::text('title', $details->title, [
																		'id' => 'title',
																		'placeholder' => '',
																		'class' => 'form-control',		// slug-generation class is to call generate slug function
																		// 'data-model'	=> $modelName,	// Used in generate slug
																		'required' => true,
																	]) }}
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions mt-4">
							<div class="float-left">
								<a class="btn btn-secondary waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.'.$listUrl) }}">
									<i class="far fa-arrow-alt-circle-left"></i> @lang('custom_admin.btn_cancel')
								</a>
							</div>
							<div class="float-right">
								<button type="submit" id="btn-processing" class="btn btn-success waves-effect waves-light btn-rounded shadow-md pr-3 pl-3">
									<i class="far fa-save" aria-hidden="true"></i> @lang('custom_admin.btn_update')
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection
