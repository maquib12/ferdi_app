@extends('students.layout.master')
@section('content')
		<section class="my-5 pb-4">
			<div class="container">
				<div class="heading border-bottom border-light d-flex align-items-center pb-3">
					<h1 class="font-bold font-36 col-8 px-0 my-0">Loan Application Form</h1>
				</div>
				<div class="d-flex my-4 py-4">
					<ul class="nav nav-pills arrow-tabs">
						<li class="nav-item">
							<a class="nav-link active" href="#">EDI Forms 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">EDI Forms 2</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Loan Application Form</a>
						</li>
					</ul>
					<a href="" class="btn btn-default-outline d-flex align-items-center px-4 ml-auto">Save As Draft</a>
				</div>
				<h4>Marketing</h4>
				<div class="div d-flex align-items-center mt-5 mb-3">
					<span class="text-xlight">Who Are Your Key Competitor?</span>
					<a href="javascript:void(0)" class="text-primary ml-auto font-18 font-semibold competitor_owner">+ ADD MORE OWNER</a>
				</div>
				<form>
					<div class="row">
						
						<div class="row competitor_details">
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name = "product[]" placeholder="Your Product/Service*">
						  </div>
							<div class="col-sm-6 my-2 pb-1">
							  <input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="amount[]" placeholder="Amount ($)*">
						  </div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="competitor_name[]" placeholder="Name Of Competitor Operations*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="price_of_product[]" placeholder="Price Of Individual's/ Company's Product/ Service (₦)*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="price_of_operations[]" placeholder="Price Of Competitor Operations*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="region_of_operations[]" placeholder="Region Of Competitor Operations*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="government_area[]" placeholder="Local Government Area (LGA)*">
							</div>
							<div class="col-sm-6 my-2 pb-1">
								<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="difference_product[]" placeholder="Difference From Your Product/Service*">
							</div>
						
							<div class="col-sm-6 mt-5 pb-1">
								<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="target_service[]" required>
									<option selected disabled value="">Select Target Customer Of Your Service*</option>
									<option value="1">Value 1</option>
									<option value="2">Value 2</option>
								</select>
							</div>
						
						   <div class="col-sm-12 mt-5 pt-2 text-xlight">Why Will Your Product Or Service Be Preferred To That Of Your Competitor? Select All Those Apply</div>
							<div class="col-sm-12">
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="preferred_service[]" class="d-none" value="it will not be better than competitor's product but will meet current market need"><em class="mr-4 text-gray2"></em> it will not be better than competitor's product but will meet current market need</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="preferred_service[]" class="d-none" value="it will be a superior quality"><em class="mr-4 text-gray2"></em> it will be a superior quality</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="preferred_service[]" class="d-none" value="it has no real competitor in the market"><em class="mr-4 text-gray2"></em> it has no real competitor in the market</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="preferred_service[]" class="d-none" value="it will be offer more choice to the cutomers"><em class="mr-4 text-gray2"></em> it will be offer more choice to the cutomers</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="preferred_service[]" class="d-none" value="it will be priced lower than the market prices"><em class="mr-4 text-gray2"></em> it will be priced lower than the market prices</label>
							</div>
							<div class="col-sm-6 mt-5 pb-1">
								<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="advertise[]" required>
									<option selected disabled value="">How Will You Advertise Your Business To The Customer?*</option>
									<option value="1">Value 1</option>
									<option value="2">Value 2</option>
								</select>
							</div>
							<div class="col-sm-6 mt-5 pb-1">
								<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="target_sales[]" required>
									<option selected disabled value="">Select Target Location For Sales*</option>
									<option value="1">Value 1</option>
									<option value="2">Value 2</option>
								</select>
							</div>
							<div class="col-sm-12 mt-5 pt-2 text-xlight">How Will You Sell Your Product/Services? Please Select All Applicable Responses</div>
							<div class="col-sm-12 mb-5">
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="sell_product[]" value="Direct sales and marketing by you or your employees" class="d-none"><em class="mr-4 text-gray2"></em> Direct sales and marketing by you or your employees</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="sell_product[]" value="Direct sales through your own outlet" class="d-none"><em class="mr-4 text-gray2"></em> Direct sales through your own outlet</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="sell_product[]" value="Indirect sales through distributors, agents or other shops" class="d-none"><em class="mr-4 text-gray2"></em> Indirect sales through distributors, agents or other shops</label>
								<label class="form-checkbox lg mt-4" role="button"><input type="checkbox" name="sell_product[]" value="other" class="d-none"><em class="mr-4 text-gray2"></em> other</label>
							</div>
							
						</div>
						<div class="col-sm-12 mb-4">
							<h4>Financial Analysis</h4>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="closing_applicable" required>
								<option selected disabled value="">Public Holidays/Any Closing Applicable To Your Business*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="days_applicable" required>
								<option selected disabled value="">Select If Operational Days Are Applicable*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="operate_year" required>
								<option selected disabled value="">How Many Weeks You Operate In A Year*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-12 div d-flex align-items-center mt-5 mb-4">
							<span class="text-xlight">What Product/Service Will Your Company/Business Provide?</span>
							<a href="javascript:void(0)" class="text-primary ml-auto font-18 font-semibold more_product">+ ADD MORE PRODUCT/SERVICE</a>
						</div>
						<div class="row add_product">
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="list_product[]" placeholder="List Of Product/Service*">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="product_quality[]" placeholder="Production Quality/Capacity*">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" name="period[]" required>
										<option selected disabled value="">Period</option>
										<option value="1">Value 1</option>
										<option value="2">Value 2</option>
										<option value="3">Value 3</option>
									</select>
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="company_price[]" placeholder="Company Price Or Product (₦)*">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="retail_price[]" placeholder="Retail Price Of Product/Service*">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="describe_product[]" placeholder="Describe The Product/Service*">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="direct_labour[]" placeholder="Direct Labour %">
								</div>
								<div class="col-sm-6 my-2 pb-1">
									<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" name="material_used[]" placeholder="Material Used %">
								</div>
						</div>
						<div class="col-sm-12 mt-5 pb-1">
							<div class="d-flex rounded-pill overflow-hidden border border-dark">
								<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="how much of the service/product you produce in year 1 do you expect to sell?">
								<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">1-100</div>
								<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
							</div>
						</div>
						<div class="col-sm-12 text-xlight mt-5 pt-2 mb-3">How Frequent Do You Expect To Increase The Price Of Your Service/Product?</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required>
								<option selected disabled value="">Select Frequency*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required>
								<option selected disabled value="">Select % Of Service/Product Prices Change Periodically*</option>
								<option value="1">Value 1</option>
								<option value="2">Value 2</option>
								<option value="3">Value 3</option>
							</select>
						</div>
						<div class="col-sm-12 text-xlight mt-5 pt-2 mb-3">Provide Details Of Your Cost Of Sales</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Raw Material Monthly Cost (₦)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Salaries Monthly Cost (₦)*">
						</div>
						<div class="col-sm-12 text-xlight mt-5 pt-2 mb-3">Provide Details Of The Companys Operational Expenses</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Rent Monthly Cost (₦)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="General And Administration (₦)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Utilities Monthly Cost (₦)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Others Monthly Cost (₦)*">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h6 class="text-xlight mt-5 mb-4">Provide Details Of The Companys Operational Expenses</h6>
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Land And Building</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Purchase Price (₦)*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Year Of Acquisition*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Life Span In Figures*">
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Machinery And Equipments</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Purchase Price (₦)*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Year Of Acquisition*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Life Span In Figures*">
						</div>
						<div class="col-sm-12 text-xlight mt-4 mb-3">Motor Vehicle</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Purchase Price (₦)*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Year Of Acquisition*">
						</div>
						<div class="col-sm-4 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Life Span In Figures*">
						</div>
						<div class="col-sm-12 text-xlight mt-5 mb-3">Provide A List Of Your Companies Current Assets</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Inventory Of Finished Goods (Value)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Accounts Receivable (Value)*">
						</div>
						<div class="col-sm-6 my-2 pb-1">
							<input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Available Cash In Bank And In-Hand (Value)*">
						</div>
						<div class="col-sm-12 div d-flex align-items-center mt-5 mb-4">
							<span class="text-xlight">Use Of Funds</span>
							<a href="javascript:void(0)" class="text-primary ml-auto font-18 font-semibold more_competitors">+ ADD MORE COMPETITOR</a>
						</div>
						<div class="row add_competitors">
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To start a new business">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
						    </div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To purchase new machinery to exoand our existing line of busines">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To purchase second hand machinery to improve our busines">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To expand the site of an existing business">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To renovate existing structures to meet regulatory requirements">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To refinance a loan">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To start a new product/service line">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
								  </div>
						    </div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To fund operations/ service capital">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To restart activities of a dormant business">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
								<div class="col-sm-12 mt-2 mb-1 pb-2">
									<div class="d-flex rounded-pill overflow-hidden border border-dark">
										<input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="Others, please specify">
										<div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div>
										<div class="bg-primary px-4 d-flex align-items-center font-26">%</div>
									</div>
								</div>
							
						</div>
					</div>
					<div class="row mt-5 pt-md-4">
						<div class="col-sm-3">
							<button class="btn btn-default-outline rounded-pill btn-block btn-md">Save As Draft</button>
						</div>
						<div class="col-sm-3">
							<button class="btn btn-primary rounded-pill btn-block btn-md">Save & Continue</button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<script src="{{asset('student/assets/js/jquery-3.5.1.min.js')}}"></script>
		<script type="text/javascript">

			$(".competitor_owner").on("click", function(){
				console.log('aquib');
							$('.competitor_details').append('<div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Your Product/Service*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Amount ($)*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Name Of Competitor Operations*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Price Of Individual Company Product/ Service (₦)*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Price Of Competitor Operations*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Region Of Competitor Operations*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Local Government Area (LGA)*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Difference From Your Product/Service*"></div><div class="col-sm-6 mt-5 pb-1"><select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required><option selected disabled value="">Select Target Customer Of Your Service*</option><option value="1">Value 1</option><option value="2">Value 2</option></select></div><div class="col-sm-12 mt-5 pt-2 text-xlight">Why Will Your Product Or Service Be Preferred To That Of Your Competitor? Select All Those Apply</div><div class="col-sm-12"><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> it will not be better than competitor product but will meet current market need</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> it will be a superior quality</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> it has no real competitor in the market</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> it will be offer more choice to tha cutomers</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> it will be priced lower than the market prices</label></div><div class="col-sm-6 mt-5 pb-1"><select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required><option selected disabled value="">How Will You Advertise Your Business To The Customer?*</option><option value="1">Value 1</option><option value="2">Value 2</option></select></div><div class="col-sm-6 mt-5 pb-1"><select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required><option selected disabled value="">Select Target Location For Sales*</option><option value="1">Value 1</option><option value="2">Value 2</option></select></div><div class="col-sm-12 mt-5 pt-2 text-xlight">How Will You Sell Your Product/Services? Please Select All Applicable Responses</div><div class="col-sm-12 mb-5"><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> Direct sales and marketing by you or your employees</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> Direct sales through your own outlet</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> Indirect sales through distributors, agents or other shops</label><label class="form-checkbox lg mt-4" role="button"><input type="checkbox" class="d-none"><em class="mr-4 text-gray2"></em> other</label></div>');

			});

			$(".more_product").on("click", function(){
				$('.add_product').append('<div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="List Of Product/Service*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Production Quality/Capacity*"></div><div class="col-sm-6 my-2 pb-1"><select class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray arrow-w" required><option selected disabled value="">Period</option><option value="1">Value 1</option><option value="2">Value 2</option><option value="3">Value 3</option></select></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Company Price Or Product (₦)*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Retail Price Of Product/Service*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Describe The Product/Service*"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Direct Labour %"></div><div class="col-sm-6 my-2 pb-1"><input class="form-control rounded-pill bg-dark border-0 px-4 lg ph-gray text-white" placeholder="Material Used %"></div>');
				});

			$(".more_competitors").on("click", function(){
				$('.add_competitors').append('<div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To start a new business"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To purchase new machinery to exoand our existing line of busines"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To purchase second hand machinery to improve our busines"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To expand the site of an existing business"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To renovate existing structures to meet regulatory requirements"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To refinance a loan"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To start a new product/service line"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To fund operations/ service capital"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="To restart activities of a dormant business"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div><div class="col-sm-12 mt-2 mb-1 pb-2"><div class="d-flex rounded-pill overflow-hidden border border-dark"><input class="form-control rounded-0 border-0 bg-transparent px-4 lg ph-gray text-white" placeholder="" value="Others, please specify"><div class="bg-dark col-2 d-flex align-items-center px-4 font-xlight">Allocation</div><div class="bg-primary px-4 d-flex align-items-center font-26">%</div></div></div>');
				});
		</script>
@endsection	