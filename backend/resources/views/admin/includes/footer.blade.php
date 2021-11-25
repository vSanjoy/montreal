<footer class="footer text-center">
    @lang('custom_admin.message_copyright') &copy; {{date('Y')}} @lang('custom_admin.message_reserved'). @lang('custom_admin.message_designed_and_developed_by') <a href="http://www.vishipremworkz.com/" target="_blank">@lang('custom_admin.message_designer_and_developer')</a>.
</footer>

<input type="hidden" name="admin_url" id="admin_url" value="{{ url('/adminpanel') }}" />
<input type="hidden" name="admin_image_url" id="admin_image_url" value="{{asset('images/admin/')}}" />