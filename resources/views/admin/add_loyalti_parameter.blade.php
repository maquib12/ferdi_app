@extends('admin.layout.master')
@section('content')
<?php 
if(isset($parameters->referral)) $referral = $parameters->referral; else $referral = null;
if(isset($parameters->joining)) $joining = $parameters->joining; else $joining = null;
if(isset($parameters->dollar)) $dollar = $parameters->dollar; else $dollar = null;
?>
        <div class="main-panel">
          <div class="content-wrapper">
						<div class="sub-title">
							<h4 class="weight-500">Add/Edit Loyalty Parameters</h4>
						</div>
						<form action="{{route('add_loylity_parameters')}}" method="post" class="mt-4">
							<div class="card shadow-none pt-4">
								@csrf
								<div class="form-group col-sm-12">
									<label>Referral Credit Point</label>
									<input type="number" class="form-control font-16 rounded-pill px-4 py-4" placeholder="Example : 1" name="referral" required="" value="{{$referral}}">
								</div>
								<div class="form-group col-sm-12">
									<label>Joining Point</label>
									<input type="number" class="form-control font-16 rounded-pill px-4 py-4" placeholder="Example : 30" name="joining" required="" value="{{$joining}}">
								</div>
								<div class="form-group col-sm-12">
									<label>value of 1 point is equal to Dollar($)</label>
									<input type="number" class="form-control font-16 rounded-pill px-4 py-4" placeholder="Example : 76" name="dollar" required="" value="{{$dollar}}">
								</div>
							</div>
							<div class="form-group col-sm-6 mt-3 px-0">
								<a class="btn btn-secondary btn-lg rounded-pill col-sm-5" href="{{route('loylity_managemet')}}">Cancel</a>
								<input type="submit" class="btn btn-primary btn-lg rounded-pill col-sm-5" value="Submit">
							</div>
						</form>
					</div>
          <!-- content-wrapper ends -->
			</div>
		</div>
	</div>
@endsection