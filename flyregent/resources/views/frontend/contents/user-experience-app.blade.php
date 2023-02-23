@extends('frontend.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')
<style>
    header, .modal-footer-custom, .right_fixed_links, .right_fixed_links_mobile{
        display: none;
    }
</style>
<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">

            
            <div class="intro-inner-wrapper container">

                
                <div class="tab_container">
                    @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                    @endif

                    <form class="form-horizontal ffp-form" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/app-experience-submit">


                        <h5>Passenger Details:</h5>
                        <br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">First Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Middle Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sur Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sure_name" placeholder="Sure Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender<span class="required">*</span></label>
                            <div class="col-sm-4">
                                                                    <select class="form-control" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date of Birth<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="date_of_birth" placeholder="Date of Barth [DD-MM-YYYY]" required>
                            </div>
                        </div>

                        <h5>Passport Details:</h5>
                        <br/>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Document Type<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="document_type" placeholder="Document Type" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Document Number<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="document_number" placeholder="Document Number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Issuing Country<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="issuing_country" placeholder="Issuing Country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Expired date<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="expire_date" placeholder="Expired date [DD-MM-YYYY]" required>
                            </div>
                        </div>
                        
                        <h5>Others:</h5>
                        <br/>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">City of Residence <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="residence_city" placeholder="Residence City" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">State of Residence <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="residence_state" placeholder="Residence State" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Country of Resident <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="resident_country" placeholder="Resident Country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Nationality<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nationality" placeholder="Nationality" required>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>

 

            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop