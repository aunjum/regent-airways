@extends('frontend.bn.layout.display-layout')
@section('content')

<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">
                <div class="contents">

                    <div class="content-fade" >

                        <div class="contents">
                            
                            <?php
                            $message = Session::get('message');
                            ?>
                            
                        @if (isset($message))
                        <div class="alert alert-danger alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <div class="icon"><i class="fa fa-check"></i></div>
                            <strong>Error!</strong> {{ $message }}!
                        </div>
                        @endif

                    
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/display/login">

                        
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">User ID<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="user_name" placeholder="User ID" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>

                    </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop