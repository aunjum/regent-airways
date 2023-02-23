@extends('admin.layout.master-layout')
@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                                @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif

                            <div class="table-responsive">

                                <table class="table table-bordered"  id="pagesDatatable">
                                    <thead>
                                    <tr>
                                        <td>Request At</td>
                                        <td>Contact</td>
                                        <td>Place</td>
                                        <td>Hotel</td>
                                        <td>Check In & Out</td>
                                        <td>Packages</td>
                                        <td>Adult</td>
                                        <td>Child</td>
                                        <td>Infant</td>
                                        <td>Total</td>
                                        <td>Status</td>
                                        <td width="10%">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $data)
                                        <tr>


                                            <td>{{date('d/m/y h:i A',strtotime($data->created_at))}}</td>
                                            <td>{{$data->email}}<br>{{$data->mobile}}</td>
                                            <td>{{$data->place}}</td>
                                            <td>{{$data->hotel_name}}</td>
                                            <td>{{$data->check_in}} <br> {{$data->check_out}}</td>
                                            <td>{{$data->package_type}}</td>
                                            <td>{{$data->adult_total_price}}</td>
                                            <td>{{$data->child_total_price}}</td>
                                            <td>{{$data->infant_total_price}}</td>
                                            <td>{{$data->grand_total_price}}</td>
                                            <td>
                                                <span class="badge badge-info">{{Helper::$holidayBookingStatus[$data->status]}}</span>
                                            </td>

                                            <td width="10%" class="text-center">
                                                 @if($data->status == 1)
                                                    <div class="btn-group">
                                                        <a  class="btn btn-danger" title="Cancel" href="{{URL::route('admin.holiday-package_booking.update',[$data->id, 0])}}" ><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a  class="btn btn-success btnApprove" title="Approve and Send Email" href="#" data-url="{{URL::route('admin.holiday-package_booking.update',[$data->id, 2])}}"><i class="fa fa-check"></i></a>
                                                    </div>
                                                 @elseif($data->status == 2)
                                                    <div class="btn-group">
                                                        <a  class="btn btn-danger" title="Reject" href="{{URL::route('admin.holiday-package_booking.update',[$data->id, 4])}}" ><i class="fa fa-times"></i></a>
                                                    </div>
                                                @elseif($data->status == 3)
                                                    <div class="btn-group">
                                                        <a  class="btn btn-danger" title="Reject" href="{{URL::route('admin.holiday-package_booking.update',[$data->id, 4])}}" ><i class="fa fa-times"></i></a>
                                                    </div>

                                                 @endif

                                                     @if($data->status != 0)
                                                         <div class="btn-group">
                                                             <a  class="btn btn-success btnDetails" title="Passenger Details" href="#" data-url="{{URL::route('admin.holiday-package_booking.details',$data->id)}}"><i class="fa fa-file-text"></i></a>
                                                         </div>
                                                    @endif
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
        <!-- Modal -->
        <div class="modal fade" id="approveModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter PNR for this booking request</h4>
                    </div>
                    <form id="approveForm" action="" method="get" enctype="multipart/form-data">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="pnr_number">PNR<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="pnr_number" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    <!-- / Pnr modal end -->
     <!-- Modal Details start-->
        <div class="modal fade" id="detailsModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Passengers Details</h4>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-info bold">Adult Passengers:</h5>
                        <table id="adultsTable" class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                    <th>County</th>
                                    <th>Passport</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <h5 class="text-info bold">Child Passengers:</h5>
                        <table id="childsTable" class="table table-responsive table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth Date</th>
                                <th>Gender</th>
                                <th>County</th>
                                <th>Passport</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <h5 class="text-info bold">Infant Passengers:</h5>
                        <table id="infantsTable" class="table table-responsive table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth Date</th>
                                <th>Gender</th>
                                <th>County</th>
                                <th>Passport</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <h5 class="text-info bold">Documents:</h5>
                        <div class="documentList">

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    <!-- / Details modal end -->


@stop

@section('extraScript')
    <script>
        var addRowInPassengerTable = function(element, data){
            $.each(data, function (index,item) {
                var rowHtml = '<tr>\n' +
                    '<td>'+item.first_name+'</td>\n' +
                    '<td>'+item.last_name+'</td>\n' +
                    '<td>'+item.birth_date+'</td>\n' +
                    '<td>'+item.gender+'</td>\n' +
                    '<td>'+item.country+'</td>\n' +
                    '<td>'+item.passport+'</td>\n' +
                    '</tr>';

                $('#'+element+' tbody').append(rowHtml);
            });
        };
        $(document).ready(function() {
            $('.btnApprove').click(function () {
                var url = $(this).attr('data-url');
                $('#approveForm').attr('action', url);
                $('#approveModal').modal('show');
            });

            $('.btnDetails').click(function () {
                var url = $(this).attr('data-url');
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        if(typeof res.details != "undefined") {
                            if(res.details.adults.length){
                                $('#adultsTable tbody').empty();
                                addRowInPassengerTable('adultsTable', res.details.adults);
                            }

                            if (res.details.childs.length) {
                                $('#childsTable tbody').empty();
                                addRowInPassengerTable('childsTable', res.details.childs);
                            }

                            if (res.details.infants.length) {
                                $('#infantsTable tbody').empty();
                                addRowInPassengerTable('infantsTable', res.details.infants);
                            }


                            $('.documentList').empty();
                                res.details.documents.forEach(function (item) {
                                    var link = '<a class="link" style="display: inline-block;margin-left: 10px;" href="/public/upload/booking-docs/'+item+'" target="_blank">Download</a>';
                                    $('.documentList').append(link);
                                });



                            $('#detailsModal').modal('show');
                        }
                        else {
                            alert(res.message);
                        }
                    },
                    error: function (res) {
                        alert(res.statusText);
                    }
                });

            });

        });
    </script>

@stop