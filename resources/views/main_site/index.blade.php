@extends('main_site.layout.master')

@section('content')

    <body data-spy="scroll" data-target="#navbar-example">

    <div id="preloader"></div>

    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll sticky-logo" href="#">
                                    <img src="{{asset('images/1.png')}}" class="d-inline" alt="" width="35px" height="35px">
                                    <h1>محيط</h1>
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                <ul class="nav navbar-nav navbar-left">
                                    <li class="active">
                                        <a class="page-scroll" href="#home">الرئيسية</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#about">من نحنا</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#services">خدماتنا</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#yes_we">نعم نحن</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#fq">الاسئلة الشائعة</a>
                                    </li>

                                    <li>
                                        <a class="page-scroll" href="#contact">اتصل بنا</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- navbar-collapse -->
                        </nav>
                        <!-- END: Navigation -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
    </header>
    <!-- header end -->

    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset('main_site/images/slide1.jpg')}}" alt="محيط للتجارة الالكترونية" title="#slider-direction-1" />
                <img src="{{asset('main_site/images/slide2.jpg')}}" alt="محيط للتجارة الالكترونية" title="#slider-direction-2" />
                <img src="{{asset('main_site/images/slide3.jpg')}}" alt="محيط للتجارة الالكترونية" title="#slider-direction-3" />
                <img src="{{asset('main_site/images/slide4.jpg')}}" alt="محيط للتجارة الالكترونية" title="#slider-direction-4" />
            </div>

            <!-- direction 1 -->
            <div id="slider-direction-1" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">منصة محيط للتجارة الالكترونية</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">في محيط تستطيع أن تتعاون مع زملائك التجار في شراء البضائع وشحنها إلى بلدك</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="{{url('/customers/register')}}">ابدأ التجارة الان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content text-center">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">منصة محيط للتجارة الالكترونية</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">استورد بضاعتك من الخارج</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="{{url('/customers/register')}}">ابدأ التجارة الان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 3 -->
            <div id="slider-direction-3" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">منصة محيط للتجارة الالكترونية</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">واحفظها في مستودعك لدى محيط</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="{{url('/customers/register')}}">ابدأ التجارة الان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direction 3 -->
            <div id="slider-direction-4" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1">منصة محيط للتجارة الالكترونية</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">واجعل المحترفين يبيعونها لك</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn right-btn page-scroll" href="{{url('/customers/register')}}">ابدأ التجارة الان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start About area -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>من نحن</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-centered text-center">
                    <div class="well-middle">
                        <div class="single-well" style="line-height: 2; font-size: 20px">

                            نحن مؤسسة سعودية تم تأسيسها عام 1440
                            تعمل في مجـال خدمات التجـارة الإلكترونيـة.
                            <br>
                            نحن
                            طموحـون جداً ونهـدف إلى أن نقـدم لعملائنـا
                            خدمات متميـزة في عالم التجارة الإلكترونـيـة
                            تتـمثـل في تسهيـل ممـارسـة العمـل التجـاري
                            بداية من توفيـر المنتجـات ومروراً بتخزينهـا
                            وتسويقهـا وانتهـاء بتسليمها للمستهلك النهائـي
                            قيمنا تتمحور حول الكفاءة والبساطة والإبداع
                            و
                            نحب أن نصف أنفسنا بأننا من يصنع المستقبل.

                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About area -->

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>خدماتنا</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="services-contents">
                    <!-- Start Left services -->
                    <div class="col-md-4 col-sm-4 col-xs-12" style="float: right !important;">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fas fa-truck"></i>
                                    </a>
                                    <h4>توفير واستيراد المنتجات</h4>
                                    <p>

                                        أول خطوات نجاحك عميلنا التاجر الجديد هي حصولك على منتجات متميزة بأسعار منخفضة لتمنحك هامش ربح عالي، وهذا بالضبط ما نجحنا في توفيره لك في متجر محيط للجملة، فنحن نتواصل مع العديد من المصانع وتجار الجملة في جمهوية الصين، ونحصل منهم على منتجات رائعة وذات جودة عالية بأسعار مخفضة، نحن نقوم بشراء هذه المنتجات منهم وجميع إجراءات شحنها إلى السعودية لتصل إليك بأقل جهد وأقل تكلفة مما يقودك تحقيق أرباح أعلى عند بيعها
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" style="float: right !important;">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fas fa-home"></i>
                                    </a>
                                    <h4>حفظ وتخزين المنتجات</h4>
                                    <p>
                                        أحد أبرز التحديات التي قد تواجهك كتاجر مبتدئ هي أين سوف تحفظ المنتجات الخاصة بك ؟ وكيف ستجعلها جاهزة للبيع؟ ومن سيقوم بتغليفها وإرسالها للمشترين؟
                                        <br>
                                        بالضبط هذا ما قمنا بحله لك عزيزي التاجر من خلال توفيرنا لخدمة التخزين مجاناً لمدة ثلاثة أشهر لكل منتج، فنحن نستلم ونحفظ المنتجات ونغلفها ونجعلها جاهزة على الدوام بإذن الله، وسوف تحصل على هذه الخدمة عند شرائك للمنتجات من متجر محيط للجملة، وبعد إنتهاء الفترة المجانية بإمكانك إما التجديد برسوم رمزية أو طلب شحن منتجاتك إلى عنوانك الخاص
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" style="float: right !important;">
                        <!-- end col-md-4 -->
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </a>
                                    <h4>تسويق المنتجات</h4>
                                    <p>
                                        بيع المنتجات وتحقيق الأرباح هو هدف كل تاجر، وأنت كتاجر عبر الإنترنت تحتاج إلى عرض منتجاتك على منصات التجارة الإلكترونية الكبرى مثل: ( سوق.كوم ) و (نون.كوم) ، ولتسهيل التجارة عليك فنحن في محيط نقوم بذلك نيابة عنك لكن بناء على توجيهك فيما يخص الأسعار التي ترغب بالبيع بها ، فعند شرائك للمنتجات واستفادتك من خدمة التخزين التي نوفرها سيكون من حقك الإستفادة من خدمة التسويق أيضا مجانا لمدة ثلاثة أشهر لكل منتج.
                                    </p>
                                </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Service area -->

    <!-- Start Blog Area -->
    <div id="yes_we" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>نعم .. نحن</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-centered text-center">
                            <h5>  جهة إبداعية مسجلة رسمياً في منصة معروف التابعة لوزارة التجارة، ونحظى بالدعم من برنامج بادر للمشاريع التقنية التابع لمدينة الملك عبدالعزيز  للعلوم والتقنية، ونتعامل مع كل من منصة سوق.كوم ومنصة نون.كوم لتسويق منتجات عملائنا، ونوفر خدمات دفع متنوعة منها سداد وفيزا وغيرها</h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes1.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes2.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes3.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes4.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes5.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Start Left Blog -->
                    <div class="col-md-4 text-center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="#">
                                    <img src="{{asset('main_site/images/yes6.png')}}" width="262px" height="148px">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Faq area start -->
    <div id="fq" class="faq-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>الأسئلة الشائعة</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-centered text-right">
                    <div class="faq-details">
                        <div class="panel-group" id="accordion">

                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                                            هل توجد تكاليف لإنشاء حساب في محيط ؟
                                        </a>
                                    </h4>
                                </div>
                                <div id="check1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            لا توجد اي تكاليف لانشاء حساب في محيط ، وانما هو مجاني
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->

                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                            كيف يمكنني الحصول علي اموالي من محيط ؟
                                        </a>
                                    </h4>
                                </div>
                                <div id="check2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            يمكنك الحصول علي اموالك من محيط عن طريق التحويل البنكي العادي وذلك بعد اكمال الحد الادني للتحويل
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->

                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                            هل توجد تكاليف لشحن البضاعة
                                        </a>
                                    </h4>
                                </div>
                                <div id="check3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <p>
                                            لا توجد تكاليف للشحن
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- end Row -->
        </div>
    </div>
    <!-- End Faq Area -->

    <!-- End Suscrive Area -->
    <!-- Start contact Area -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>تواصل معنا</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-mobile"></i>
                                <p>
                                    009661236547
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-envelope-o"></i>
                                <p>
                                    info@moohet.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    جدة شارع حراء
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start  contact -->
                    <div class="col-md-8 col-centered">
                        <div class="form contact-form">
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
                            <form action="" method="post" role="form" class="contactForm">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="الاسم" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="رقم الهاتف" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="الرسالة"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center"><button type="submit">ارسال الرسالة</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Start Footer bottom Area -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-right" style="float: right !important;">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div>
                                    <img src="{{asset('images/4.png')}}" width="240px">
                                </div>

                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 text-right" style="float: right !important;">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>معلومات التواصل</h4>
                                <div class="footer-contacts">
                                    <p><span>هاتف:</span> 0096612365478</p>
                                    <p><span>البريد الإلكتروني:</span>info@moohet.com</p>
                                    <p><span>الموقع:</span>جدة شارع حراء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4" style="float: right !important;">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="flicker-img">
                                    <a href="#"><img src="{{asset('main_site/images/yes1.png')}}"></a>
                                    <a href="#"><img src="{{asset('main_site/images/yes2.png')}}"></a>
                                    <a href="#"><img src="{{asset('main_site/images/yes3.png')}}"></a>
                                    <a href="#"><img src="{{asset('main_site/images/yes4.png')}}"></a>
                                    <a href="#"><img src="{{asset('main_site/images/yes5.png')}}"></a>
                                    <a href="#"><img src="{{asset('main_site/images/yes6.png')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>Moohet</strong>. All Rights Reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    </body>

@endsection