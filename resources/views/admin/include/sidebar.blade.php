
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="{{route('home')}}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-airplay menu-icon"></i>
			</a>
		</li>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(2) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('user_management')}}">
				<span class="menu-title">User Management</span>
				<i class="mdi mdi-account menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(3) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('course_management')}}">
				<span class="menu-title">Course Management</span>
				<i class="mdi mdi-book-open menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(4) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('transactionManagementView')}}">
				<span class="menu-title">Transaction Management</span>
				<i class="mdi mdi-cash-multiple menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(5) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('loylity_managemet')}}">
				<span class="menu-title">Loyalty Points Management</span>
				<i class="mdi mdi-account-check menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(6) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('loanManagementView')}}">
				<span class="menu-title">Loan Management</span>
				<i class="mdi mdi-cash menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(7) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('report')}}">
				<span class="menu-title">Reports</span>
				<i class="mdi mdi-note-multiple menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(8) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('sub_admin')}}">
				<span class="menu-title">Sub Admin Management</span>
				<i class="mdi mdi-account-box menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && (page_permission(9) == true || page_permission(10) == true || page_permission(11) == true || page_permission(12) == true)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#drop-5" aria-expanded="false">
				<span class="menu-title">Notification Management</span>
				<i class="menu-arrow"></i>
				<i class="mdi mdi-near-me menu-icon"></i>
			</a>
			<div class="collapse" id="drop-5">
				<ul class="nav flex-column sub-menu">
					<?php 
            			if((Auth::user()->user_type_id == 7 && (page_permission(9) == true || page_permission(10) == true)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
					?>
					<li class="nav-item"> <a class="nav-link" href="{{route('email_notification_templates')}}">Email Notification Template managemet</a></li>
					<?php } ?>
					<?php 
            			if((Auth::user()->user_type_id == 7 && (page_permission(9) == true || page_permission(11) == true)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
					?>
					<li class="nav-item"> <a class="nav-link" href="{{route('email_notification')}}">Send Email Notification</a></li>
					<?php } ?>
					<?php 
            			if((Auth::user()->user_type_id == 7 && (page_permission(9) == true || page_permission(12) == true)) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
					?>
					<li class="nav-item"> <a class="nav-link" href="{{route('send_sms_notification')}}">Send SMS Notification</a></li>
					<?php } ?>
				</ul>
			</div>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(13) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('cms_list')}}">
				<span class="menu-title">CMS Pages</span>
				<i class="mdi mdi-comment-question-outline menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(14) == true) || Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('system_seeting')}}">
				<span class="menu-title">Settings</span>
				<i class="mdi mdi-settings menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<?php 
            if((Auth::user()->user_type_id == 7 && page_permission(15) == true) ||Auth::user()->user_type_id == 2 || Auth::user()->user_type_id == 1){
		?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('blog_management')}}">
				<span class="menu-title">Blog Management</span>
				<i class="mdi mdi-blogger menu-icon"></i>
			</a>
		</li>
		<?php } ?>
		<li class="nav-item">
			<a class="nav-link" href="{{route('logout')}}">
				<span class="menu-title">Logout</span>
				<i class="mdi mdi-logout menu-icon"></i>
			</a>
		</li>
	</ul>
</nav>