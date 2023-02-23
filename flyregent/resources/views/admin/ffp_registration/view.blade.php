@extends('admin.layout.master-layout')
@section('content')
<style>
    .form-group .col-md-4{
        margin-top: 7px;
    }

</style>
<div class="container-fluid" id="pcont">
    <div class="cl-mcont">
        <div class="row">
            <div class="col-md-12">
                <div class="block-flat">
                    <div class="header">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="content">
                        <form action="#" enctype="multipart/form-data" method="POST" class="form-horizontal group-border-dashed">


                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Email</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->email; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Contact No</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->contact; ?>
                                </div>
                            </div>

                        
                            <h4>Passenger Details:</h4>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">First Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->first_name; ?> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Middle Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->middle_name; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Sur Name</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->sure_name; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Gender</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->gender; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Date of Birth</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->date_of_birth; ?>
                                </div>
                            </div>


                            <h4>Passport Details</h4>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Document Type</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->document_type; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Document Number</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->document_number; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Issuing Country</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->issuing_country; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Expired Date</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->expire_date; ?>
                                </div>
                            </div>


                            <h4>Others</h4>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">City of Residence</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->residence_city; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">State of Residence</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->residence_state; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Country of Resident</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->resident_country; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label pull-left">Nationality</label>
                                <div class="col-md-4">
                                    <?php echo $data_row[0]->nationality; ?>
                                </div>
                            </div>
                            

                            {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop