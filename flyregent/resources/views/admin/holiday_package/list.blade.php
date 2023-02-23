@extends('admin.layout.master-layout')

@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <a class="btn btn-success pull-right" href="{{URL::route('admin.holiday-package.create')}}">Add New</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Place</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Order</th>
                                        <th>Hotels</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($holiday_packages as $key => $holiday_package)
                                        <tr>
                                            <td width="10%">{{$holiday_package->country}}</td>
                                            <td width="10%">{{$holiday_package->place}}</td>
                                            <td width="12%">{{$holiday_package->title}}</td>
                                            <td width="8%">
                                              @if(strlen($holiday_package->image))  <img src="{{asset('public/upload/blog/'.$holiday_package->image)}}" width="100" height="80" class="img-thumbnail" alt="">@endif
                                            </td>
                                            <td width="5%">{{$holiday_package->order}}</td>
                                            <td width="45%">
                                                <div class="hotels">

                                                    <div class="panel-group" id="hotel_accordion" role="tablist" aria-multiselectable="true">
                                                        @foreach($holiday_package->details as $key2 => $details)
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading" role="tab" id="heading_{{$key.$key2}}">
                                                                <h4 class="panel-title">
                                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$key.$key2}}" aria-expanded="false" aria-controls="collapse_{{$key}}">
                                                                        {{$details->hotel}}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse_{{$key.$key2}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$key.$key2}}">
                                                                <div class="panel-body">
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                        <th>Package Type</th>
                                                                        <th>Adult</th>
                                                                        <th>Child</th>
                                                                        <th>Infant</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @php
                                                                          $packages = json_decode($details->packages)
                                                                        @endphp

                                                                        @foreach($packages as $package)
                                                                         <tr>
                                                                             <td>{{$package->type}}</td>
                                                                             <td>{{$package->adult}}</td>
                                                                             <td>{{$package->child}}</td>
                                                                             <td>{{$package->infant}}</td>
                                                                         </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    </div>



                                            </td>
                                            <td width="8%" class="center">
                                                <div class="btn-group">
                                                    <a href="{{URL::route('admin.holiday-package.edit', $holiday_package->id)}}" title='Edit' class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <div class="btn-group">
                                                    <form  class="myAction" method="POST" action="{{URL::route('admin.holiday-package.destroy', $holiday_package->id)}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extraScript')
    <script type='text/javascript' src="{{asset('public/js/holiday-package.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            HolidayPackage.activeHotelAccordion();
        });
    </script>

@stop