<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>{{$siteSetting->website_title}}</title>
  	<style type="text/css">
  		p{ margin:0; padding:12px 0 0 0; line-height:22px;}
  	</style>
</head>

<body style="background:#efefef; margin:0; padding:0;">
  	<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">
    	<tbody>
      		<tr>
        		<td align="center" valign="middle" bgcolor="#184895" style="padding:15px; margin:0; line-height:0; border-top:2px solid #184895; border-bottom:1px solid #184895;">
          			<a target="_blank" href="#"><img src="{{asset('images/admin/logo-white.png')}}" alt="" style="border:0;" width="250" /></a>
        		</td>
      		</tr>
      		<tr>
        		<td align="left" valign="top" bgcolor="#ffffff" style="color:#3c3c3c; margin:0; padding: 30px 15px 30px 15px;">
          			@yield('content')
        		</td>
      		</tr>
      		<tr>
        		<td align="center" valign="middle" bgcolor="#33363D" style="padding:20px; color:#ffffff; margin:0; line-height:0;">{{ date('Y') }} @lang('custom_admin.label_montreal_webdesign'). @lang('custom_admin.message_reserved').</td>
      		</tr>
    	</tbody>
  	</table>
</body>
</html>
