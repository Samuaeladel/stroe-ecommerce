@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
{{--                <div id="crypto-stats-3" class="row">--}}
{{--                    <div class="col-xl-3 col-12">--}}
{{--                        <div class="card crypto-card-3 pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-2">--}}
{{--                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 pl-2">--}}
{{--                                            <h4>BTC</h4>--}}
{{--                                            <h6 class="text-muted">Bitcoin</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 text-right">--}}
{{--                                            <h4>$9,980</h4>--}}
{{--                                            <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <canvas id="btc-chartjs" class="height-75"></canvas>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-12">--}}
{{--                        <div class="card crypto-card-3 pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-2">--}}
{{--                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 pl-2">--}}
{{--                                            <h4>ETH</h4>--}}
{{--                                            <h6 class="text-muted">Ethereum</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 text-right">--}}
{{--                                            <h4>$944</h4>--}}
{{--                                            <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <canvas id="eth-chartjs" class="height-75"></canvas>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-12">--}}
{{--                        <div class="card crypto-card-3 pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-2">--}}
{{--                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 pl-2">--}}
{{--                                            <h4>XRP</h4>--}}
{{--                                            <h6 class="text-muted">Balance</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 text-right">--}}
{{--                                            <h4>$1.2</h4>--}}
{{--                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <canvas id="xrp-chartjs" class="height-75"></canvas>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-12">--}}
{{--                        <div class="card crypto-card-3 pull-up">--}}
{{--                            <div class="card-content">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-2">--}}
{{--                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 pl-2">--}}
{{--                                            <h4>XRP</h4>--}}
{{--                                            <h6 class="text-muted">Balance</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-5 text-right">--}}
{{--                                            <h4>$1.2</h4>--}}
{{--                                            <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <canvas id="xrp-chartjs" class="height-75"></canvas>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Candlestick Multi Level Control Chart -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">850$</h3>
                                            <h6>اجمالي المبيعات </h6>
                                        </div>
                                        <div>
                                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">$748</h3>
                                            <h6>اجمالي الطلبات</h6>
                                        </div>
                                        <div>
                                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">146</h3>
                                            <h6>عدد العملاء</h6>
                                        </div>
                                        <div>
                                            <i class="icon-user-follow success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">99</h3>
                                            <h6>عدد المنتجات </h6>
                                        </div>
                                        <div>
                                            <i class="icon-heart danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">احدث الطلبات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>العميل</th>
                                            <th>السعر</th>
                                            <th>حاله الطلب</th>
                                            <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-success bg-lighten-5">
                                            <td>10583</td>
                                            <td>صموئيل عادل</td>
                                            <td>$ 4762.53</td>
                                            <td>مكتمل</td>
                                            <td>$ 4762.53</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">اخر التقيمات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>العميل</th>
                                            <th>المنتج</th>
                                            <th>التقييم</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-danger bg-lighten-5">
                                            <td>العميل</td>
                                            <td>ساعه يد</td>
                                            <td>5</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
                <!-- Active Orders -->
                <!-- Active Orders -->
            </div>
        </div>
    </div>
@endsection
