@extends('frontend.bn.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/layout/content-slider')

<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">

                <div class="tab_container min_height">

                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/submit">
                        <input type="hidden" name="job_id" value="{{$career_data[0]->id}}">
                        
                        <div class="title"><b>Applied for the post: {{$career_data[0]->title}}</b></div>
                        <br/>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">First Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Last Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone" placeholder="Contact No">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Keywords</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="keywords" placeholder="Keywords">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Notes</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="notes" placeholder="Notes"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Resume</label>
                            <div class="col-sm-4">
                                <div class="required">Only doc, docx, and pdf file supported</div>
                                <input name="resume" id="userfile" type="file">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Apply</button>
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