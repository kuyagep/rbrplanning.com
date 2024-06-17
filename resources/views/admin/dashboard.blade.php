@extends('layouts.dashboard.main')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Bookmarks</h6>
                                <h2>1,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-award"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">6% higher than last month</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                            aria-valuemax="100" style="width: 62%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Likes</h6>
                                <h2>41,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-thumbs-up"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">61% higher than last month</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0"
                            aria-valuemax="100" style="width: 78%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Events</h6>
                                <h2>410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Events</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0"
                            aria-valuemax="100" style="width: 31%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Comments</h6>
                                <h2>41,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-message-square"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Comments</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Teaching</h6>
                                <h2>62%</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-server"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Non-Teaching</h6>
                                <h2>45%</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-trending-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>No. of Learner</h6>
                                <h2>32</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-mail"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>No. of Classrooms</h6>
                                <h2>11</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-zap"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-8">
                <div class="card sale-card">
                    <div class="card-header">
                        <h3>Deals Analytics</h3>
                    </div>
                    <div class="card-block">
                        <div id="deal-analytic-chart" class="chart-shadow"
                            style="height: 300px; overflow: hidden; text-align: left;">
                            <div class="amcharts-main-div" style="position: relative; width: 100%; height: 100%;">
                                <div class="amChartsLegend amcharts-legend-div"
                                    style="overflow: hidden; position: relative; text-align: left; width: 811px; height: 48px; cursor: default;">
                                    <svg version="1.1" style="position: absolute; width: 811px; height: 48px;">
                                        <desc>JavaScript chart by amCharts 3.21.14</desc>
                                        <g transform="translate(48,10)">
                                            <path cs="100,100" d="M0.5,0.5 L742.5,0.5 L742.5,37.5 L0.5,37.5 Z"
                                                fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                stroke-opacity="0"></path>
                                            <g transform="translate(0,11)">
                                                <g cursor="pointer" aria-label="Market Days" transform="translate(0,0)">
                                                    <g>
                                                        <path cs="100,100" d="M0.5,8.5 L32.5,8.5" fill="none"
                                                            stroke-width="3" stroke-opacity="0.9" stroke="#2ed8b6">
                                                        </path>
                                                        <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                            stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                            stroke-opacity="1" transform="translate(17,8)"></circle>
                                                    </g><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                        opacity="1" text-anchor="start" transform="translate(37,7)">
                                                        <tspan y="6" x="0">Market Days</tspan>
                                                    </text><text y="6" fill="#000000" font-family="Verdana"
                                                        font-size="11px" opacity="1" text-anchor="end"
                                                        transform="translate(185,7)"> </text>
                                                    <rect x="32" y="0" width="153.474609375" height="18"
                                                        rx="0" ry="0" stroke-width="0" stroke="none"
                                                        fill="#fff" fill-opacity="0.005"></rect>
                                                </g>
                                                <g cursor="pointer" aria-label="Market Days ALL"
                                                    transform="translate(200,0)">
                                                    <g>
                                                        <path cs="100,100" d="M0.5,8.5 L32.5,8.5" fill="none"
                                                            stroke-width="3" stroke-opacity="0.9" stroke="#e95753">
                                                        </path>
                                                        <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                            stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                            stroke-opacity="1" transform="translate(17,8)"></circle>
                                                    </g><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                        opacity="1" text-anchor="start" transform="translate(37,7)">
                                                        <tspan y="6" x="0">Market Days ALL</tspan>
                                                    </text><text y="6" fill="#000000" font-family="Verdana"
                                                        font-size="11px" opacity="1" text-anchor="end"
                                                        transform="translate(185,7)"> </text>
                                                    <rect x="32" y="0" width="153.474609375" height="18"
                                                        rx="0" ry="0" stroke-width="0" stroke="none"
                                                        fill="#fff" fill-opacity="0.005"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="amcharts-chart-div"
                                    style="overflow: hidden; position: relative; text-align: left; width: 811px; height: 252px; padding: 0px; touch-action: auto; cursor: default;">
                                    <svg version="1.1"
                                        style="position: absolute; width: 811px; height: 252px; top: -0.5px; left: 0px;">
                                        <desc>JavaScript chart by amCharts 3.21.14</desc>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L810.5,0.5 L810.5,251.5 L0.5,251.5 Z"
                                                fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L742.5,0.5 L742.5,201.5 L0.5,201.5 L0.5,0.5 Z"
                                                fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                stroke-opacity="0" transform="translate(48,20)"></path>
                                        </g>
                                        <g>
                                            <g transform="translate(48,20)">
                                                <g>
                                                    <path cs="100,100" d="M0.5,0.5 L0.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M0.5,201.5 L0.5,201.5 L0.5,0.5" fill="none"
                                                        stroke-width="1" stroke-dasharray="1" stroke-opacity="0.1"
                                                        stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M82.5,0.5 L82.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M82.5,201.5 L82.5,201.5 L82.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M165.5,0.5 L165.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M165.5,201.5 L165.5,201.5 L165.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M247.5,0.5 L247.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M247.5,201.5 L247.5,201.5 L247.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M330.5,0.5 L330.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M330.5,201.5 L330.5,201.5 L330.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M412.5,0.5 L412.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M412.5,201.5 L412.5,201.5 L412.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M495.5,0.5 L495.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M495.5,201.5 L495.5,201.5 L495.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M577.5,0.5 L577.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M577.5,201.5 L577.5,201.5 L577.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M660.5,0.5 L660.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M660.5,201.5 L660.5,201.5 L660.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M742.5,0.5 L742.5,5.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(0,201)"></path>
                                                    <path cs="100,100" d="M742.5,201.5 L742.5,201.5 L742.5,0.5"
                                                        fill="none" stroke-width="1" stroke-dasharray="1"
                                                        stroke-opacity="0.1" stroke="#000000"></path>
                                                </g>
                                            </g>
                                            <g transform="translate(48,20)" visibility="hidden"></g>
                                            <g transform="translate(48,20)" visibility="visible">
                                                <g>
                                                    <path cs="100,100" d="M0.5,201.5 L6.5,201.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(-6,0)"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,134.5 L6.5,134.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(-6,0)"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,67.5 L6.5,67.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(-6,0)"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none"
                                                        stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                        transform="translate(-6,0)"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g transform="translate(48,20)" clip-path="url(#AmChartsEl-7)">
                                            <g visibility="hidden"></g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g>
                                            <g transform="translate(48,20)">
                                                <g></g>
                                                <g clip-path="url(#AmChartsEl-9)">
                                                    <path cs="100,100"
                                                        d="M41.5,194.8 L124.5,134.5 L206.5,147.9 L289.5,101 L371.5,87.6 L453.5,20.6 L536.5,47.4 L618.5,101 L701.5,67.5"
                                                        fill="none" stroke-width="3" stroke-opacity="0.9"
                                                        stroke="#2ed8b6" stroke-linejoin="round"></path>
                                                </g>
                                                <clipPath id="AmChartsEl-9">
                                                    <rect x="0" y="0" width="742" height="201" rx="0"
                                                        ry="0" stroke-width="0"></rect>
                                                </clipPath>
                                                <g></g>
                                            </g>
                                            <g transform="translate(48,20)">
                                                <g></g>
                                                <g clip-path="url(#AmChartsEl-10)">
                                                    <path cs="100,100"
                                                        d="M41.5,168 L124.5,107.7 L206.5,114.4 L289.5,80.9 L371.5,101 L453.5,80.9 L536.5,80.9 L618.5,134.5 L701.5,101"
                                                        fill="none" stroke-width="3" stroke-opacity="0.9"
                                                        stroke="#e95753" stroke-linejoin="round"></path>
                                                </g>
                                                <clipPath id="AmChartsEl-10">
                                                    <rect x="0" y="0" width="742" height="201" rx="0"
                                                        ry="0" stroke-width="0"></rect>
                                                </clipPath>
                                                <g></g>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g>
                                            <g>
                                                <path cs="100,100" d="M0.5,0.5 L742.5,0.5" fill="none"
                                                    stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                    transform="translate(48,221)"></path>
                                            </g>
                                            <g>
                                                <path cs="100,100" d="M0.5,0.5 L0.5,201.5" fill="none"
                                                    stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                    transform="translate(48,20)" visibility="hidden"></path>
                                            </g>
                                            <g>
                                                <path cs="100,100" d="M0.5,0.5 L0.5,201.5" fill="none"
                                                    stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                    transform="translate(48,20)" visibility="visible"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g transform="translate(48,20)" clip-path="url(#AmChartsEl-8)"
                                                style="pointer-events: none;">
                                                <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L0.5,201.5" fill="none"
                                                    stroke-width="1" stroke-opacity="0" stroke="#000000"
                                                    visibility="hidden" transform="translate(701,0)"></path>
                                                <path cs="100,100" d="M0.5,0.5 L742.5,0.5 L742.5,0.5" fill="none"
                                                    stroke-width="1" stroke-opacity="0.2" stroke="#000000"
                                                    visibility="hidden" transform="translate(0,3)"></path>
                                            </g>
                                            <clipPath id="AmChartsEl-8">
                                                <rect x="0" y="0" width="742" height="201" rx="0"
                                                    ry="0" stroke-width="0"></rect>
                                            </clipPath>
                                        </g>
                                        <g></g>
                                        <g>
                                            <g transform="translate(48,20)">
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(41,194)"
                                                    aria-label="Market Days Jan 16, 2013 71.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(124,134)"
                                                    aria-label="Market Days Jan 17, 2013 80.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(206,147)"
                                                    aria-label="Market Days Jan 18, 2013 78.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(289,101)"
                                                    aria-label="Market Days Jan 19, 2013 85.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(371,87)"
                                                    aria-label="Market Days Jan 20, 2013 87.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(453,20)"
                                                    aria-label="Market Days Jan 21, 2013 97.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(536,47)"
                                                    aria-label="Market Days Jan 22, 2013 93.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(618,101) scale(1)"
                                                    aria-label="Market Days Jan 23, 2013 85.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#2ed8b6" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(701,67) scale(1)"
                                                    aria-label="Market Days Jan 24, 2013 90.00"></circle>
                                            </g>
                                            <g transform="translate(48,20)">
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(41,168)"
                                                    aria-label="Market Days ALL Jan 16, 2013 75.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(124,107)"
                                                    aria-label="Market Days ALL Jan 17, 2013 84.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(206,114)"
                                                    aria-label="Market Days ALL Jan 18, 2013 83.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(289,80)"
                                                    aria-label="Market Days ALL Jan 19, 2013 88.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(371,101)"
                                                    aria-label="Market Days ALL Jan 20, 2013 85.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(453,80)"
                                                    aria-label="Market Days ALL Jan 21, 2013 88.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(536,80)"
                                                    aria-label="Market Days ALL Jan 22, 2013 88.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(618,134) scale(1)"
                                                    aria-label="Market Days ALL Jan 23, 2013 80.00"></circle>
                                                <circle r="4" cx="0" cy="0" fill="#FFFFFF"
                                                    stroke="#e95753" fill-opacity="1" stroke-width="2"
                                                    stroke-opacity="1" transform="translate(701,101) scale(1)"
                                                    aria-label="Market Days ALL Jan 24, 2013 85.00"></circle>
                                            </g>
                                        </g>
                                        <g>
                                            <g></g>
                                        </g>
                                        <g>
                                            <g transform="translate(48,20)" visibility="visible"><text y="6"
                                                    fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                                    text-anchor="middle" transform="translate(41.222222275234344,213.5)">
                                                    <tspan y="6" x="0">Jan 16</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(123.22222227523434,213.5)">
                                                    <tspan y="6" x="0">Jan 17</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(206.22222227523434,213.5)">
                                                    <tspan y="6" x="0">Jan 18</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(288.22222227523434,213.5)">
                                                    <tspan y="6" x="0">Jan 19</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(371.22222227523434,213.5)">
                                                    <tspan y="6" x="0">Jan 20</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(453.22222227523434,213.5)">
                                                    <tspan y="6" x="0">Jan 21</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(536.2222222752343,213.5)">
                                                    <tspan y="6" x="0">Jan 22</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(618.2222222752343,213.5)">
                                                    <tspan y="6" x="0">Jan 23</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="middle"
                                                    transform="translate(701.2222222752343,213.5)">
                                                    <tspan y="6" x="0">Jan 24</tspan>
                                                </text></g>
                                            <g transform="translate(48,20)" visibility="hidden"></g>
                                            <g transform="translate(48,20)" visibility="visible"><text y="6"
                                                    fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                                    text-anchor="end" transform="translate(-12,200)">
                                                    <tspan y="6" x="0">70</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="end" transform="translate(-12,133)">
                                                    <tspan y="6" x="0">80</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="end" transform="translate(-12,66)">
                                                    <tspan y="6" x="0">90</tspan>
                                                </text><text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                    opacity="1" text-anchor="end" transform="translate(-12,-1)">
                                                    <tspan y="6" x="0">100</tspan>
                                                </text></g>
                                        </g>
                                        <g></g>
                                        <g transform="translate(48,20)"></g>
                                        <g></g>
                                        <g></g>
                                        <clipPath id="AmChartsEl-7">
                                            <rect x="-1" y="-1" width="744" height="203" rx="0"
                                                ry="0" stroke-width="0"></rect>
                                        </clipPath>
                                    </svg><a href="http://www.amcharts.com" title="JavaScript charts"
                                        style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 53px; top: 25px;">JS
                                        chart by amCharts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="card sale-card">
                    <div class="card-header">
                        <h3>Total Revenue</h3>
                    </div>
                    <div class="card-block text-center">
                        <div id="tot-rev-chart" class="tot-rev-chart chart-shadow st-cir-chart"
                            style="width:100px;height:100px">
                            <h3>120</h3>
                            <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%"
                                class="ct-chart-donut" style="width: 100%; height: 100%;">
                                <g class="ct-series ct-series-a">
                                    <path d="M43.666,92.025A42.5,42.5,0,1,0,50,7.5" class="ct-slice-donut" ct:value="11"
                                        style="stroke-width: 5px;"></path>
                                </g>
                                <g class="ct-series ct-series-b">
                                    <path d="M50,7.5A42.5,42.5,0,0,0,43.812,92.047" class="ct-slice-donut" ct:value="10"
                                        style="stroke-width: 5px;"></path>
                                </g>
                            </svg>
                        </div>
                        <h6 class="mt-40">Today’s Total Sales</h6>
                        <h3 class="fw-700 mb-40">100</h3>
                        <div class="row">
                            <div class="col-4">
                                <p class="mb-5">Target</p>
                                <h3 class="fw-700 text-yellow">$1253</h3>
                            </div>
                            <div class="col-4">
                                <p class="mb-5">Last Week</p>
                                <h3 class="fw-700 text-yellow">$795</h3>
                            </div>
                            <div class="col-4">
                                <p class="mb-5">Last Month</p>
                                <h3 class="fw-700 text-yellow">$978</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
