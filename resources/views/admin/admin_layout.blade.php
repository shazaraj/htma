
<!DOCTYPE html>

<html class="loading" lang="en">
<!-- BEGIN : Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets\img\ico\favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('app-assets\img\ico\favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{asset('css.css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\fonts\feather\style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\fonts\simple-line-icons\style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\fonts\font-awesome\css\font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\select2.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <!-- BEGIN summernote-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA==" crossorigin="anonymous" />


    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\themes\layout-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets\css-rtl\plugins\switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\css-rtl\custom-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\datatables\dataTables.bootstrap4.min.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets\css\style-rtl.css')}}">--}}
    <link rel="stylesheet" href="{{asset('app-assets\vendors\css\dragula.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets\css-rtl\pages\ex-component-dragndrop.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets\css-rtl\pages\ex-component-sweet-alerts.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets\vendors\css\dropzone.min.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
    <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>

            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">


                    <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                            <div class="user d-md-flex d-none mr-2"><span class="text-right">  <i class="ft-power mr-2"></i> </span><span class="text-right text-muted font-small-3">Logout</span></div> </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar (Header) Ends-->

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">


    <!-- main menu-->
    <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
    <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" data-scroll-to-active="true">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
            <div class="logo clearfix"><a class="logo-text float-left" href="{{url('/home')}}">
                    <span class="text" dir="ltr">  htma </span></a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content main-menu-content">
            <div class="nav-container">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                    <li class=" nav-item"><a href="{{url('/notification')}}"><i class="ft ft-bell"></i><span class="menu-title" data-i18n="Email"> الإشعارات </span></a>
                    <li class=" nav-item"><a href="{{url('/inbox_problems')}}"><i class="ft ft-sunrise"></i><span class="menu-title" data-i18n="Email"> الشكاوي </span></a>
                    <li class=" nav-item"><a href="{{url('/student_eco')}}"><i class="ft ft-sun"></i><span class="menu-title" data-i18n="Email"> الشؤون الطلابية </span></a>
                    <li class=" nav-item"><a href="{{url('/employees')}}"><i class="ft-user"></i><span class="menu-title" data-i18n="Email"> الموظفين </span></a>
                    <li class=" nav-item"><a href="{{url('/rule')}}"><i class="ft-plus"></i><span class="menu-title" data-i18n="Email"> الصلاحيات </span></a>

                    <li class="has-sub nav-item"><a href="javascript:;"><i class="ft ft-feather"></i><span class="menu-title" data-i18n="UI Kit">  الهيئة </span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a>
                        <ul class="menu-content">
                            <li><a href="{{url('/lecture')}}"><i class="ft-book-open"></i><span class="menu-item" data-i18n="Grid">   محاضرات إلكترونية </span> <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a></li>
                            <li><a href="{{url('result_exam')}}"><i class="ft ft-archive"></i><span class="menu-item" data-i18n="Typography"> سلالم امتحانية </span>  </a></li>
                            <li><a href="{{url('important_websites')}}"><i class="fa fa-code"></i><span class="menu-item" data-i18n="Typography"> مواقع وروابط هامة </span>  </a></li>
                            <li><a href="{{url('/videos')}}"><i class="ft ft-file"></i><span class="menu-item" data-i18n="Typography">ملفات توضيحية </span>  </a></li>
                            <li><a  href="{{url('/general_questions')}}"><i class="fa fa-question-circle "></i><span class="menu-item" data-i18n="Typography">الأسئلة الشائعة </span>  </a></li>

                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="javascript:;"><i class="ft ft-award"></i><span class="menu-title" data-i18n="UI Kit">  الامتحانات </span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a>
                        <ul class="menu-content">
                            <li><a href="{{url('/import_marks')}}"><i class="fa fa-inbox"></i><span class="menu-item" data-i18n="Typography"> علامات الطلاب </span>  </a><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></li>

                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-users"></i><span class="menu-title" data-i18n="UI Kit">  شؤون الطلاب </span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a>
                        <ul class="menu-content">
                            <li><a href="{{url('/students')}}"><i class="fa fa-list-alt"></i><span class="menu-item" data-i18n="Grid"> قوائم الطلاب   </span> <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a></li>
                            <li><a href="{{url('/college_info')}}"><i class="fa fa-info-circle"></i><span class="menu-item" data-i18n="Typography"> قرارات الجامعة </span>  </a></li>

                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="javascript:;"><i class="ft ft-server"></i><span class="menu-title" data-i18n="UI Kit">  المكتبة الإلكترونية </span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a>
                        <ul class="menu-content">
                            <li><a href="{{url('/grad')}}"><i class="fa fa-pied-piper"></i><span class="menu-item" data-i18n="Grid"> مشاريع تخرج   </span> <span class="tag badge badge-pill badge-danger float-right mr-1 mt-1"></span></a></li>
                            <li><a href="{{url('/master')}}"><i class="fa fa-cc-mastercard"></i><span class="menu-item" data-i18n="Grid"> رسائل ماجستير   </span></a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
        <!-- / main menu-->
    </div>

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">



                @yield("content")
            </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <footer class="footer undefined undefined">

        </footer>
        <!-- End : Footer--><!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- START Notification Sidebar-->
<aside class="notification-sidebar d-none d-sm-none d-md-block" id="notification-sidebar"><a class="notification-sidebar-close"><i class="ft-x font-medium-3 grey darken-1"></i></a>
    <div class="side-nav notification-sidebar-content">
        <div class="row">
            <div class="col-12 notification-nav-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="activity-tab" href="#activity-tab" aria-expanded="true">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="settings-tab" href="#settings-tab" aria-expanded="false">Settings</a></li>
                </ul>
            </div>
            <div class="col-12 notification-tab-content">
                <div class="tab-content">
                    <div class="row tab-pane active" id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1">
                        <div class="col-12" id="activity">
                            <h5 class="my-2 text-bold-500">System Logs</h5>
                            <div class="timeline-left timeline-wrapper mb-3" id="timeline-1">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-download primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>New Update Available</span><span class="float-right grey font-italic font-small-2">1 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Android Pie 9.0.0_r52v availabe (658MB).</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Download Now!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="{{asset('')}}app-assets\img\portrait\small\avatar-s-15.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Reminder!</span><span class="float-right grey font-italic font-small-2">52 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your meeting is scheduled with Mr. Derrick Walters at 16:00.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Snooze</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="{{asset('')}}app-assets\img\portrait\small\avatar-s-16.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Recieved a File</span><span class="float-right grey font-italic font-small-2">4 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Christina Rogers sent you a file for the next conference.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="{{asset('app-assets\img\icons\sketch-mac-icon.png')}}" alt="icon" width="20"><span class="text-bold-500 ml-2">Diamond.sketch</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-mic primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Voice Message</span><span class="float-right grey font-italic font-small-2">10 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Natalya Parker sent you a voice message.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Listen</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-cloud-drizzle primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Weather Update</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Hi John! It is a rainy day with 16&deg;C.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="my-2 text-bold-500">Applications Logs</h5>
                            <div class="timeline-left timeline-wrapper" id="timeline-2">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="{{asset('')}}app-assets\img\portrait\small\avatar-s-26.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Gmail</span><span class="float-right grey font-italic font-small-2">Just now</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Victoria Hampton sent you a mail and has a file attachment with it.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="{{asset('app-assets\img\icons\pdf.png')}}" alt="pdf icon" width="20"><span class="text-bold-500 ml-2">Register.pdf</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-droplet primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>MakeMyTrip</span><span class="float-right grey font-italic font-small-2">7 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your next flight for San Francisco will be on 24th March.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Important</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="{{asset('')}}app-assets\img\portrait\small\avatar-s-23.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>CNN</span><span class="float-right grey font-italic font-small-2">16 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">U.S. investigating report says email account linked to CIA Director was hacked.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Read full article</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-map primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Maps</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">You visited Walmart Supercenter in Chicago.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Write a Review!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-package primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Updates Available</span><span class="float-right grey font-italic font-small-2">2 days ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">19 app updates found.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-pane" id="settings-tab" aria-labelledby="base-tab2">
                        <div class="col-12" id="settings">
                            <h5 class="mt-2 mb-3">General Settings</h5>
                            <ul class="list-unstyled mb-0 mx-2">
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Notifications</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-1" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Use switches when looking for yes or no answers.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Show recent activity</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-1" type="checkbox" checked="">
                                                <label for="noti-s-checkbox-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">The "for" attribute is necessary to bind checkbox with the input.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Product Update</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-4" type="checkbox" checked="">
                                                <label class="custom-control-label" for="noti-s-switch-4"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Message and mail me on weekly product updates.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Email on Follow</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-3" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone follows me.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Announcements</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-2" type="checkbox" checked="">
                                                <label for="noti-s-checkbox-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Receive all the news and announcements from my clients.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Date and Time</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-3" type="checkbox">
                                                <label for="noti-s-checkbox-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Show date and time on top of every page.</p>
                                </li>
                                <li>
                                    <div class="mb-1"><span class="text-bold-500">Email on Comments</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-2" type="checkbox" checked="">
                                                <label class="custom-control-label" for="noti-s-switch-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone comments on my article.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- END Notification Sidebar-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets\vendors\js\vendors.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\vendors.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\switchery.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="{{asset('app-assets\js\core\app-menu.min.js')}}"></script>
<script src="{{asset('app-assets\js\core\app.min.js')}}"></script>
<script src="{{asset('app-assets\js\notification-sidebar.min.js')}}"></script>
<script src="{{asset('app-assets\js\customizer.min.js')}}"></script>
<script src="{{asset('app-assets\js\scroll-top.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\select2.full.min.js')}}"></script>
<script src="{{asset('app-assets\js\components-modal.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\datatable\jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\datatable\dataTables.bootstrap4.min.js')}}"></script>
<!-- END APEX JS-->
<!-- BEGIN summernote-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
{{--<script src="{{asset('app-assets\js\form-inputs.min.js')}}"></script>--}}

<script src="{{asset('app-assets\vendors\js\dragula.min.js')}}"></script>
<script src="{{asset('app-assets\js\ex-component-dragndrop.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\sweetalert2.all.min.js')}}"></script>
<script src="{{asset('app-assets\vendors\js\dropzone.min.js')}}"></script>

<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script src="{{asset('assets\js\scripts.js')}}"></script>

</body>

</html>

@stack('pageJs')
