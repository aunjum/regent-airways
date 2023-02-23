@extends('admin.layout.master-layout')
@section('content')

    <div class="container-fluid" id="pcont">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-flat">
                        <div class="header">
                            <h3>{{ $title }}</h3>
                        </div>
                        <div class="content">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <form action=" @if($package) {{URL::route('admin.holiday-package.update', $package->id)}} @else {{URL::route('admin.holiday-package.store')}} @endif" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">
                                {{ csrf_field() }}

                                @if($package) {{ method_field('patch') }} @endif

                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Country<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="country" required minlength="2" maxlength="255" value="@if($package){{$package->country}}@endif">
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Place<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="place" required minlength="2" maxlength="255" value="@if($package){{$package->place}}@endif">
                                        <span class="text-danger">{{ $errors->first('place') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Title<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="title" required minlength="2" maxlength="255" value="@if($package){{$package->title}}@endif">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label  class="col-md-2 control-label pull-left" for="image">Image<span class="text-danger">@if(!$package)*@endif[max 2MB]</span></label>
                                    <div class="col-md-4">
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="image" placeholder="image" @if(!$package) required @endif>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Order<span class="text-danger">[1,2.3]</span></label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="number" name="order" value="@if($package){{$package->order}}@else{{0}}@endif">
                                        <span class="text-danger">{{ $errors->first('order') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left">Description</label>
                                    <div class="col-md-9">
                                        <textarea class="ckeditor form-control" name="description">@if($package){{$package->description}}@endif</textarea>
                                    </div>
                                </div>

                                {{--dynamic conetent area start--}}
                                <div class="form-group">
                                    <h4 class="title bold">Hotels & Packages</h4>
                                    {{--error message shows here--}}
                                    <span class="text-danger">{{ $errors->first('hotel') }}</span>
                                    <div id="hotel_and_packages">
                                        @if($package)
                                            @foreach($package->details as $key => $detail)
                                                <div class="holiday_package">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="col-md-2 control-label pull-left">Hotel<span class="text-danger">*</span></label>
                                                            <div class="col-md-4">
                                                                <input class="form-control" type="text" name="hotel[]" required minlength="2" maxlength="255" value="{{$detail->hotel}}">
                                                            </div>
                                                            @if(!$loop->first)
                                                                <div class="col-md-6">
                                                                    <button type="button" title="Remove Hotel" class="btn btn-danger btn-sm pull-right btnRemoveHotel"><i class="fa fa-trash-o"></i></button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row packages">
                                                        <div class="col-md-12">
                                                            <div class="packages">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="text-center bold">Package Type*</th>
                                                                        <th class="text-center bold">Adult*</th>
                                                                        <th class="text-center bold">Child</th>
                                                                        <th class="text-center bold">Infant</th>
                                                                        <th class="text-center bold">Bookable?</th>
                                                                        <th class="text-center bold" width="5%">
                                                                            <button type="button" title="add package" class="btn btn-primary btn-sm btnAddPackage"><i class="fa fa-plus-circle"></i></button>

                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody data-index="{{$loop->iteration}}">
                                                                    @foreach(json_decode($detail->packages) as $key2 => $hotel_package)
                                                                    <tr>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="package_{{$loop->parent->iteration}}[]" required value="{{$hotel_package->type}}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="adult_{{$loop->parent->iteration}}[]" required value="{{$hotel_package->adult}}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="child_{{$loop->parent->iteration}}[]" value="{{$hotel_package->child}}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="infant_{{$loop->parent->iteration}}[]" value="{{$hotel_package->infant}}">
                                                                        </td>
                                                                        <td class="bookable">
                                                                            <input @if($hotel_package->bookable)checked @endif type="checkbox" name="bookable_{{$loop->parent->iteration}}[]">
                                                                        </td>
                                                                        <td>
                                                                            @if(!$loop->first)
                                                                                <button type="button" title="remove package" class="btn btn-danger btn-sm btnRemovePackage"><i class="fa fa-trash-o"></i></button>
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
                                            @endforeach
                                        @else
                                        <div class="holiday_package">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="col-md-2 control-label pull-left">Hotel<span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input class="form-control" type="text" name="hotel[]" required minlength="2" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row packages">
                                                <div class="col-md-12">
                                                    <div class="packages">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center bold">Package Type*</th>
                                                                <th class="text-center bold">Adult*</th>
                                                                <th class="text-center bold">Child</th>
                                                                <th class="text-center bold">Infant</th>
                                                                <th class="text-center bold">Bookable?</th>
                                                                <th class="text-center bold" width="5%">
                                                                    <button type="button" title="add package" class="btn btn-primary btn-sm btnAddPackage"><i class="fa fa-plus-circle"></i></button>

                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody data-index="1">
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" type="text" name="package_1[]" required>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" name="adult_1[]" required>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" name="child_1[]">
                                                                </td>

                                                                <td>
                                                                    <input class="form-control" type="number" name="infant_1[]">
                                                                </td>
                                                                <td class="bookable">
                                                                    <input checked type="checkbox" name="bookable_1[]">
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <br>
                                    <button id="btnAddHotel" type="button" class="btn btn-primary pull-left"><i class="fa fa-plus-circle"></i> Add Hotel</button>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label pull-left"></label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{URL::route('admin.holiday-package.index')}}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </form>
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
            HolidayPackage.init();
        });
    </script>

@stop