<div id="pageLoad">
@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<form action="" method="post" role="form">
 {{csrf_field()}}
<div class = "col-xs-12 whole-page">
@if ( Request::get('country') == "United States")
@foreach ($featuredimage_internship_us as $featured)
    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "dynamic-text-container">
            <div class ="col-md-5 col-xs-12 dynamic-text-container-box">
                <h4> {{$featured->main_image_description_header}}  </h4>
                <div class = "col-xs-12 p-title">
                    <H1>  {{$featured->main_image_description}}  </H1>
                </div>
                <div class = "col-xs-12 p-head">
                    <p>{{$featured->main_image_description_footer}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@else
@foreach ($featuredimage_internship_aus as $featured)

    <img src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featured->main_image}}" class="img img-responsive img-rounded header" alt="Company Banner">
    <img src="{{ URL::asset('image/Arrow.png')}}" class="img img-border" alt="Company Banner">
    <img src="{{ URL::asset('image/img-line.png')}}" class="img img-responsive img-line" alt="Company Banner">
    <div class = "text-inside-header-picture">
        <div class = "dynamic-text-container">
            <div class ="col-md-5 col-xs-12 dynamic-text-container-box">
                <h4> {{$featured->main_image_description_header}}  </h4>
                <div class = "col-xs-12 p-title">
                    <H1>  {{$featured->main_image_description}}  </H1>
                </div>
                <div class = "col-xs-12 p-head">
                    <p>{{$featured->main_image_description_footer}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif
        <div class = "hidden-xs hidden-sm col-md-3 col-md-offset-9 sticky">
          <div class = "col-xs-6">
            <p> Start an <strong> amazing </strong> future with us</p>
          </div>
          <div class = "col-xs-6 button-apply-sticky">
            <a href = "/application" class = "btn applynow-sticky">Apply Now</a>
          </div>
        </div>
    
    <div class = " row">
        <div class = "col-md-12 col-xs-12 Top-header-message text-center">
            <h1>Your Destination</h1>
            <div class = "col-xs-12 col-md-4 col-md-offset-4">
                <p> Our Internship/Trainee Programs prepare students for life and work outside of school. Participants get to work in world-class facilities in the US and in other locations across the globe. </p>
            </div>
        </div>
    </div>
    <div class = "body-content" id= "body-content">
        <div class = "row hidden-xs hidden-sm filter-top">
            <div class = "hidden-xs hidden-sm col-md-10 filter-main">
                <div class = "col-xs-12">
                    <div class="dropdown">
                        <a class="dropbtn-filter"><strong>Country </strong><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <div class="dropdown-content-filler">
                          <div id="links">
                              <a href="/internshipcompany">All</a>
                              <a href="/internshipcompany?country=United States">United States</a>
                              <a href="/internshipcompany?country=Australia">Australia</a>
                          </div>
                        </div>
                    </div>
                      <div class="dropdown">
                        <a class="dropbtn-filter"><strong>State </strong><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <div class="dropdown-content-filler">
                          <div id="links">
                          <a href="/internshipcompany">All</a>
                            @if ( Request::get('state')  )
                                @foreach ($internship_filter as $filter)
                                    <a href="/internshipcompany?state={{$filter->state}}">{{$filter->state}}</a>
                                @endforeach
                            @else
                                @foreach ($internshipCompany_table as $company)
                                    <a href="/internshipcompany?state={{$company->state}}">{{$company->state}}</a>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                  <div class="dropdown">
                      <a class="dropbtn-filter"><strong>Industry </strong><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <div class="dropdown-content-filler">
                        @if ( Request::get('state')  )
                            @foreach ($internship_filter as $filter)
                                @foreach ($filter->internship_industry as $industry)
                                    <a href="/internshipcompany?industry={{$industry->industry_name}}">{{$industry->industry_name}}</a>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($internshipCompany_table as $company)
                                @foreach ($company->internship_industry as $industry)
                                    <a href="/internshipcompany?industry={{$industry->industry_name}}">{{$industry->industry_name}}</a>
                                @endforeach
                            @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="dropdown">
                      <a class="dropbtn-filter"><strong>Start Dates </strong><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <div class="dropdown-content-filler">
                         @if ( Request::get('state')  )
                            @foreach ($internship_filter as $filter)
                                @foreach ($filter->internship_duration as $duration)
                                    <a href="/internshipcompany?duration={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</a>
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($internshipCompany_table as $company)
                                 @foreach ($company->internship_duration as $duration)
                                    <a href="/internshipcompany?duration={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</a>
                                @endforeach
                            @endforeach
                        @endif
                      </div>
                    </div>
                </div>
            </div>
            <div class = "col-lg-2 col-md-2 col-sm-2 col-xs-4 filter-result">
                @for ($i = 0; $i < count($internshipCompany_table)+1; $i++)
                    @if ($i == count($internshipCompany_table))
                        <p>Total Results: <strong> {{ $i }} </strong></p>
                    @endif
                @endfor
            </div>
        </div>
    </div>


<!--------------------HIDDEN DIV ---------------------------->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
  </div>





<!----------------------------------------END OF HIDDEN DIV -------------------------------------->

<!--mobile filter -->
<div class = "col-xs-12 hidden-md hidden-lg hidden-xl">
    <div class = "row ">
        <div class = "col-xs-6 form-group">
            <select class = "form-control" name="current_city" id="dynamic_select">
            <option value="" disabled selected>Select</option>
                @if ( Request::get('state')  )
                    @foreach ($internship_filter as $filter)
                       <option value ="internshipcompany?state={{$filter->state}}">{{$filter->state}}</option>
                    @endforeach
                @else
                    @foreach ($internshipCompany_table as $company)
                        <option value ="internshipcompany?state={{$company->state}}">{{$company->state}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class = "col-xs-6 form-group">
            <select class = "form-control" name="internship_industry" id="">
                <option value="" disabled selected>Select</option>
                @if ( Request::get('state')  )
                     @foreach ($internship_filter as $filter)
                        @foreach ($filter->internship_duration as $duration)
                        <option value ="internshipcompany?state={$industry->industry_name}}">{{$industry->industry_name}}</option>
                        @endforeach
                    @endforeach
                @else
                    @foreach ($internshipCompany_table as $company)
                        @foreach ($company->internship_industry as $industry)
                             <option value ="internshipcompany?state={{$industry->industry_name}}">{{$industry->industry_name}}</option>
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class = "col-xs-12 hidden-md hidden-lg hidden-xl last-filter">
    <div class = "row">
        <div class = "col-xs-12">
            <select class = "form-control" name="internship_duration" id="">
                <option value="" disabled selected>Select</option>
                @if ( Request::get('state')  )
                    @foreach ($internship_filter as $filter)
                        @foreach ($filter->internship_duration as $duration)
                            <option value ="internshipcompany?state={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</option>
                        @endforeach
                    @endforeach
                @else
                 
                     @foreach ($internshipCompany_table as $company)
                        @foreach ($company->internship_duration as $duration)
                            <option value ="internshipcompany?state={{$duration->duration_start_date}}">{{$duration->duration_start_date}}</option>
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>

<!--End of filter mobile -->


<div class = "col-xs-12 company-whole" id = "x">
    <div class = "col-md-6 hidden-xs hidden-sm picture" id = "map">  
    </div>
    <div class = "hidden-md hidden-lg hidden-xl col-xs-12 picture" id = "map-mobile">  
    </div>
    <div class = "col-md-6 hidden-xs hidden-sm side-content">
        @foreach ($internshipCompany_table as $company)
            <div class = "col-xs-6 ">
                <div class = "col-xs-12 info-container">
                    <div class = "row company-picture">
                        <img src="{{ URL::asset('image\uploaded_company_image')}}/{{$company->image}}" class="img img-responsive company-head" alt="Company Banner">
                    </div>
                    @if ($company->featured == "Yes")
                    <div class = "row featured-notif">
                        <p><i class="fa fa-star"></i> Featured Property</p>
                    </div>
                    @endif
                    <div class = "row info">
                        <h4>{{ \Illuminate\Support\Str::words($company->full_address, 5,' .... ')}}</h4>
                        <h3>{{$company->company_name}}</h3>
                        <p class = "desc">{{ \Illuminate\Support\Str::words($company->description, 10,' .... ')}}</p>
                        <a href = "javascript:google.maps.event.trigger(gmarkers[{{$loop->index}}],'click');"  class = "btn locate-me1"> Locate Me </a>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
    <!--Mobile company -->
        <div class = "col-xs-12 hidden-md hidden-lg side-content">
        @foreach ($internshipCompany_table as $company)
            <div class = "col-xs-6 ">
                <div class = "col-xs-12 info-container">
                    <div class = "row company-picture">
                        <img src="{{ URL::asset('image\uploaded_company_image')}}/{{$company->image}}" class="img img-responsive company-head" alt="Company Banner">
                    </div>
                    @if ($company->featured == "Yes")
                    <div class = "row featured-notif">
                        <p><i class="fa fa-star"></i> Featured Property</p>
                    </div>
                    @endif
                    <div class = "row info">
                        <h3>{{$company->company_name}}</h3>
                        <h4>{{ \Illuminate\Support\Str::words($company->full_address, 5,' .... ')}}</h4>
                        <p class = "desc">{{ \Illuminate\Support\Str::words($company->description, 10,' .... ')}}</p>
                        <a href = "javascript:google.maps.event.trigger(gmarkers[{{$loop->index}}],'click');"  class = "btn locate-me1"> Locate Me </a>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>
<!--whats next?-->
    <div class = "container">
        <div class = "col-xs-12">
            <div class = "row text-center what-next-text">
                <h2 id=whatsnext-title>What's Next?</h2>
                <div class = "col-xs-12 col-md-4 col-md-offset-4">
                    <p>Our process is  smooth and easy. We can facilitate your application and get you to your dream destination as soon as possible!</p>
                </div>
            </div>
        </div>
    @foreach ($steps as $step)
        <div class = "row">
            <div class = "col-xs-12">
                <div class = "col-xs-12">
                    <div class="text-center boxshadow box-1 row" 
                    @if ($step->step_number == "1")> 
                        <img src="{{URL:: asset('image/circle.png') }}" class = "number-icon"/>
                    @elseif ($step->step_number == "2")> 
                        <img src="{{URL:: asset('image/circle2.png') }}" class = "number-icon"/>
                    @elseif ($step->step_number == "3")> 
                        <img src="{{URL:: asset('image/circle3.png') }}" class = "number-icon"/>
                    @endif
                        <div class="internship-icon col-xs-12 col-md-6">
                            <img src="{{URL:: asset('image/uploaded_step_image') }}/{{$step->image}}" class = "application-logo">
                            <div class = "col-xs-12">
                                <h1 id=reserve-title>{{$step->image_title}}</h1>
                            </div>
                            <div class = "col-md-10 col-md-offset-1 col-xs-12">
                                <p id="p-icon" style = "color: #900603;">{{$step->image_description}}</p>
                            </div>
                        </div>
                        <div class="intership-content col-xs-12 col-md-6">
                            <div class = "col-xs-12 col-md-offset-1 col-md-10">
                                <p id=p-content>{{$step->description}}</p>
                                <div class="button">
                                    @if ($step->sub_description != null)
                                    <a href= "/faq" class="btn locate-me">{{$step->sub_description}}</a>
                                    @endif
                                    @if ($step->button_name != null)
                                    <br>
                                    <br>
                                    <a href= "/faq" class="btn locate-me">{{$step->button_name}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


        <!--Rate -->
        <div class = "container">
                <div class = "col-xs-12 rate-container">
                    <div class = "col-xs-12 col-md-6">
                        <div class = "text-left-side col-xs-offset-1">
                            <h2 class = "gradient"> What's the rate? </h2>
                            <h3 class = "gradient1"> There is plenty to experience! </h3>
                        </div>
                        <div class = "row row-price">
                            <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1">
                                <h4>Duration</h4>
                            </div>
                           <div class = "col-xs-5 col-md-4">
                                
                                @if ( Request::get('country') == "Australia"  )
     
                                 <select class = "form-control" name="duration2" id="duration2">
                                    @foreach($rate_au as $rate)
                                        <option value="{{$rate->duration}}">{{$rate->duration}} Months</option>
                                    @endforeach
                                </select>
                                @else
                                <select class = "form-control" name="duration" id="duration">
                                    @foreach($rate_us as $rate)
                                        @if ($rate->duration == "12")
                                        <option value="{{$rate->duration}}" selected="">{{$rate->duration}} Months</option>
                                        @else 
                                        <option value="{{$rate->duration}}">{{$rate->duration}} Months</option>
                                        @endif
                                    @endforeach
                                </select>
                                @endif     
                                
                            </div>
                        </div>
                        <div class = "row row-price">
                             <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1">
                                <strong><p id = "reservation">PHP 3000</p></strong>
                            </div>
                            <div class = "col-xs-4 col-md-4">
                                <p>Reservation</p>
                            </div>
                        </div>
                        <div class = "row row-price">
                             <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1">
                                @if ( Request::get('country') == "Australia"  )
                                    @foreach($rate_au as $rate)
                                    <strong><p id = "1st-Installment">$ {{$rate->first}}</p></strong>
                                    @endforeach
                                @else
                                <strong><p id = "1st-Installment">USD 450</p></strong>
                                @endif
                                
                            </div>
                            <div class = "col-xs-4 col-md-4">
                                <p>First Installment *</p>
                            </div>
                        </div>
                        <div class = "row row-price">
                           @if ( Request::get('country') == "Australia")
                           <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1">
                            @else
                            <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1 last-row last-row1">
                            @endif
                                @if ( Request::get('country') == "Australia"  )
                                    @foreach($rate_au as $rate)
                                    <strong><p id = "2nd-Installment">$ {{$rate->second}}</p></strong>
                                    @endforeach
                                @else
                                <strong><p id = "2nd-Installment">USD 4100</p></strong>
                                @endif
                            </div>
                            @if ( Request::get('country') == "Australia")
                            <div class = "col-xs-4 col-md-4">
                            @else
                            <div class = "col-xs-4 col-md-4 last-row">
                            @endif
                                <p>Second Installment **</p>
                            </div>
                        </div>
                        @if ( Request::get('country') == "Australia"  )
                        <div class = "row row-price">
                            <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1 ">
                                @if ( Request::get('country') == "Australia"  )
                                    @foreach($rate_au as $rate)
                                    <strong><p id = "2nd-Installment">$ {{$rate->third}}</p></strong>
                                    @endforeach
                                @else
                                <strong><p id = "2nd-Installment">USD 4100</p></strong>
                                @endif
                            </div>
                           <div class = "col-xs-4 col-md-4">
                                <p>Third Installment **</p>
                            </div>
                        </div>
                        <div class = "row row-price">
                             <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1 last-row last-row1">
                                @foreach($rate_au as $rate)
                                    <strong><p id = "reservation">$ {{$rate->visa}}</p></strong>
                                @endforeach
                            </div>
                            <div class = "col-xs-4 col-md-4 last-row">
                                <p>VISA and Insurance</p>
                            </div>
                        </div>
                        @endif
                        <div class = "col-xs-8 col-xs-offset-2 hidden-md hidden-xl hidden-lg">
                            <hr>
                        </div>
                        <div class = "row row-price">
                             <div class = "col-xs-4 col-xs-offset-2 col-md-3 col-md-offset-1">
                                 @if ( Request::get('country') == "Australia"  )
                                    @foreach($rate_au as $rate)
                                    <strong><p id = "2nd-Installment">$ {{$rate->total}}</p></strong>
                                    @endforeach
                                @else
                                <strong><p id = "3rd-Installment">USD 4550</p></strong>
                                @endif
                            </div>
                            <div class = "col-xs-4 col-md-4">
                                <p>Total Program Payment</p>
                            </div>
                        </div>
                        <div clas = "row row-price">
                            <div class = "col-md-6 col-md-offset-3 col-xs-11 col-xs-offset-1">
                                @if ( Request::get('country') == "United States"  )
                                <a class = "btn locate-me" href = "/application?c=IUS"> Apply Now </a>
                                @else
                                <a class = "btn locate-me" href = "/application?c=IAU"> Apply Now </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class = "hidden-xs hidden-sm row row-price-legend">
                            <div class = "col-md-offset-1">
                                @if ( Request::get('country') == "United States"  )
                                <p> * Money Back Guarantee </p>
                                <p> ** Money Back Guarantee + includes medical insurance </p>
                                
                                <strong><p class = "add-fees">Additional Fees:</p></strong>
                                <p>USD 180 SEVIS Fee and</p>
                                <p>USD 160 US embassy interview booking fee</p>
                                @endif
                            </div>
                        </div>
                        <div class = "hidden-md hidden-lg hidden-xl row row-price-legend">
                            <div class = "text-center">
                                @if ( Request::get('country') == "United States"  )
                                <p> * Money Back Guarantee </p>
                                <p> ** Money Back Guarantee + includes medical insurance </p>
                                <strong><p class = "add-fees">Additional Fees:</p></strong>
                                <p>USD 180 SEVIS Fee and</p>
                                <p>USD 160 US embassy interview booking fee</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-6 hidden-xs hidden-sm rate-image">
                         <img src="{{ URL::asset('image/photos/Price.jpg')}}" class="img img-responsive img-price" alt="Company Banner">
                    </div>
                </div>
            </div>
        <script>
            var first_installment = {!! json_encode($rate_us_1st->toArray()) !!};
            var second_installment = {!! json_encode($rate_us_2nd->toArray()) !!};
            var third_installment = {!! json_encode($rate_us_3rd->toArray()) !!};
            var e = document.getElementById("duration");
            e.onchange = function() {
                var strUser = e.options[e.selectedIndex].value;
                if(strUser == "6"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[1];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[1];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[1];
                }
                if(strUser == "7"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[2];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[2];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[2];
                }   
                if(strUser == "8"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[3];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[3];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[3];
                }   
                if(strUser == "9"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[4];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[4];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[4];
                }  
                if(strUser == "10"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[5];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[5];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[5];
                }   
                if(strUser == "11"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[6];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[6];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[6];
                }  
                if(strUser == "12"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[0];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[0];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[0];
                }
                if(strUser == "18"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + first_installment[7];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + second_installment[7];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + third_installment[7];
                }                     
            }
            var au_first_installment = {!! json_encode($rate_au_1st->toArray()) !!};
            var au_second_installment = {!! json_encode($rate_au_2nd->toArray()) !!};
            var au_third_installment = {!! json_encode($rate_au_3rd->toArray()) !!};
            var l = document.getElementById("duration2");
            l.onchange = function() {
                var strUser = l.options[l.selectedIndex].value;
                if(strUser == "12"){
                    document.getElementById('1st-Installment').innerHTML = "PHP " + au_first_installment[0];
                    document.getElementById('2nd-Installment').innerHTML = "PHP " + au_second_installment[0];
                    document.getElementById('3rd-Installment').innerHTML = "PHP " + au_third_installment[0];
                }
            }
        </script>

 <!--testimony-->
        <div class="container">
            <div class="row testimony-header">
                <div class=" col-md-8 col-md-offset-2 col-xs-12 about-font text-center">
                     <h3>Our Community</h3>
                     <p>We are proud to have an amazing community of students and professionals who have received the VIP treatment. Listen to their stories.</p>
                </div>
            </div>
            @if ( Request::get('country') == "United States")
             @foreach($testimonial_us as $testimonials)
            <div class="container">
                <div class = "row testimony-content">
                    <div class = "col-xs-8 testimony-description">
                        <blockquote>
                            {{$testimonials->testimony}}
                            <cite>{{$testimonials->first_name}} {{$testimonials->last_name}}</cite>
                            <cite>{{$testimonials->organization}}</cite>
                        </blockquote>
                    </div>
                    <div class = "col-xs-4">
                         <img src="{{ URL::asset('image/uploaded_testimony_image')}}/{{$testimonials->image_testimony}}" class="img img-responsive img-rounded testimony-picture" alt="Company Banner"/>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @foreach($testimonial_aus as $testimonials)
            <div class="container">
                <div class = "row testimony-content">
                    <div class = "col-xs-8 testimony-description">
                        <blockquote>
                            {{$testimonials->testimony}}
                            <cite>{{$testimonials->first_name}} {{$testimonials->last_name}}</cite>
                            <cite>{{$testimonials->organization}}</cite>
                        </blockquote>
                    </div>
                    <div class = "col-xs-4">
                         <img src="{{ URL::asset('image/uploaded_testimony_image')}}/{{$testimonials->image_testimony}}" class="img img-responsive img-rounded testimony-picture" alt="Company Banner"/>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
<!--end of testimony -->
<div class = "filler row" id = "filler"></div>
</form>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#links > a").click(function(e) {
        e.preventDefault(); //so the browser doesn't follow the link

        $("#pageLoad").load(this.href, function() {
            //execute here after load completed
        });
    });
});
</script>
<script type="text/javascript">
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function (e) {
          
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
          
                e.preventDefault(); //so the browser doesn't follow the link

                $("#pageLoad").load(url, function() {
                    //execute here after load completed
                });
          }
          return false;
      });
    });
</script>

<script type="text/javascript">

  var deletePostUri = "{{ route('internshipcompany.index')}}";
  var gmarkers = [];
  var gaddress = {!! json_encode($internship_addresses->toArray()) !!};
  var gname = {!! json_encode($internship_name->toArray()) !!};
  var gdesc = {!! json_encode($internship_desc->toArray()) !!};
  var gid = {!! json_encode($internship_id->toArray()) !!};
  var image = {!! json_encode($internship_image->toArray()) !!};
  var featured = {!! json_encode($internship_featured->toArray()) !!};
  var lat = {!! json_encode($internship_latitude->toArray()) !!};
  var long = {!! json_encode($internship_longtitude->toArray()) !!};
  var $_GET = <?php echo json_encode($_GET); ?>;
  var eid = $_GET['eid'];
  var counter = 0 ;
  var infowindow ; 
  var map;
function initMap() {
    if(gaddress.length == 0)
    {   //map settings
         var myOptions = {
            zoom: 4,
            maxZoom: 10,
            minZoom: 5,
            center: {lat:-21.85827, lng:134.986323},
            mapTypeId: 'terrain'
        };
        //mobile map settings
        var myOptions2 = {
            zoom: 3,
            maxZoom: 10,
            minZoom: 3,
            center: {lat:-21.85827, lng:134.986323},
            mapTypeId: 'terrain'
        };
        
            map = new google.maps.Map($('#map')[0], myOptions);
            map2 = new google.maps.Map($('#map-mobile')[0], myOptions2);  
    }
    else{
      var elevator;
        var myOptions = {
            zoom: 4,
            minZoom: 4,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: 'terrain'
        };
        var myOptions2 = {
            zoom: 3.4,
            minZoom: 3.4,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: 'terrain',
            scrollable: true
        };
        //map settings
        map = new google.maps.Map($('#map')[0], myOptions);    
        map2 = new google.maps.Map($('#map-mobile')[0], myOptions2);    

        var bounds = new google.maps.LatLngBounds();
        map.setCenter(bounds.getCenter());
        map2.setCenter(bounds.getCenter());

       for (var x = 0; x < gaddress.length; x++) {
            var latlng = new google.maps.LatLng(lat[x], long[x]);     
            addMarker(map,bounds,latlng,featured[counter]);    
        } map.fitBounds(bounds); counter = 0;
        for (var x = 0; x < gaddress.length; x++) {
            var latlng = new google.maps.LatLng(lat[x], long[x]);     
            addMarker(map2,bounds,latlng,featured[counter]);    
        } map2.fitBounds(bounds); counter = 0;
    } 
}
    function addMarker(map,bounds, latlng,featured){
        if(featured == 'Yes'){
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "/image/icons/VIP-MAP-F.png"
            });
        }
        else{
            var markers = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: "/image/icons/VIP-MAP.png"
            });
        }
        gmarkers.push(markers);
        bounds.extend(markers.getPosition());
        
        addInfoWindow(markers);
    }
    function addInfoWindow(markers){
        var secretMessage = '<div id="container " class = "infowindow">'+
                                '<div class = "col-xs-4 image-container" >'+
                                    '<img src="image/uploaded_company_image/' + image[counter] + '" class="img map-img img-responsive" alt="Company Banner">' +
                                '</div>'+
                                '<div class = "col-xs-8" id="siteNotice">'+
                                    '<h1 id="firstHeading" class="firstHeading">' + gname[counter] +  '</h1>'+
                                    '<div id="bodyContent">'+
                                       '<p class = "map-description">'  + gdesc[counter].slice(0, 150) + '</p><br><br>'+
                                        '<a data-toggle="modal" data-target="#myModal" class = "btn locate-me2" href = "/internship?cid=' +  gid[counter] + '"> Learn More </a>' +
                                    '</div>'+
                                '</div>'+
                            '</div>';
        var infowindow = new google.maps.InfoWindow({
          content: secretMessage
        });
        google.maps.event.addListener(markers,'click',function() {
          map.setZoom(16);
          map.setCenter(markers.getPosition());
          infowindow.open(markers.get('map'), markers);
        });
        google.maps.event.addListener(markers,'click',function() {
          map2.setZoom(16);
          map2.setCenter(markers.getPosition());
          infowindow.open(markers.get('map2'), markers);
        });
        if(eid !== undefined){
            if(gid[counter] == eid)
            {
                map.setCenter(gmarkers[counter].getPosition());
                infowindow.open(map, gmarkers[counter]);
            }
        }
        counter++;
    }  
    
    

</script>

<script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyAzQQYFrug-yB5tVMh7KL6av4U1SegZcec&callback=initMap">
 </script>