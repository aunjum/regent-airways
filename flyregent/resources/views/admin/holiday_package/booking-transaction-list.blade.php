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
                            <div class="table-responsive">
                                <table id="pagesDatatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="9%">PNR</th>
                                        <th width="15%">Tran. ID</th>
                                        <th width="8%">Amount</th>
                                        <th width="9%">Card Type</th>
                                        <th width="10%">Card Issuer </th>
                                        <th width="8%">Card Issuer Country</th>
                                        <th width="15%">Bank Tran. Id</th>
                                        <th width="8%">Tran. Date</th>
                                        <th width="8%">Tran. Gateway Status</th>
                                        <th width="10%">Booking Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                        <td>{{$transaction->pnr_number}}</td>
                                        <td>{{$transaction->payment_transaction_id}}</td>
                                        <td>{{number_format($transaction->amount,'2','.',',')}}</td>
                                        <td>{{$transaction->card_type}}</td>
                                        <td>{{$transaction->card_issuer}}</td>
                                        <td>{{$transaction->card_issuer_country}}</td>
                                        <td>{{$transaction->bank_tran_id}}</td>
                                        <td>{{date('d/m/y h:i A',strtotime($transaction->transaction_date))}}</td>
                                        <td>{{$transaction->status}}</td>
                                        <td>
                                            <span class="badge badge-info">{{Helper::$holidayBookingStatus[$transaction->bstatus]}}</span>
                                            @if($transaction->bstatus == 3)
                                                <div class="btn-group">
                                                    <a  class="btn btn-success" target="_blank" title="Payment Confirm" href="{{URL::route('admin.holiday-package_booking.update',[$transaction->booking_request_id, 5])}}"><i class="fa fa-check-circle"></i></a>
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
@stop