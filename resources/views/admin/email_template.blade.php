@extends('admin.layout.master')
@section('content')
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Template</h4>
						</div>
						<div class="card bg-transparent shadow-none px-0">
							<form action="{{route('addEmailTemplate')}}" method="post" name="" class="mt-4 row">
								@csrf
								<div class="form-group col-sm-12">
									<input class="form-control font-300 rounded-pill lg font-16" placeholder="Template Name" name="subject">
								</div>
								<div class="form-group col-sm-12">
									<textarea class="form-control p-4 font-16 textEditor" id="textEditor" rows="12" placeholder="What you would like to write about today..." name="body"></textarea>
								</div>
								<div class="form-group col-sm-6">
									<a class="btn btn-secondary btn-lg rounded-pill col-sm-5" href="{{route('email_notification_templates')}}">Cancel</a>
									<input class="btn btn-primary btn-lg rounded-pill col-sm-5" type="submit" value="Save">
								</div>
							</form>
						</div>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection