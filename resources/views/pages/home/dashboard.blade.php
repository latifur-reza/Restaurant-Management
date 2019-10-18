@extends('layout.master')
@section('content')
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-success icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Cash Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $amount1 = 0;
                      @endphp
                      @foreach ($soldtodayamount as $item)
                          @if ($item->paytype == "Cash")
                              @php
                                  $amount1 = $item->total;
                              @endphp
                          @endif
                      @endforeach
                      {{$amount1."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Today's Sell
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-warning icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Card Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $amount2 = 0;
                      @endphp
                      @foreach ($soldtodayamount as $item)
                          @if ($item->paytype != "Cash")
                              @php
                                  $amount2 = $amount2 + $item->total;
                              @endphp
                          @endif
                      @endforeach
                      {{$amount2."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Today's Sell
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-danger icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      {{$amount1+$amount2."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Today's Sell
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-info icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Item Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $total = 0;
                      @endphp
                      @foreach ($soldtodayitems as $item)
                          @php
                              $total = $total + $item->total;
                          @endphp
                      @endforeach
                      {{$total."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Today's Sell
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div style="text-align: center; margin-bottom: 25px" class="container-fluid table-responsive">
                <b>Top 5 Sold Item Today</b>
                <table  class="table" style="background-color: #fff">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Food</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($soldtodayitems as $item)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$item->food}}</td>
                                <td>{{$item->total}}</td>
                            </tr>
                            @break($count == 6)
                        @endforeach
                        @if ($count == 1)
                            <tr><td colspan='3' style='color: red'><center>No Records Found!</center></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <div style="text-align: center; margin-bottom: 25px" class="container-fluid table-responsive">
                <b>Top 5 Sold Item This Month</b>
                <table  class="table" style="background-color: #fff">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Food</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($soldthismonthitems as $item)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$item->food}}</td>
                                <td>{{$item->total}}</td>
                            </tr>
                            @break($count == 6)
                        @endforeach
                        @if ($count == 1)
                            <tr><td colspan='3' style='color: red'><center>No Records Found!</center></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-success icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Cash Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $amount1 = 0;
                      @endphp
                      @foreach ($soldthismonthamount as $item)
                          @if ($item->paytype == "Cash")
                              @php
                                  $amount1 = $item->total;
                              @endphp
                          @endif
                      @endforeach
                      {{$amount1."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Current Month's Sell
            </p>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-warning icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Card Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $amount2 = 0;
                      @endphp
                      @foreach ($soldthismonthamount as $item)
                          @if ($item->paytype != "Cash")
                              @php
                                  $amount2 = $amount2 + $item->total;
                              @endphp
                          @endif
                      @endforeach
                      {{$amount2."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Current Month's Sell
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-danger icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      {{$amount1+$amount2."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Current Month's Sell
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-square-inc-cash text-info icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Item Sell</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0">
                      @php
                          $total = 0;
                      @endphp
                      @foreach ($soldthismonthitems as $itemnow)
                          @php
                              $total = $total + $itemnow->total;
                          @endphp
                      @endforeach
                      {{$total."/-"}}
                  </h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Current Month's Sell
            </p>
          </div>
        </div>
      </div>
    </div>

@endsection
