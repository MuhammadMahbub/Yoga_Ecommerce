@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }}
@endsection

{{-- Css --}}
@push('css')

  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/vendors/css/charts/apexcharts.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/plugins/charts/chart-apex.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/app-assets/css/pages/app-user.css') }}">



@endpush

{{-- Menu Active --}}
@section('dashboard')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
        </ol>
    </div>
@endsection


{{-- Content --}}
@section('content')

  <section id="dashboard-analytics" class="app-user-view">

    {{-- <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{ asset('dashboard_assets/app-assets/images/elements/decore-left.png') }}" class="congratulations-img-left" alt="card-img-left" />
                    <img src="{{ asset('dashboard_assets/app-assets/images/elements/decore-right.png') }}" class="congratulations-img-right" alt="card-img-right" />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                      <h1 class="mb-1 text-white">{{ __("Welcome") }} {{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Greetings Card ends -->
    </div> --}}

    <div class="row">
      <div class="col-12">
        <div class="card card-statistics">
          <div class="card-header border-bottom mb-2">
            <h4 class="card-title">{{ __('Statistics') }}</h4>
          </div>
          <div class="card-body">

            <div class="row">

              <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <div class="media">
                  <div class="avatar bg-light-primary mr-2">
                    <div class="avatar-content">
                      {{-- <i data-feather="trending-up" class=""></i> --}}
                      <img src="{{ asset('dashboard_assets/live.gif') }}" alt="" class="w-100">
                    </div>
                  </div>
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0" id="live_client_id">{{ $numberOfGuests }}</h4>
                    
                    <p class="card-text font-small-3 mb-0">{{ __('Live active user') }}</p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <div class="media">
                  <div class="avatar bg-light-primary mr-2">
                    <div class="avatar-content">
                      <i data-feather="trending-up" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">{{ $total_sell_count }}</h4>
                    <p class="card-text font-small-3 mb-0">{{ __('Total Sales') }}</p>
                  </div>
                </div>
              </div>

              {{-- <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <div class="media">
                  <div class="avatar bg-light-danger mr-2">
                    <div class="avatar-content">
                      <i data-feather="box" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">{{ $total_courses }}</h4>
                    <p class="card-text font-small-3 mb-0">{{ __('Total Courses') }}</p>
                  </div>
                </div>
              </div> --}}

              <div class="col-md-3 col-sm-6">
                <div class="media">
                  <div class="avatar bg-light-success mr-2">
                    <div class="avatar-content">
                      <i data-feather="dollar-sign" class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">${{ $total_sell }}</h4>
                    <p class="card-text font-small-3 mb-0">{{ __('Total Income') }}</p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6">
                <div class="media">
                  <div class="avatar bg-light-success mr-2">
                    <div class="avatar-content">
                      <i data-feather='corner-up-left' class="avatar-icon"></i>
                    </div>
                  </div>
                  <div class="media-body my-auto">
                    <h4 class="font-weight-bolder mb-0">${{ $total_refund }}</h4>
                    <p class="card-text font-small-3 mb-0">{{ __('Total Refund') }}</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row match-height">
      <div class="col-6">
        <div class="card custom-cards-height">
          <div class="card-header border-bottom mb-2">
            <h4 class="card-title">{{ __('Most sold course') }}</h4>
          </div>
          <div class="card-body d-flex flex-column p-0">
            <div id="sales-vs-stocks-chart" class="my-auto"></div>
            <div class="row border-top text-center mt-2">
              <div class="col-6 border-right py-1">
                  <p class="card-text text-muted mb-0">{{ __('Total Sell') }}</p>
                  <h3 class="font-weight-bolder mb-0">€ {{ $orders->first()->price_sum ?? 0 }}</h3>
              </div>
              <div class="col-6 py-1">
                  <p class="card-text text-muted mb-0">{{ __('Most Sell') }}</p>
                  @if ($orders->first() != null)
                    <a href="{{ route('yogaclass.edit',$orders->first()->getClass->id) }}">
                      <h3 class="font-weight-bolder mb-0">{{ Str::words($orders->first()->getClass->title , 3) }}</h3>
                    </a>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card card-transaction custom-cards-height">

          <div class="card-header border-bottom">
            <h4 class="card-title">{{ __('Transactions') }}</h4>
          </div>

          <div class="card-body custom-cards-body-height simple-bar mt-1">

            <div class="transaction-item">
              <div class="media">
                <div class="avatar bg-light-primary rounded">
                  <div class="avatar-content">
                    <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="transaction-title">{{ __('Total Classes') }}</h6>
                </div>
              </div>
              <div class="font-weight-bolder text-success">{{ $orders->sum('sell_count') }}</div>
            </div>

            <div class="transaction-item">
              <div class="media">
                <div class="avatar bg-light-success rounded">
                  <div class="avatar-content">
                    <i data-feather="check" class="avatar-icon font-medium-3"></i>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="transaction-title">{{ __('Total Sales') }}</h6>
                </div>
              </div>
              <div class="font-weight-bolder text-success">€{{ $orders->sum('price_sum') }}</div>
            </div>

            <div class="transaction-item">
              <div class="media">
                <div class="avatar bg-light-danger rounded">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="transaction-title">{{ __('Total refund') }}</h6>
                </div>
              </div>
              <div class="font-weight-bolder text-success">€{{ $orders->sum('refund_sum') }}</div>
            </div>

            {{-- <div class="transaction-item">
              <div class="media">
                <div class="avatar bg-light-warning rounded">
                  <div class="avatar-content">
                    <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="transaction-title">{{ __('Payment With Stripe') }}</h6>
                </div>
              </div>
              <div class="font-weight-bolder text-success">€1254</div>
            </div> --}}

            <div class="transaction-item">
              <div class="media">
                <div class="avatar bg-light-info rounded">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="transaction-title">{{ __('Latest Orders') }}</h6>
                </div>
              </div>
              <div class="font-weight-bolder text-success">€ {{ $latest_order }}</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row match-height">
      <div class="col-lg-4 col-md-6 col-12">
          <div class="card card-browser-states">
              <div class="card-header">
                  <div>
                      <h4 class="card-title">Browser States</h4>
                      <p class="card-text font-small-2">Al Time</p>
                  </div>
              </div>

              <div class="card-body">
                  <div class="browser-states">
                      <div class="media">
                          <img src="{{ asset('dashboard_assets/app-assets/images/icons/google-chrome.png') }}" class="rounded mr-1" height="30" alt="Google Chrome" />
                          <h6 class="align-self-center mb-0">Google Chrome</h6>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="font-weight-bold text-body-heading mr-1">{{$browser['chrome']}}%</div>
                          <div id="browser-state-chart-primary"></div>
                      </div>
                  </div>
                  <div class="browser-states">
                      <div class="media">
                          <img src="{{ asset('dashboard_assets/app-assets/images/icons/mozila-firefox.png') }}" class="rounded mr-1" height="30" alt="Mozila Firefox" />
                          <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="font-weight-bold text-body-heading mr-1">{{$browser['firefox']}}%</div>
                          <div id="browser-state-chart-warning"></div>
                      </div>
                  </div>
                <div class="browser-states">
                      <div class="media">
                          <img src="{{ asset('dashboard_assets/app-assets/images/icons/apple-safari.png') }}" class="rounded mr-1" height="30" alt="Apple Safari"/>

                          <h6 class="align-self-center mb-0">Apple Safari</h6>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="font-weight-bold text-body-heading mr-1">{{$browser['safari']}}%</div>
                          <div id="browser-state-chart-secondary"></div>
                      </div>
                  </div>
                  <div class="browser-states">
                      <div class="media">
                          <img src="{{ asset('dashboard_assets/app-assets/images/icons/internet-explorer.png') }}" class="rounded mr-1" height="30" alt="Internet Explorer" />
                          <h6 class="align-self-center mb-0">Internet Explorer</h6>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="font-weight-bold text-body-heading mr-1">{{$browser['internet']}}%</div>
                          <div id="browser-state-chart-info"></div>
                      </div>
                  </div>

                  <div class="browser-states">
                      <div class="media">
                          <img src="{{ asset('dashboard_assets/app-assets/images/icons/opera.png') }}" class="rounded mr-1" height="30" alt="Internet Explorer" />
                          <h6 class="align-self-center mb-0">Opera</h6>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="font-weight-bold text-body-heading mr-1">{{$browser['opera']}}%</div>
                          <div id="browser-state-chart-danger"></div>
                      </div>
                  </div>

              </div>
          </div>
      </div>

      <div class="col-lg-8 col-md-6 col-12 example">
        <div class="card">
          <div class="card-header">
            <div>
              <h4 class="card-title">Most Visited Pages</h4>
              <p class="card-text font-small-2">Al Time</p>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <th>URL</th>
                <th>Visit Count</th>
              </thead>
              <tbody>
                @foreach($top_pages->take(7) as $item)
                    <tr>
                        <td>
                            <a href="{{$item->url}}" target="_blank">
                            {{$item->url}}
                            </a>
                        </td>
                        <td>{{$item->count}}</td>
                    </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row match-height">
        <!-- Subscribers Chart Card starts -->
        {{-- <div class="col-xl-4 col-lg-4 col-sm-4 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ $subs->count() }}</h2>
                            <p class="card-text">Subscribers Gained</p>
                        </div>
                        <div id="gained-chart"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="package" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ array_sum($contacts_date) }}</h2>
                            <p class="card-text">Total Contacts</p>
                        </div>
                        <div id="contact_stats"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Subscribers Chart Card ends -->

        <!-- Orders Chart Card ends -->

        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Subscribers vs Contacts</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-2">
                            <p class="card-text mb-50">Subscriber</p>
                            <h3 class="font-weight-bolder">
                                <span class="text-primary">{{ array_sum($subscriber_count) }}</span>
                            </h3>
                        </div>
                        <div>
                            <p class="card-text mb-50">Contacts</p>
                            <h3 class="font-weight-bolder">
                                <span>{{ array_sum($contact_count) }}</span>
                            </h3>
                        </div>
                    </div>
                    <div id="subscriber-contact"></div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                  <div class="d-flex align-items-center">
                      <div class="d-flex align-items-center mr-2">
                          <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                          <span>Sell</span>
                      </div>
                      <div class="d-flex align-items-center">
                          <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                          <span>Refund</span>
                      </div>
                  </div>
              </div>
              <div class="my-auto" id="sell-refund"></div>
          </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h1>{{ __('Yoga class') }}</h1>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered data_table">
  
                <thead>
                    <tr>
                        <th>{{ __("Sl") }}</th>
                        <th>{{ __("Service name") }}</th>
                        {{-- <th>{{ __("Service type") }}</th> --}}
                        <th>{{ __("Total sell count") }}</th>
                        <th>{{ __("Total price") }}</th>
                        <th>{{ __("Total refund") }}</th>
                        <th>{{ __("Sub total") }}</th>
                    </tr>
                </thead>
  
                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
  
                        <td>
                          <a href="{{ route('yogaclass.edit',$order->class_id) }}">
                            {{ $order->getClass->title }}
                          </a>
                        </td>
  
                        {{-- <td>
                          @if ($order->class_type == 'yoga_class')
                            <span class="badge badge-glow badge-info">{{ __('Yoga class') }}</span>
                          @else
                            <span class="badge badge-glow badge-secondary">{{ __('Service paris') }}</span>
                          @endif
                        </td> --}}
  
                        <td>
                          <span class="badge badge-glow badge-warning">{{ $order->sell_count }}</span>
                        </td>
                        
                        <td>
                          <span class="badge badge-glow badge-info"> €{{ $order->price_sum }}</span>
                        </td>
  
                        <td>
                          <span class="badge badge-glow badge-danger"> €{{ $order->refund_sum ?? 0 }}</span>
                        </td>
  
                        <td>
                          <span class="badge badge-glow badge-success"> €{{  $order->price_sum - $order->refund_sum }}</span>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                
              </table>
            </div>

          </div>
        </div>
      </div>


      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h1>{{ __('Service paris') }}</h1>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered data_table">
  
                <thead>
                    <tr>
                        <th>{{ __("Sl") }}</th>
                        <th>{{ __("Service name") }}</th>
                        {{-- <th>{{ __("Service type") }}</th> --}}
                        <th>{{ __("Total sell count") }}</th>
                        <th>{{ __("Total price") }}</th>
                        <th>{{ __("Total refund") }}</th>
                        <th>{{ __("Sub total") }}</th>
                    </tr>
                </thead>
  
                <tbody>
                  @foreach ($orders_service as $order)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
  
                        <td>
                          <a href="{{ route('serviceParis.edit',$order->class_id) }}">
                            {{-- {{ $order->getClass->title }} --}}
                            {{ \App\Models\ServiceParis::find($order->class_id)->title }}
                          </a>
                        </td>
  
                        {{-- <td>
                          @if ($order->class_type == 'yoga_class')
                            <span class="badge badge-glow badge-info">{{ __('Yoga class') }}</span>
                          @else
                            <span class="badge badge-glow badge-secondary">{{ __('Service paris') }}</span>
                          @endif
                        </td> --}}
  
                        <td>
                          <span class="badge badge-glow badge-warning">{{ $order->sell_count }}</span>
                        </td>
                        
                        <td>
                          <span class="badge badge-glow badge-info"> €{{ $order->price_sum }}</span>
                        </td>
  
                        <td>
                          <span class="badge badge-glow badge-danger"> €{{ $order->refund_sum ?? 0 }}</span>
                        </td>
  
                        <td>
                          <span class="badge badge-glow badge-success"> €{{  $order->price_sum - $order->refund_sum }}</span>
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

    
  </section>

@endsection

@push('js')
{{-- <script scr="{{ asset('dashboard_assets/app-assets/js/scripts/pages/app-user-view.js') }}"></script> --}}
{{-- <script src="{{ asset('dashboard_assets/app-assets/js/scripts/charts/chart-apex.js') }}"></script> --}}
{{-- <script src="{{ asset('dashboard_assets/app-assets/js/scripts/cards/card-statistics.js') }}"></script> --}}
{{-- <script src="{{ asset('dashboard_assets/app-assets/js/scripts/cards/card-analytics.js') }}"></script> --}}


<script>

  var $gainedChart = document.querySelector('#gained-chart');
  var $orderChart = document.querySelector('#order-chart');
  var $revenueReportChart = document.querySelector('#sell-refund');
  var $revenueChart = document.querySelector('#subscriber-contact');
  var lineAreaChart4 = document.querySelector('#contact_stats');


  var gainedChartOptions;
  var orderChartOptions;
  var revenueReportChartOptions;
  var revenueChartOptions;
  

  var gainedChart;
  var orderChart;
  var revenueReportChart;
  var revenueChart;
  


  var $textHeadingColor = '#5e5873';
  var $strokeColor = '#ebe9f1';
  var $labelColor = '#e7eef7';
  var $avgSessionStrokeColor2 = '#ebf0f7';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $revenueStrokeColor2 = '#d0ccff';
  var $textMutedColor = '#b9b9c3';
  var $salesStrokeColor2 = '#df87f2';
  var $white = '#fff';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';
  var $barColor = '#f3f3f3';
  var $trackBgColor = '#EBEBEB';
  var $primary_light = '#A9A2F6';
  var $success_light = '#55DD92';
  var $warning_light = '#ffc085';
  var $primary       = '#75dab4';


  var salesStocksChart;
  var $salesStocksChartColor = '#ff00ec';
  var salesStocksChartOptions;
  var $salesStocksChart = document.querySelector('#sales-vs-stocks-chart');


  gainedChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.primary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Subscribers',
        data: @json($total),
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  gainedChart = new ApexCharts($gainedChart, gainedChartOptions);
  gainedChart.render();



  orderChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Orders',
        data: [10, 15, 8, 15, 7, 12, 8]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  orderChart = new ApexCharts($orderChart, orderChartOptions);
  orderChart.render();




  revenueReportChartOptions = {
    chart: {
      height: 230,
      stacked: true,
      type: 'bar',
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        columnWidth: '17%',
        endingShape: 'rounded'
      },
      distributed: true
    },
    colors: ['#75dab4', window.colors.solid.warning],
    series: [
      {
        name: 'Sell',
        data: @json($sell)
      },
      {
        name: 'Refund',
        data: @json($refund)
      }
    ],
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10
      },
      yaxis: {
        lines: { show: false }
      }
    },
    xaxis: {
      categories: @json($months),
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      },
      axisTicks: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      }
    }
  };
  revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
  revenueReportChart.render();




  revenueChartOptions = {
    chart: {
      height: 240,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      offsetX: -10
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 12],
      width: [4, 3]
    },
    grid: {
      borderColor: $labelColor
    },
    legend: {
      show: false
    },
    colors: [$revenueStrokeColor2, $strokeColor],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: ['#75dab4', $strokeColor],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      }
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '1rem'
        }
      },
      axisTicks: {
        show: false
      },
      categories: @json($months),
      axisBorder: {
        show: false
      },
      tickPlacement: 'on'
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '1rem'
        },
        formatter: function (val) {
          return val > 999 ? (val / 1000).toFixed(0) + 'k' : val;
        }
      }
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10,
        left: 20
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: [
      {
        name: 'Subscriber',
        data: @json($subscriber_count)
      },
      {
        name: 'Contacts',
        data: @json($contact_count)
      }
    ]
  };
  revenueChart = new ApexCharts($revenueChart, revenueChartOptions);
  revenueChart.render();



  
  orderChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Orders',
        data: @json($contacts)
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  orderChart = new ApexCharts(lineAreaChart4, orderChartOptions);
  orderChart.render();



  salesStocksChartOptions = {
    chart: {
      height: 245,
      type: 'radialBar',
      sparkline: {
        enabled: true
      },
      dropShadow: {
        enabled: true,
        blur: 3,
        left: 1,
        top: 1,
        opacity: 0.1
      }
    },
    colors: [$salesStocksChartColor],
    plotOptions: {
      radialBar: {
        offsetY: -10,
        startAngle: -150,
        endAngle: 150,
        hollow: {
          size: '60%'
        },
        dataLabels: {
          name: {
            show: false
          },
          value: {
            fontSize: '2.86rem',
            fontWeight: '600'
          }
        },
        track: {
          strokeWidth: '60%',
        },
      }
    },
    series: [{{ $sell_percent }}],
    stroke: {
      lineCap: 'round'
    },
    grid: {
      padding: {
        bottom: 30
      }
    }
  };
  salesStocksChart = new ApexCharts($salesStocksChart, salesStocksChartOptions);
  salesStocksChart.render();

</script>


<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;

  var pusher = new Pusher('327be2e4e2b2d6113af4', {
    cluster: 'ap2'
  });

  var channel = pusher.subscribe('yoga-diving');
  channel.bind('my-event', function(data) {
    document.getElementById('live_client_id').innerHTML  = data.message
    
  });
</script>

@endpush
