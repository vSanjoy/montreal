@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	@php
	$selectedCatIds 			= old('service_ids') ?? [];
	$selectedPortfolioCatIds 	= old('category_id') ?? '';
	@endphp

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">{{ $pageTitle }}</h4>
					{{ Form::open([
								'method'=> 'POST',
								'class' => '',
								'route' => [$routePrefix.'.'.$addUrl.'-submit'],
								'name'  => 'createPortfolioForm',
								'id'    => 'createPortfolioForm',
								'files' => true,
								'novalidate' => true]) }}
						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_category')<span class="red_star">*</span></label>
										<select class="selectpicker form-control" id="category_id" name="category_id" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($categoryList))
										@foreach ($categoryList as $keyCategory => $valCategory)
											<option value="{{ $valCategory->id }}" @if ($valCategory->id == $selectedPortfolioCatIds)selected @endif>{{ $valCategory->title }}</option>
										@endforeach
									@endif
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_service')<span class="red_star">*</span></label>
										<select multiple class="selectpicker form-control" id="service_ids" name="service_ids[]" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($serviceList))
										@foreach ($serviceList as $serviceId => $serviceTitle)
											<option value="{{ $serviceId }}" @if (in_array($serviceId, $selectedCatIds))selected @endif>{{ $serviceTitle }}</option>
										@endforeach
									@endif
										</select>
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_title')<span class="red_star">*</span></label>
										{{ Form::text('title', null, [
																	'id' => 'title',
																	'placeholder' => '',
																	'class' => 'form-control',		// slug-generation class is to call generate slug function
																	// 'data-model'	=> $modelName,	// Used in generate slug
																	'required' => true,
																]) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_short_title')</label>
										{{ Form::text('short_title', null, [
																	'id' => 'short_title',
																	'placeholder' => '',
																	'class' => 'form-control',
																]) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_short_description')</label>
										{{ Form::textarea('short_description', null, [
																					'id' => 'short_description',
																					'placeholder' => '',
																					'class' => 'form-control',
																					'rows'	=> 3,
																				]) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_description')</label>
										{{ Form::textarea('description', null, [
																				'id' => 'description',
																				'placeholder' => '',
																				'class' => 'form-control',
																			]) }}
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_is_featured')</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="is_featured" value="Y" class="cursor-pointer" id="customCheck_1">
											<label class="text-dark cursor-pointer va-top ml-1" for="customCheck_1">@lang('custom_admin.btn_yes')</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_image')<span class="red_star">*</span></label>
												{{ Form::file('image', [
																		'id' => 'image',
																		'class' => 'form-control upload-image',
																		'placeholder' => 'Upload Image',
																	]) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_image">
												<img id="image_preview" class="mt-2" style="display: none;" />
											</div>
										</div>
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
									<i class="far fa-save" aria-hidden="true"></i> @lang('custom_admin.btn_submit')
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
@include($routePrefix.'.includes.image_preview')
@endpush