         <!--start footer-->
         <div class="footer">
             <div class="footer-bg-color-2 footer-bottom-light-border">
                 <div class="container">
                     <div class="row justify-content-center text-center">
                         <div class="col py-4">
                             <a class="logo" href="/home"><img src="{{ asset('app-assets/images/logo.png')}}" style="height: 70px;"></a>

                         </div>

                     </div>

                 </div>

             </div>
             <div class="footer-bg-color-2 footer-bottom-light-border">
                 <div class="container">
                     <div class="row justify-content-center text-center py-_x pt-5 pb-5">
                         <div class="col-md-4 text-center mb-4 mb-md-0">
                             <a>
                                 <i class="fas fa-map-marker-alt text-9 text-color-light mb-3 mt-2"></i>
                                 <p class="mb-0">
                                     <strong>{{ trans('front_trans.address') }}</strong>
                                     <!--<span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">-->
                                     <!--   {{trans('front_trans.Cairo- Alrehab City')}}-->
                                     <!--</span>-->
                                      <?php   $locations   = \App\Models\Company_Location::all();   ?>
                                            @if (App::getLocale() == 'en')
                                                @foreach ($locations as $location )
                                                 <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                                    {{ $location->country_en }}-{{ $location->city_en }}-{{ $location->address_en }}
                                                 </span>
                                                @endforeach
                                            @else
                                                @foreach ($locations as $location )
                                                <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                                    {{ $location->country_ar }}-{{ $location->city_ar }}-{{ $location->address_ar }}
                                                 </span>
                                                @endforeach
                                            @endif

                                 </p>

                             </a>

                         </div>
                         <div class="col-md-4 text-center mb-4 mb-md-0">
                             <a>
                                 <i class="fas fa-clock text-9 text-color-light mb-3 mt-2"></i>
                                  <p class="mb-0">
                                     <strong>{{ trans('front_trans.times_of_work') }}</strong>
                                     <?php  $work_times = \App\Models\Work_Time::all(); ?>
                                     <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                          @foreach ($work_times as $work)
                                             {{ trans('front_trans.From' )}} {{ trans('front_trans.'.$work->start_day )}} {{ trans('front_trans.To' )}} {{ trans('front_trans.'.$work->end_day )}} <br>
                                             {{ trans('front_trans.From' )}} {{date('H:i a', strtotime($work->start_time)) }} {{ trans('front_trans.To' )}} {{date('H:i a', strtotime($work->end_time)) }}
                                          @endforeach
                                      </span>
                                 </p>
                             </a>

                         </div>
                         <div class="col-md-4 text-center mb-4 mb-md-0">
                             <a>
                                 <i class="fas fa-phone-volume text-9 text-color-light mb-3 mt-2"></i>
                                 <p class="mb-0">
                                     <strong>{{ trans('front_trans.contactus') }}</strong>>
                                    <?php $customers = \App\Models\Social::where('type', 'Customers Service')->get(); ?>
                                        @foreach ($customers as $customer)
                                            @if ($customer->status == '1')
                                                <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                                    {{ $customer->name }}
                                                </span>
                                            @endif
                                        @endforeach
                                 </p>
                             </a>

                         </div>

                     </div>

                 </div>

             </div>
             <div class="footer-copyright">
                 <div class="container pt-3 pb-1 py-2">
                     <div class="row">

                        <?php
                            $Twitters    = \App\Models\Social::where('type', 'Twitter')->get();
                            $Facebooks   = \App\Models\Social::where('type', 'Facebook')->get();
                            $Instagrams  = \App\Models\Social::where('type', 'Instagram')->get();
                            $G_Mails     = \App\Models\Social::where('type', 'G_Mail')->get();
                            $Yahoos      = \App\Models\Social::where('type', 'Yahoo')->get();
                            $Telegrams   = \App\Models\Social::where('type', 'Telegram')->get();
                            $Linkeds     = \App\Models\Social::where('type', 'Linked')->get();
                        ?>

                         <div class="col text-center">
                            @foreach ($Facebooks as $Facebook )
                                @if($Facebook->status == '1')
                                    <a href="{{ $Facebook->name }}" target="_blank"><i class="fab fa-facebook"></i></a>
                                @endif
                            @endforeach

                            @foreach ($Instagrams as $Instagram )
                                @if($Instagram->status == '1')
                                    <a href="{{ $Instagram->name }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                @endif
                            @endforeach

                            @foreach ($Twitters as $Twitter )
                                @if($Twitter->status == '1')
                                    <a href="{{ $Twitter->name }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                            @endforeach


                            @foreach ($G_Mails as $G_Mail )
                                @if($G_Mail->status == '1')
                                    <a href="{{ $G_Mail->name }}" target="_blank"><i class="fab fa-gmail"></i></a>
                                @endif
                            @endforeach

                            @foreach ($Linkeds as $Linked )
                                @if($Linked->status == '1')
                                    <a href="{{ $Linked->name }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                @endif
                            @endforeach

                            @foreach ($Yahoos as $Yahoo )
                                @if($Yahoo->status == '1')
                                    <a href="{{ $Yahoo->name }}" target="_blank"><i class="fab fa-yahoo"></i></a>
                                @endif
                            @endforeach

                            @foreach ($Telegrams as $Telegram )
                                @if($Telegram->status == '1')
                                    <a href="{{ $Telegram->name }}" target="_blank"><i class="fab fa-telegram"></i></a>
                                @endif
                            @endforeach






                             <p>{{ trans('front_trans.All rights reserved © 2004 - 2021 Raptors Real Estate Investments') }}</p>
                         </div>



                     </div>

                 </div>

             </div>

         </div>

         </div>
         <!--end footer-->
