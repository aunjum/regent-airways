@extends('frontend.layout.master-layout')

@section('content')
    <section id="intro-wrapper main_oveflow_hdn" class="booking-lst-stp">
        <div class="container">
            <div class="row" style="margin-top: 50px;">
              <div class="alert alert-{{$messageType}}">
                  <h4>{{$message}}</h4>
              </div>
            </div>
        </div>
    </section>
@stop
