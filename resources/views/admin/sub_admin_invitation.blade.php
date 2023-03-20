<html>
	<head>
		<title></title>
	</head>
	<body style="margin: 0; font-family: arial; ">
		<div style="max-width: 650px; margin: 0 auto">
			<div style="text-align: center;background: #000;padding: 15px 0;">
				<img src="{{asset('assets/images/logo-inner.svg')}}">
			</div>
			<div style="padding: 10px 0;line-height: 25px;">
				<p>Hello {{$data['name']}}</p>

				<p>Your registration is successful on FERDI.com. You are registered as  Sub Admin.</p>
				<p>Email Address - {{$data['email']}}<br>
				Password - {{$data['email']}}</p>

				<p>Best Regards<br>
				FERDI.com</p>
			</div>
			<div style="background: #000;text-align: center;color: #fff;padding: 10px 0;font-size: 14px;">
				Copyright © 2021 Ferdi. All rights reserved.
			</div>
		</div>
	</body>
</html>