<?php $nav_pos = '_candidates'; ?>
@extends('layouts.base',['title'=>'CB ATS - Candidates'])
@section('styles')
<link href="{{asset('plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection('styles')
@section('head')
@endsection('head')

@section('body')
<h1 class="page-title"> Candidates </h1>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="{{asset('dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <span>Candidates</span>
    </li>
  </ul>
</div>
<!-- END PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit">
      <div class="portlet-body">
        <div class="tabbable-line boxless margin-bottom-20">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#job-list" data-toggle="tab">List</a></li>
            <li><a href="#candidate-info" data-toggle="tab"> Candidate Info </a></li>
          </ul>
          <div class="tab-content">

            <!-- ##################################### -->
            <!-- ############ Job List TAB ########### -->
            <!-- ##################################### -->
            <div class="tab-pane active" id="job-list">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-6">
                    <div class="btn-group">
                      <button id="sample_editable_1_new" class="btn red" data-toggle="modal" href="#basic"><i class="fa fa-search"></i> Search Candidates
                      </button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="btn-group pull-right">
                      <button class="btn green dropdown-toggle" data-toggle="dropdown">List Actions
                        <i class="fa fa-angle-down"></i>
                      </button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:;"> Add to a Tearsheet </a></li>
                        <li><a href="javascript:;"> Shortlist to.. </a></li>
                        <li><a href="javascript:;"> Export to Excel </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                  <tr>
                    <th>
                      <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                        <span></span>
                      </label>
                    </th>
                    <th> Name </th>
                    <th> Title </th>
                    <th> Last Note </th>
                    <th> Source </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd gradeX">
                    <td>
                      <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="checkboxes" value="1" />
                        <span></span>
                      </label>
                    </td>
                    <td>
                      Danielle Hicks
                    </td>
                    <td>
                      Marketing Manager
                    </td>
                    <td class="center"> 12 Jan 2012 </td>
                    <td>
                      JobVacancies.lk
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ##################################### -->
            <!-- ######## candidate-info ######## -->
            <!-- ##################################### -->
            <div class="tab-pane" id="candidate-info">
              <div class="col-md-7">
                <h4><strong>1025 : PHP Developer </strong></h4>
                <h5>Career Builders (Pvt) Ltd</h5>
              </div>
              <div class="col-md-5 small text-right">
                Shortlisted: <span class="badge badge-success"> &nbsp;2&nbsp; </span>
                <span class="font-default"> &nbsp;|&nbsp; </span> Submitted: <span class="badge badge-info"> &nbsp;1&nbsp; </span>
                <span class="font-default"> &nbsp;|&nbsp; </span> Interview: <span class="badge badge-primary"> &nbsp;1&nbsp; </span>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="portlet-body">
                    <div class="table-scrollable">
                      <table class="table table-hover table-light">
                        <tbody>
                          <tr>
                            <td class="highlight">Date Added:</td>
                            <td class="hidden-xs"> 01/01/2017 </td>

                          </tr>
                          <tr>
                            <td class="highlight">Scheduled End:</td>
                            <td class="hidden-xs"> 15/01/2017 </td>
                          </tr>
                          <tr>
                            <td class="highlight">Client:</td>
                            <td class="hidden-xs"> Career Builders (Pvt) Ltd </td>
                          </tr>
                          <tr>
                            <td class="highlight">Client Contact:</td>
                            <td class="hidden-xs"> Dharshana Ekanayake [077 3564911] </td>
                          </tr>
                          <tr>
                            <td class="highlight">Open / Closed:</td>
                            <td class="hidden-xs"> Open </td>
                          </tr>
                          <tr>
                            <td class="highlight">Status:</td>
                            <td class="hidden-xs"> Accepting Candidates </td>
                          </tr>
                          <tr>
                            <td class="highlight">Priority:</td>
                            <td class="hidden-xs"> Hot </td>
                          </tr>
                          <tr>
                            <td class="highlight">Owner:</td>
                            <td class="hidden-xs">Dharshana Ekanayake </td>
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
                            <td class="hidden-xs"> Rs. 75,000.00 </td>
                          </tr>
                          <tr>
                            <td class="highlight">Location:</td>
                            <td class="hidden-xs"> Colombo </td>
                          </tr>
                          <tr>
                            <td class="highlight"># of Openings:</td>
                            <td class="hidden-xs">1</td>
                          </tr>
                          <tr>
                            <td class="highlight">Category:</td>
                            <td class="hidden-xs"> Information &amp; Communication Technology </td>
                          </tr>
                          <tr>
                            <td class="highlight">Required Skills:</td>
                            <td class="hidden-xs"> PHP, MCV Framework, Javascript, HTML </td>
                          </tr>
                          <tr>
                            <td class="highlight">Additional Keywords:</td>
                            <td class="hidden-xs"> Laravel, MCV Framework </td>
                          </tr>
                          <tr>
                            <td class="highlight">Min. Experience:</td>
                            <td class="hidden-xs"> 2 Years </td>
                          </tr>
                          <tr>
                            <td class="highlight">Degree Requirements:</td>
                            <td class="hidden-xs"> Bachlors or Higher </td>
                          </tr>
                          <tr>
                            <td class="highlight">Certification Requirements:</td>
                            <td class="hidden-xs"> N/A </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <h4><strong>Job Description</strong></h4>
              <div class="m-heading-1 border-green m-bordered">
                <p> A PHP Developer writes beautiful, fast PHP to a high standard, in a timely and scalable way that improves the code-base of our products in meaningful ways.
                  <br>You will be a part of a full-stack creative team that is responsible for all aspects of the ongoing software development from the initial specification, through to developing, testing and launching.</p><br>
                <ul>
                  <li>Understanding of open source projects like Joomla, Drupal, Wikis, osCommerce, etc</li>
                  <li>Demonstrable knowledge of web technologies including HTML, CSS, Javascript, AJAX etc</li>
                  <li>Good knowledge of relational databases, version control tools and of developing web services</li>
                  <li>Passion for best design and coding practices and a desire to develop new bold ideas</li>
                </ul>
              </div>
            </div>

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
<script src="{{asset('plugins/ion.rangeslider/js/ion.rangeSlider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/typeahead/handlebars.min.js')}}" type="text/javascript"></script>
@endsection('plugins')

@section('page-scripts')

@endsection('page-scripts')
