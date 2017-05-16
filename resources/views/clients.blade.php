<?php $nav_pos='_clients' ?>
@extends('layouts.base',['title'=>'CB ATS - Clients'])
@section('styles')
<link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection('styles')
@section('head') @endsection('head')
@section('body')
<h1 class="page-title">Clients</h1>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li><i class="icon-home"></i><a href="{{asset('dashboard')}}"> Home</a><i class="fa fa-angle-right"></i></li>
    <li><span>Clients</span></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit">
      <div class="portlet-body">
        <div class="tabbable-line boxless margin-bottom-20">
          <ul class="nav nav-tabs" role='tab-options' section='clients'>
            <li class="active"><a href="#clients_list" data-toggle="tab">Clients List</a></li>
            <li><a href="#client_details" data-toggle="tab" disabled='disabled'> Clients Details </a></li>
            <li><a href="#new_client" data-toggle="tab"> <span class="text-primary"> <strong>New Client</strong></span></a></li>
          </ul>
          <div class="tab-content">
            <!-- ##################################### -->
            <!-- ############ Clients list ########### -->
            <!-- ##################################### -->
            <div class="tab-pane active" id="clients_list">
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
              <div class="portlet box">
                <div class="portlet-body">
                  <table class="table table-striped table-hover table-bordered" id="clients_grid">
                    <thead>
                      <tr>
                        <th> Client# </th>
                        <th> Company Name </th>
                        <th> Address </th>
                        <th> Contact Person </th>
                        <th> View </th>
                      </tr>
                    </thead>
                    <tbody resp='clients-list'>
                      <?php $i = 1; ?>
                      @foreach($data['clist'] as $company)
                      <tr class="odd gradeX">
                        <td>
                          <?php echo $i<10 ? '0'.$i : $i; ?>
                          </td>
                          <td><a name='client-name' hrefurl="#client_details" data-clientID='{{$company->Company_ID}}' data-resp="tab">{{$company->Company_Name}}</a></td>
                          <td>{{$company->Address}}</td>
                          <td class="center"> {{$company->Contact_Person}} </td>
                          <td>
                            <a class="edit" hrefurl="#client_details" data-clientID='{{$company->Company_ID}}' data-resp="tab"> View / Edit </a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="client_details">
                <div class='row'>
                  <div class="col-md-7">
                    <h4><strong id="cmp_nameh"></strong></h4>
                    <h5 id="cmp_addrh"></h5>
                  </div>
                  <div class="col-md-5">
                    <div class="row">
                      <div class="col-xs-12 pull-right text-right form-group">
                        <button class="btn blue btn-outline" btn-role="edit-client" hrefurl="#edit-client">
                          EDIT CLIENT
                          <i class="fa fa-pencil"></i>
                        </button>
                      </div>
                      <div class="col-xs-12 small text-right">
                        Open Jobs:
                        <span id="#" class="badge badge-success">0</span>
                        <span class="font-default">  |  </span>
                        Completed Jobs:
                        <span id="#" class="badge badge-info">0</span>
                        <span class="font-default">  |  </span>
                        Closed Jobs:
                        <span id="#" class="badge badge-primary">0</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='row'>
                  <div class='col-md-6'>
                    <div class="portlet-body">
                      <div class="table-scrollable">
                        <table class="table table-hover table-light">
                          <tbody>
                            <tr>
                              <td class="highlight">Company Name :</td>
                              <td id="cmp_name"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Address :</td>
                              <td id="cmp_addr"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Location:</td>
                              <td id="cmp_location"></td>
                            </tr>
                            <tr>
                              <td class="highlight">District:</td>
                              <td id="cmp_district"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Industry:</td>
                              <td id="cmp_industry"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Contact No:</td>
                              <td id="cmp_contact"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Fax:</td>
                              <td id="cmp_fax"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Email:</td>
                              <td id="cmp_email"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Website:</td>
                              <td id="cmp_website"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class='col-md-6'>
                    <div class="portlet-body">
                      <div class="table-scrollable">
                        <table class="table table-hover table-light">
                          <tbody>
                            <tr>
                              <td class="highlight">Contact Person :</td>
                              <td id="cmp_contperson"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Contact No :</td>
                              <td id="cmp_cpcont"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Email :</td>
                              <td id="cmp_cpemail"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Description :</td>
                              <td>
                                <span id="cmp_desc"></span>
                              </td>
                            </tr>
                            <tr>
                              <td class="highlight">Date Registered :</td>
                              <td id="cmp_regdate"></td>
                            </tr>
                            <tr>
                              <td class="highlight">Added / Updated by :</td>
                              <td id="cmp_addedperson"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane" id="new_client">
                new client goes here
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    @endsection('body')
    @section('plugins')
    <script src="{{asset('js/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    @endsection('plugins')
    @section('page-scripts')
    <script src='{{asset("js/clients.min.js")}}'></script>
    @endsection('page-scripts')
