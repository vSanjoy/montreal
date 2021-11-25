@php
$getAllRoles = getUserRoleSpecificRoutes();
$isSuperAdmin = false;
if (\Auth::guard('admin')->user()->id == 1 || \Auth::guard('admin')->user()->type == 'SA') {
    $isSuperAdmin = true;
}

$currentPageMergeRoute = explode('admin.', Route::currentRouteName());
if (count($currentPageMergeRoute) > 0) {
    $currentPage = $currentPageMergeRoute[1];
} else {
    $currentPage = Route::currentRouteName();
}

// Get site settings data
$getSiteSettings = getSiteSettings();
@endphp

<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item @if ($currentPage == 'dashboard')selected @endif"> 
					<a class="sidebar-link sidebar-link @if ($currentPage == 'dashboard')active @endif" href="{{ route('admin.dashboard') }}" aria-expanded="false">
						<i data-feather="home" class="feather-icon"></i><span class="hide-menu">@lang('custom_admin.label_dashboard')</span>
					</a>
				</li>

				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">@lang('custom_admin.label_managements')</span></li>

			<!-- Service Management Start -->
			@php
			$serviceRoutes = ['service.list','service.add','service.edit','service.sort'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('service.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $serviceRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $serviceRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="command" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_menu_service')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $serviceRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.service.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
						@if ( ($isSuperAdmin) || (in_array($currentPage, $serviceRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.service.add') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_add')</span>
							</a>
						</li>
						@endif
						@if ( ($isSuperAdmin) || (in_array($currentPage, $serviceRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.service.sort') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_sort')</span>
							</a>
						</li>
						@endif
					</ul>
				</li>
			@endif

			<!-- Portfolio Category Management Start -->
			@php
			$portfolioCategoryRoutes = ['portfolioCategory.list','portfolioCategory.add','portfolioCategory.edit','portfolioCategory.sort'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('portfolioCategory.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $portfolioCategoryRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $portfolioCategoryRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="life-buoy" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_menu_portfolio_category')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $portfolioCategoryRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolioCategory.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
						@if ( ($isSuperAdmin) || (in_array($currentPage, $portfolioCategoryRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolioCategory.add') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_add')</span>
							</a>
						</li>
						@endif
						@if ( ($isSuperAdmin) || (in_array($currentPage, $portfolioCategoryRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolioCategory.sort') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_sort')</span>
							</a>
						</li>
						@endif
					</ul>
				</li>
			@endif

			<!-- Portfolio Management Start -->
			@php
			$portfolioRoutes = ['portfolio.list','portfolio.add','portfolio.edit','portfolio.sort'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('portfolio.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $portfolioRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $portfolioRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="aperture" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_menu_portfolio')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $portfolioRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolio.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
						@if ( ($isSuperAdmin) || (in_array($currentPage, $portfolioRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolio.add') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_add')</span>
							</a>
						</li>
						@endif
						@if ( ($isSuperAdmin) || (in_array($currentPage, $portfolioRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.portfolio.sort') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_sort')</span>
							</a>
						</li>
						@endif
					</ul>
				</li>
			@endif

			<!-- Enquiry Management Start -->
			@php
			$enquiryRoutes = ['enquiry.list','enquiry.add','enquiry.edit','enquiry.sort'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('enquiry.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $enquiryRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $enquiryRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="help-circle" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_menu_enquiry')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $enquiryRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.enquiry.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
					</ul>
				</li>
			@endif

			<!-- Contact Management Start -->
			{{-- @php
			$contactRoutes = ['contact.list','contact.add','contact.edit','contact.sort'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('contact.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $contactRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $contactRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="mail" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_menu_contact')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $contactRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.contact.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
					</ul>
				</li>
			@endif --}}

			<!-- Website Settings & CMS Management Start -->
			@php
			$siteSettingRoutes 	= ['website-settings'];
			$cmsRoutes 			= ['cms.list','cms.add','cms.edit'];
			@endphp
			@if ( ($isSuperAdmin) || in_array('website-settings', $getAllRoles) || in_array('cms.list', $getAllRoles) )
				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">@lang('custom_admin.label_miscellaneous')</span></li>

				@if ( ($isSuperAdmin) || in_array('cms.list', $getAllRoles) )
				<li class="sidebar-item @if (in_array($currentPage, $cmsRoutes))selected @endif">
					<a class="sidebar-link has-arrow @if (in_array($currentPage, $cmsRoutes))active @endif" href="javascript:void(0)" aria-expanded="false">
						<i data-feather="layers" class="feather-icon"></i><span class="hide-menu"> @lang('custom_admin.label_cms')</span>
					</a>
					<ul aria-expanded="false" class="collapse first-level base-level-line @if (in_array($currentPage, $cmsRoutes))in @endif">
						<li class="sidebar-item">
							<a href="{{ route('admin.cms.list') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_list')</span>
							</a>
						</li>
						{{-- @if ( ($isSuperAdmin) || (in_array($currentPage, $cmsRoutes)) )
						<li class="sidebar-item">
							<a href="{{ route('admin.cms.add') }}" class="sidebar-link sub-menu">
								<span class="hide-menu"> @lang('custom_admin.label_add')</span>
							</a>
						</li>
						@endif --}}
					</ul>
				</li>
				@endif

				@if ( ($isSuperAdmin) || (in_array('website-settings', $getAllRoles)) )
				<li class="sidebar-item @if (in_array($currentPage, $siteSettingRoutes))selected @endif"> 
					<a class="sidebar-link sidebar-link @if (in_array($currentPage, $siteSettingRoutes))active @endif" href="{{ route('admin.website-settings') }}" aria-expanded="false">
						<i data-feather="settings" class="feather-icon"></i><span class="hide-menu">@lang('custom_admin.label_website_settings')</span>
					</a>
				</li>
				@endif
			@endif

				<li class="list-divider"></li>
				<li class="sidebar-item">
					<a class="sidebar-link sidebar-link" href="{{ route('admin.logout') }}" aria-expanded="false">
						<i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">@lang('custom_admin.label_signout')</span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>