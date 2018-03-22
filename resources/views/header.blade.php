<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>控制台</title>
        <link href="{{ URL::asset('plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/identify.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layout.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/account.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/control_index.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/jquery-1.7.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/layer/layer.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/haidao.offcial.general.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/select.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/haidao.validate.js') }}"></script>
        
    </head>

    <body>
        <div class="view-topbar">
            <div class="topbar-console">
                <div class="tobar-head fl">
                    <a href="#" class="topbar-logo fl">
                    <span><img src="{{ URL::asset('img/logo2.png')}}" width="20" height="20"/></span>
                    </a>
                    <a href="" class="topbar-home-link topbar-btn text-center fl"><span>后台管理</span></a>
                </div>
            </div>
            <div class="topbar-info">
                <div class="fr">
                
                    <div class="fl topbar-info-item">
                    <div class="dropdown">
                        <a href="/home/index" class="topbar-btn">
                        <span class="fl text-normal">回到首页</span>
                        
                        </a>
                        
                    </div>
                    </div>
                    <div class="fl topbar-info-item">
                    <div class="dropdown">
                        <a href="#" class="topbar-btn">
                        <span class="fl text-normal">{{$name}}</span>
                    
                        </a>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-body">
            <div class="view-sidebar">
                <div class="sidebar-content">
                    <div class="sidebar-nav">
                        <div class="sidebar-title">
                            <a href="#">
                                <span class="icon"><b class="fl icon-arrow-down"></b></span>
                                <span class="text-normal">用户中心</span>
                            </a>
                        </div>
                        <ul class="sidebar-trans">
                            <li>
                                <a href="usergl">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_author.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">用户管理</span>
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                    <div class="sidebar-nav">
                        <div class="sidebar-title">
                            <a href="#">
                                <span class="icon"><b class="fl icon-arrow-down"></b></span>
                                <span class="text-normal">站点管理</span>
                            </a>
                        </div>
                        <ul class="sidebar-trans">
                            <li>
                                <a href="bowen">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_cost.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">博文管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="bowenhs">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_cost.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">博文回收站</span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="reply">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_gold.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">回复管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="replyhs">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_gold.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">回复回收站</span>
                                </a>
                            </li>
                            <li>
                                <a href="ly">
                                    <b class="sidebar-icon"><img src="{{ URL::asset('img/icon_order.png')}}" width="16" height="16" /></b>
                                    <span class="text-normal">留言管理</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>