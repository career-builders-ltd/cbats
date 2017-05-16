<?php $nav_pos='_jobs' ?>
@extends('layouts.base',['title'=>'CB ATS - Job Openings'])
@section('styles')
<link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/typeahead/typeahead.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/ion.rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection('styles')

@section('head')
@endsection('head')

@section('body')
<h1 class="page-title"> Job Openings
	<small class='small'> | You have <span class="badge badge-warning"> {{!empty($data['order']) ? count($data['order']) : 0}} </span> active job openings </small>
</h1>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li><i class="icon-home"></i><a href="{{asset('dashboard')}}"> Home </a> <i class="fa fa-angle-right"></i> </li>
		<li><span> Job Openings </span></li>
		<li class='hide'><span><i class="fa fa-angle-right"></i> <span id='pg_jobTitle'></span></span></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit ">
			<div class="portlet-body">
				<div class="tabbable-line boxless margin-bottom-20">
					<ul class="nav nav-tabs" role='tab-options' section='jobs'>
						<li class="active"><a href="#joblist" data-toggle="tab">My Job List</a></li>
						<li><a href="#overview" data-toggle="tab" disabled='disabled'> Overview </a></li>
						<li style='display:none;'><a href="#editjob" data-toggle="tab" disabled='disabled'> Edit </a></li>
						<li><a href="#tearsheet" data-toggle="tab" disabled='disabled'> Tearsheet </a></li>
						<li><a href="#shortlist" data-toggle="tab" disabled='disabled'> Shortlist </a></li>
						<li><a href="#submission" data-toggle="tab" disabled='disabled'> Submission </a></li>
						<li><a href="#interview" data-toggle="tab" disabled='disabled'> Interview </a></li>
						<li><a href="#placement" data-toggle="tab" disabled='disabled'> Placement </a></li>
						<li><a href="#notes" data-toggle="tab" disabled='disabled'> Notes </a></li>
						<li>
							<a href="#newOrder" data-toggle="tab"> <span class="text-primary"> <strong>New Order</strong></span></a>
						</li>
					</ul>
					<div class="tab-content">

						<!-- ##################################### -->
						<!-- ############ Job List TAB ########### -->
						<!-- ##################################### -->
						<div class="tab-pane active" id="joblist">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button btn-role='add-new-order' class="btn green"> Add New
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class='btn-group'>
											<button btn-role='refresh-list' class="btn blue btn-outline"> REFRESH
												<i class="fa fa-refresh"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
																<i class="fa fa-angle-down"></i>
															</button>
											<ul class="dropdown-menu pull-right">
												<li><a href="javascript:;"> Print </a></li>
												<li><a href="javascript:;"> Save as PDF </a></li>
												<li><a href="javascript:;"> Export to Excel </a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>


							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th> Job# </th>
										<th> Job Title </th>
										<th> Company </th>
										<th> Status </th>
										<th> Due Date </th>
										<th> Edit </th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									@foreach($data['order'] as $order)
										<tr>
											<td>
												<?php echo $i<10 ? '0'.$i : $i; ?>
											</td>
											<td><a name='order-title' hrefurl="#overview" data-orderId='{{$order->Order_ID}}' data-resp="tab">{{$order->Order_Title}}</a></td>
											<td>{{$order->Company_Name}}</td>
											<td class="center"> {{$data['order_status'][$order->Status]->Status}} </td>
											<td class="center"> {{date('M d, Y',strtotime($order->Required_Date))}} </td>
											<td>
												<a class="edit" hrefurl="#overview" data-orderId='{{$order->Order_ID}}' data-resp="tab"> View / Edit </a>
											</td>
										</tr>
										<?php $i++; ?>
										@endforeach
								</tbody>
							</table>
						</div>

						<!-- ##################################### -->
						<!-- ######## Job OVERVIEW TAB ######## -->
						<!-- ##################################### -->
						<div class="tab-pane" id="overview">
							<div class="col-md-7">
								<h4><strong id='ov_title'></strong></h4>
								<h5 id='ov_company'></h5><br>
							</div>
							<div class="col-md-5">
								<div class='row'>
									<div class='col-xs-12 pull-right text-right form-group'>
										<button btn-role='edit-order' hrefurl="#editjob" class="btn blue btn-outline"> EDIT ORDER
								<i class="fa fa-pencil"></i>
							</button>
									</div>
									<div class='col-xs-12 small text-right'>
										Shortlisted: <span class="badge badge-success" id='ov_shortlist'>0</span>
										<span class="font-default"> &nbsp;|&nbsp; </span> Submitted: <span class="badge badge-info" id='ov_submit'>0</span>
										<span class="font-default"> &nbsp;|&nbsp; </span> Interview: <span class="badge badge-primary" id='ov_interview'>0</span>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<input id="ov_status_view" type="text" style='display:none;' />
								<span class="help-block"></span>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight">Date Added:</td>
														<td class="hidden-xs" id='ov_addDate'></td>
													</tr>
													<tr>
														<td class="highlight">Scheduled End:</td>
														<td class="hidden-xs" id='ov_schDate'></td>
													</tr>
													<tr>
														<td class="highlight">Client:</td>
														<td class="hidden-xs" id='ov_client'></td>
													</tr>
													<tr>
														<td class="highlight">Client Contact:</td>
														<td class="hidden-xs">
															<span id='ov_CPName'></span>
															<span id='ov_CPPhone'></span>
														</td>
													</tr>
													<tr>
														<td class="highlight">Open / Closed:</td>
														<td class="hidden-xs" id='ov_astatus'></td>
													</tr>
													<tr>
														<td class="highlight">Status:</td>
														<td class="hidden-xs" id='ov_status'></td>
													</tr>
													<tr>
														<td class="highlight">Priority:</td>
														<td class="hidden-xs" id='ov_priority'></td>
													</tr>
													<tr>
														<td class="highlight">Owner:</td>
														<td class="hidden-xs" id='ov_userName'></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight">Salary:</td>
														<td class="hidden-xs" id='ov_salary'></td>
													</tr>
													<tr>
														<td class="highlight">Location:</td>
														<td class="hidden-xs" id='ov_location'></td>
													</tr>
													<tr>
														<td class="highlight"># of Openings:</td>
														<td class="hidden-xs" id='ov_numOpen'></td>
													</tr>
													<tr>
														<td class="highlight">Category:</td>
														<td class="hidden-xs" id='ov_industry'></td>
													</tr>
													<tr>
														<td class="highlight">Required Skills:</td>
														<td class="hidden-xs" id='ov_skills'></td>
													</tr>
													<tr>
														<td class="highlight">Additional Keywords:</td>
														<td class="hidden-xs" id='ov_keywords'></td>
													</tr>
													<tr>
														<td class="highlight">Min. Experience:</td>
														<td class="hidden-xs" id='ov_minexp'></td>
													</tr>
													<tr>
														<td class="highlight">Degree Requirements:</td>
														<td class="hidden-xs" id='ov_reqDeg'></td>
													</tr>
													<tr>
														<td class="highlight">Certification Requirements:</td>
														<td class="hidden-xs" id='ov_reqCert'></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<h4><strong>Job Description</strong></h4>
							<div class="m-heading-1 border-green m-bordered" id='ov_jdesc'></div>
						</div>

						<!-- ########################################### -->
						<!-- ######## Job DESCRIPTION EDIT TAB ######### -->
						<!-- ########################################### -->

						<div class="tab-pane" id="editjob">
							<div class="col-md-8 no-side-padding">
								<div class="form-group form-md-line-input has-success">
									<input type="text" class="form-control input-lg pad0" placeholder="Job Title" value="PHP Developer">
									<div class="form-control-focus"> </div>
								</div>
							</div>
							<div class="col-md-4 no-side-padding text-align-reverse">
								<button type="button" btn-role='cancel-order' class="btn red btn-outline">Cancel <i class='fa fa-times'></i></button>
								<button type="button" btn-role='update-order' class="btn blue btn-outline">Update <i class='fa fa-floppy-o'></i></button>
							</div>
							<div class="row">
								<!-- ###################################### -->
								<!-- LEFT JOB DESCRIPTION INFORMATION PANEL -->
								<div class="col-md-6">
									<!-- BEGIN SAMPLE TABLE PORTLET-->
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight">Date Added:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<input class="form-control form-control-inline init-datepicker" id='ov_addDate_edit' name='ov_addDate_edit' size="" type="text" value="May 04, 2017"></div>
															<div class="form-control-focus"> </div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Required Date</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<input class="form-control form-control-inline init-datepicker" size="16" type="text" value="May 04, 2017"> </div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Salary:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<div class="input-group">
																	<span class="input-group-addon">Rs.</span>
																	<input type="text" class="form-control" value="" id='ov_salary_edit'>
																	<span class="help-block">Salary + Allowances</span>
																	<span class="input-group-addon">.00</span>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Location:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<input type="text" class="form-control" placeholder="City / Town" value="" id='ov_location_edit'></div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Client</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-error">
																<div class="input-group">
																	<div class="input-group-control">
																		<input type="text" class="form-control" placeholder="Client name" value="" id='ov_client_edit'>
																	</div>
																	<span class="input-group-btn btn-right">
																		<button type="button" class="btn green-haze dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Client
																			<i class="fa fa-angle-down"></i>
																		</button>
																		<ul class="dropdown-menu pull-right" role="menu">
																			<li>
																				<a href="javascript:;">New Client..</a>
																			</li>
																			<li>
																				<a href="javascript:;">Select Client..</a>
																			</li>
																		</ul>
																	</span>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Client Contact:</td>
														<td class="hidden-xs">

															<div class="col-md-7 no-side-padding">
																<div class="form-group form-md-line-input has-success">
																	<input type="text" class="form-control" id="ov_CPName_edit" placeholder="Contact Name" value="">
																	<div class="form-control-focus"></div>
																</div>
															</div>
															<div class="col-md-5 no-side-padding">
																<div class="form-group form-md-line-input has-warning">
																	<input type="text" class="form-control" id="ov_CPPhone_edit" placeholder="Contact Number" value="">
																	<div class="form-control-focus"></div>
																</div>
															</div>

														</td>
													</tr>
													<tr>
														<td class="highlight">Open / Closed:</td>
														<td class="hidden-xs">
															<div class="md-radio-inline">
																<div class="md-radio">
																	<input type="radio" id="radio6" name="radio2" class="md-radiobtn" checked="">
																	<label for="radio6">
																		<span class="inc"></span>
																		<span class="check"></span>
																		<span class="box"></span> Open </label>
																</div>
																<div class="md-radio">
																	<input type="radio" id="radio7" name="radio2" class="md-radiobtn">
																	<label for="radio7">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span> Closed </label>
																</div>
															</div>


														</td>
													</tr>
													<tr>
														<td>Status: </td>
														<td>
															<select class="bs-select form-control" id='ov_status_edit'>
																<option>Accepting Candidates</option>
																<option>Covered</option>
																<option>Offer Out</option>
																<option>Placed</option>
																<option>On Hold</option>
																<option>Lost > Competition</option>
																<option>Lost > Funding</option>
																<option>Lost > Filled</option>
																<option>Archieve</option>
															</select>
														</td>
													</tr>
													<tr>
														<td>Priority: </td>
														<td>
															<select class="bs-select form-control" id='ov_priority_edit'>
																<option>Hot</option>
																<option>Warm</option>
																<option>Cold</option>
															</select>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- ############################################# -->
								<!-- END OF LEFT JOB DESCRIPTION INFORMATION PANEL -->



								<!-- ############################################## -->
								<!-- END OF RIGHT JOB DESCRIPTION INFORMATION PANEL -->
								<div class="col-md-6">
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight"># of Openings</td>
														<td class="hidden-xs">
															<input id="num_openings" type="text" value="1" name="number_of_openings" class="form-control"> </div>

										</td>
										</tr>
										<tr>
											<td class="highlight">Category:</td>
											<td class="hidden-xs">
												<div class="form-group form-md-line-input has-success">
													<input type="text" class="form-control" placeholder="use typeahead">
												</div>
											</td>
										</tr>
										<tr>
											<td class="highlight">Required Skills:</td>
											<td class="hidden-xs">
												<input type="text" value="PHP, MCV Framework, Javascript, HTML" id="req_skills_tags" data-role="tagsinput">
											</td>
										</tr>
										<tr>
											<td class="highlight">Keywords:</td>
											<td class="hidden-xs">
												<input type="text" value="Laravel, MCV Framework" id="keywords_tags" data-role="tagsinput">
											</td>
										</tr>
										<tr>
											<td class="highlight">Min. Experience</td>
											<td class="hidden-xs">
												<div class="col-md-6 no-side-padding">
													<input id="exp_years" type="text" value="1" name="number_of_openings" class="form-control">
												</div>
												<div class="col-md-6 no-side-padding">
													<input id="exp_months" type="text" value="0" name="number_of_openings" class="form-control">
												</div>
											</td>
										</tr>
										<tr>
											<td class="highlight">Degree:</td>
											<td class="hidden-xs">
												<div class="form-group form-md-line-input has-success">
													<input type="text" class="form-control" placeholder="Select from the List">
												</div>
											</td>
										</tr>
										<tr>
											<td class="highlight">Certifications:</td>
											<td class="hidden-xs">
												<div class="form-group form-md-line-input has-success">
													<input type="text" class="form-control" placeholder="use typeahead">
												</div>
											</td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<h4><strong>Job Description</strong></h4>
						<div name="job_description" id="job_description"> </div>
					</div>

					<div class="tab-pane" id="tearsheet">
						<h4><strong>Tearsheet</strong></h4>
					</div>
					<div class="tab-pane" id="shortlist">
						<h4><strong>Shortlist</strong></h4>
					</div>
					<div class="tab-pane" id="submission">
						<h4><strong>Submission</strong></h4>
					</div>
					<div class="tab-pane" id="interview">
						<h4><strong>Interview</strong></h4>
					</div>
					<div class="tab-pane" id="placement">
						<h4><strong>Placement</strong></h4>
					</div>

					<div class="tab-pane" id="notes">
						<h4><strong>Notes</strong></h4>
					</div>

					<!-- ########################################### -->
					<!-- ######## NEW ORDER TAB ######### -->
					<!-- ########################################### -->

					<div class="tab-pane" id="newOrder">
							<div class="col-md-8 no-side-padding">
								<div class="form-group form-md-line-input has-success">
									<input type="text" class="form-control input-lg pad0" placeholder="Job Title">
									<div class="form-control-focus"> </div>
								</div>
							</div>
							<div class="col-md-4 no-side-padding text-align-reverse">
								<button type="button" btn-role='cancel-order' class="btn red btn-outline">Cancel <i class='fa fa-times'></i></button>
								<button type="button" btn-role='update-order' class="btn blue btn-outline">Save <i class='fa fa-floppy-o'></i></button>
							</div>
							<div class="row">
								<!-- ###################################### -->
								<!-- LEFT JOB DESCRIPTION INFORMATION PANEL -->
								<div class="col-md-6">
									<!-- BEGIN SAMPLE TABLE PORTLET-->
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight">Date Added:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<input class="form-control form-control-inline init-datepicker" id='ov_addDate_edit' name='ov_addDate_edit' size="" type="text" value="May 04, 2017"></div>
															<div class="form-control-focus"> </div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Required Date</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<input class="form-control form-control-inline init-datepicker" size="16" type="text" value="May 04, 2017"> </div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Salary:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																<div class="input-group">
																	<span class="input-group-addon">Rs.</span>
																	<input type="text" class="form-control">
																	<span class="help-block">Salary + Allowances</span>
																	<span class="input-group-addon">.00</span>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Location:</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-success">
																	<input type="text" id="location" name="location" class="twitter-typeahead form-control" style="position: relative; vertical-align: top; background-color: transparent;">
															</div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Client</td>
														<td class="hidden-xs">
															<div class="form-group form-md-line-input has-error">
																<div class="input-group">
																	<div class="input-group-control">
																		<input type="text" class="form-control" placeholder="Placeholder" value="Career Builders (Pvt) Ltd">
																	</div>
																	<span class="input-group-btn btn-right">
																		<button type="button" class="btn green-haze dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Client
																			<i class="fa fa-angle-down"></i>
																		</button>
																		<ul class="dropdown-menu pull-right" role="menu">
																			<li id="select_client_button">
																				<a href="#client_details" data-toggle="modal">Select Client..</a>
																			</li>
																			<li id="new_client_button">
																				<a href="#client_details" data-toggle="modal">New Client..</a>
																			</li>
																		</ul>
																	</span>
																</div>
															</div>
															<div class="modal" id="client_details" tabindex="-1" role="basic" aria-hidden="true" style="display: none;margin-top:100px;">
																<div class="modal-dialog modal-lg">
																		<div class="modal-content">
																				<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																						<h4 class="modal-title">Client Details</h4>
																				</div>
																				<div class="modal-body">
																					<div class="portlet light">
																							<div class="portlet-title tabbable-line">
																									<ul class="nav nav-tabs pull-left">
																											<li id="select_client_tab" class="">
																													<a href="#search_client" data-toggle="tab"> Select Client </a>
																											</li>
																											<li id="new_client_tab" class="">
																													<a href="#add_client" data-toggle="tab">New Client </a>
																											</li>
																									</ul>
																							</div>
																							<div class="portlet-body">
																									<div class="tab-content">
																											<div class="tab-pane" id="search_client">
																												<div class="form-group">
																													<input type="text" id="srch_client" name="search_client" class="twitter-typeahead form-control" style="position: relative; vertical-align: top; background-color: transparent;">
																												</div>
																												<div class="row">
																													<div class="col-lg-6">
																														<div class="" style="border-bottom:1px solid #3598DC;margin-bottom:20px;margin-top:20px;">
																															<h5 class="font-blue">Company Detailes</h5>
																														</div>
																															<form>
																																<div class="form-group">
																																	<label for="">Company Name:</label>
																																	<input type="text" class="form-control" id="company_name" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Address:</label>
																																	<textarea class="form-control" name="name" rows="3" id="company_address" style="resize:none;"></textarea>
																																</div>
																																<div class="form-group">
																																	<label for="">City:</label>
																																	<input type="text" class="form-control" id="company_city" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Contact No:</label>
																																	<input type="text" class="form-control" id="company_contact" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Email:</label>
																																	<input type="text" class="form-control" id="company_email" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Website:</label>
																																	<input type="text" class="form-control" id="company_web" name="" value="">
																																</div>
																															</form>
																													</div>
																													<div class="col-lg-6">
																														<div class="" style="border-bottom:1px solid #1BA39C;margin-bottom:20px;margin-top:20px;">
																															<h5 class="font-green-seagreen">Contact Person</h5>
																														</div>
																															<form>
																																<div class="form-group">
																																	<label for="">Name:</label>
																																	<input type="text" class="form-control" id="cperson_name" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Contact No:</label>
																																	<input type="text" class="form-control" id="cperson_contact" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Email:</label>
																																	<input type="text" class="form-control" id="cperson_email" name="" value="">
																																</div>
																															</form>
																													</div>
																												</div>
																												<button type="button" class="btn btn-primary" id="client_update">Update</button>
																												<button type="button" class="btn green">Select</button>
																											</div>
																											<div class="tab-pane" id="add_client">
																												<div class="row">
																													<!--<div class="col-lg-6">
																														<div class="" style="border-bottom:1px solid #3598DC;margin-bottom:20px;margin-top:20px;">
																															<h5 class="font-blue">Company Detailes</h5>
																														</div>
																															<form>
																																<div class="form-group">
																																	<label for="">Company Name:</label>
																																	<input type="text" class="form-control" id="company_name_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Address:</label>
																																	<textarea class="form-control" name="name" rows="3" id="company_address_add" style="resize:none;"></textarea>
																																</div>
																																<div class="form-group">
																																	<label for="">City:</label>
																																	<input type="text" class="form-control" id="company_city_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Contact No:</label>
																																	<input type="text" class="form-control" id="company_contact_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Email:</label>
																																	<input type="text" class="form-control" id="company_email_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Website:</label>
																																	<input type="text" class="form-control" id="company_web_add" name="" value="">
																																</div>
																															</form>
																													</div>-->
																													<div class="col-lg-6">
																														<div class="" style="border-bottom:1px solid #1BA39C;margin-bottom:20px;margin-top:20px;">
																															<h5 class="font-green-seagreen">Contact Person</h5>
																														</div>
																															<form method="post" action="{{asset('addnew')}}" id="newclient">
																																<div class="form-group">
																																	<label for="">Name:</label>
																																	<input type="text" class="form-control" id="cperson_name_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Contact No:</label>
																																	<input type="text" class="form-control" id="cperson_contact_add" name="" value="">
																																</div>
																																<div class="form-group">
																																	<label for="">Email:</label>
																																	<input type="text" class="form-control" id="cperson_email_add" name="" value="">
																																</div>
																															</form>
																													</div>
																												</div>
																													<button type="submit" class="btn btn-primary" id="client_save">Save</button>
																													<button type="button" class="btn green">Select</button>
																											</div>
																									</div>
																							</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																						<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
																				</div>
																		</div>
																</div>
														</div>
														</td>
													</tr>
													<tr>
														<td class="highlight">Client Contact:</td>
														<td class="hidden-xs">

															<div class="col-md-7 no-side-padding">
																<div class="form-group form-md-line-input has-success">
																	<input type="text" class="form-control" id="form_control_1" placeholder="Contact Name" value="Dharshana Ekanayake">
																	<div class="form-control-focus"> </div>
																</div>
															</div>
															<div class="col-md-5 no-side-padding">
																<div class="form-group form-md-line-input has-warning">
																	<input type="text" class="form-control" id="form_control_1" placeholder="Contact Number" value="077 3564911">
																	<div class="form-control-focus"> </div>
																</div>
															</div>

														</td>
													</tr>
													<tr>
														<td class="highlight">Open / Closed:</td>
														<td class="hidden-xs">
															<div class="md-radio-inline">
																<div class="md-radio">
																	<input type="radio" id="jobopen" name="jobstatus" class="md-radiobtn" checked="">
																	<label for="jobopen">
																		<span class="inc"></span>
																		<span class="check"></span>
																		<span class="box"></span> Open </label>
																</div>
																<div class="md-radio">
																	<input type="radio" id="jobclose" name="jobstatus" class="md-radiobtn">
																	<label for="jobclose">
																			<span class="inc"></span>
																			<span class="check"></span>
																			<span class="box"></span> Closed </label>
																</div>
															</div>


														</td>
													</tr>
													<tr>
														<td>Status: </td>
														<td>
															<select id="status" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																<option>Accepting Candidates</option>
																<option>Covered</option>
																<option>Offer Out</option>
																<option>Placed</option>
																<option>On Hold</option>
																<option>Lost > Competition</option>
																<option>Lost > Funding</option>
																<option>Lost > Filled</option>
																<option>Archieve</option>
															</select>
														</td>
													</tr>
													<tr>
														<td>Priority: </td>
														<td>
															<select id="priority" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																		<option>Hot</option>
																		<option>Warm</option>
																		<option>Cold</option>
															</select>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- ############################################# -->
								<!-- END OF LEFT JOB DESCRIPTION INFORMATION PANEL -->



								<!-- ############################################## -->
								<!-- END OF RIGHT JOB DESCRIPTION INFORMATION PANEL -->
								<div class="col-md-6">
									<div class="portlet-body">
										<div class="table-scrollable">
											<table class="table table-hover table-light">
												<tbody>
													<tr>
														<td class="highlight"># of Openings</td>
														<td class="hidden-xs">
															<input id="num_of_openings" type="text" name="number_of_openings" class="form-control"> </div>

										</td>
										</tr>
										<tr>
											<td class="highlight">Category:</td>
											<td class="hidden-xs">
													<select id="category" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
																<option>Accounting</option>
																<option>Sales</option>
																<option>Marketing &amp; Communication</option>
													</select>
											</td>
										</tr>
										<tr>
											<td class="highlight">Required Skills:</td>
											<td class="hidden-xs">
												<input type="text" id="req_skills_tags" data-role="tagsinput">
											</td>
										</tr>
										<tr>
											<td class="highlight">Keywords:</td>
											<td class="hidden-xs">
												<input type="text" id="keywords_tags" data-role="tagsinput">
											</td>
										</tr>
										<tr>
											<td class="highlight">Min. Experience</td>
											<td class="hidden-xs">
												<div class="col-md-6 no-side-padding">
													<input id="exp_years_add" type="text" name="number_of_openings" class="form-control">
												</div>
												<div class="col-md-6 no-side-padding">
													<input id="exp_months_add" type="text" name="number_of_openings" class="form-control">
												</div>
											</td>
										</tr>
										<tr>
											<td class="highlight">Degree:</td>
											<td class="hidden-xs">
												<select id="category" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
															<option>HND</option>
															<option>HNC</option>
												</select>
											</td>
										</tr>
										<tr>
											<td class="highlight">Certifications:</td>
											<td class="hidden-xs">
												<select id="category" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
															<option>Diploma</option>
															<option>Certificate</option>
												</select>
											</td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<h4><strong>Job Description</strong></h4>
						<div name="summernote_add" id="summernote_2"> </div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>
@endsection('body')

@section('plugins')
<script src="{{asset('plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/fuelux/js/spinner.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/typeahead/handlebars.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/ion.rangeslider/js/ion.rangeSlider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js')}}" type="text/javascript"></script>
@endsection('plugins')

@section('page-scripts')
<script src="{{asset('js/job-openings.min.js')}}"></script>
<script src="{{asset('js/new-order.js')}}" type="text/javascript"></script>
@endsection('page-scripts')
