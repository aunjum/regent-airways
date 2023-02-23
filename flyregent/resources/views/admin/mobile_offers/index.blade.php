@extends('admin.layout.master-layout')

@section('content')
    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3 class="pull-left">{{ $title }}</h3>
                            <a class="btn btn-success pull-right" href="{{URL::route('admin.mobile.offer_create')}}">Add New</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content">
                            @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="pagesDatatable" >
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        <tr>
                                            <td>{{$offer->title}}</td>
                                            <td>{{$offer->subtitle}}</td>
                                            <td>
                                                <img src="{{Helper::getImageBaseUrl()}}/public/upload/blog/{{$offer->image}}" alt="" />

                                            </td>
                                            <td>{{$offer->created_at->format('d/m/Y H:i:s a')}}</td>
                                            <td>{{$offer->order}}</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <form  class="myAction" method="POST" action="{{URL::route('admin.mobile.offer_delete', $offer->id)}}">
                                                        {{ csrf_field() }}
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