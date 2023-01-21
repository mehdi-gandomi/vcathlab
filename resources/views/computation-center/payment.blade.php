<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.rtl.min.css" >
    <link rel="stylesheet" href="/css/iransans.css">
</head>
<body>
    <div class="container p-4">
        <div class="top-section">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="right-section">
                        <div class="top-line">

                        </div>
                        <div class="avatar">
                            <img src="/images/avatar.svg" alt="">
                        </div>
                        <div class="patient-name">{{$computation_center->patient->name}}</div>
                        <div class="bottom-line">

                        </div>
                    </div>

                </div>
                <div class="col-lg-9 left-section">
                    <div class="alert-box">
                        <div>ارزیابی قلبی برای شما درخواست شد. پس از انجام پرداخت فرآیند محاسبات توسط همکاران ما آغاز خواهد شد.</div>
                    </div>
                    <div class="alert-box mt-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <p>دکتر {{$computation_center->physician}}</p>
                                <p>بیماری های قلب و عروق</p>
                            </div>
                            <div class="col-lg-4">
                                <p>
                                    <span>نوع ویزیت:</span>
                                    <span>حضوری</span>
                                </p>
                                <p>
                                    <span>تاریخ ثبت:</span>
                                    <span>{{verta($computation_center->created_at)->formatJalaliDate()}}</span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <p>
                                    <span>کد پیگیری:</span>
                                    <span>{{$computation_center->id}}</span>
                                </p>
                                <p>
                                    <span>تاریخ نتیجه:</span>
                                    <span>{{verta($computation_center->created_at)->addDay(2)->formatJalaliDate()}}</span>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-4">
            @if(request('step') != 2)
                <h5>محاسبات تخصصی عروق قلب </h5>
                <p>
                    این محاسبات با استفاده از اطلاعات همودینامیکی، اکوکاردیوگرافی و <strong>تصاویر سی تی و آنژیوگرافی بیمار</strong> بر پایه هوش مصنوعی انجام می گردد. در این روش با استفاده از شبیه سازی های کامپیوتری از روی تصاویر و اطلاعات همودینامیکی، مدلسازی کامپیوتری عروق بیمار ظرف 48 ساعت انجام می شود و بر پایه این محاسبات اطلاعات ذیل برای پزشک به منظور انجام فرآیند دارو درمانی و تست های تشخیصی بعدی در هر دوره درمانی فراهم می گردد:
                </p>
                <ul>
                    <li class="my-2">
                        	<strong>ارزیابی عروق ریز (میکروسکولار) قلب:</strong> این عروق در بخش آنژیوگرافی و با ارزیابی چشمی امکان بررسی ندارند و باید فشار داخل عروق ارزیابی توسط مدل های کامیپوتری بررسی شود.
                            <div style="margin:2rem 0">
                                <div style="text-align:left"><strong>IMR:</strong><span> Index of Microvascular Resistance</span></div>
                                <div style="text-align:left"><strong>TFC:</strong><strong> TIMI Frame Count</strong></div>
                            </div>
                    </li>
                    <li class="my-2">
                        	<strong>ارزیابی اختلال در عملکرد کلیه:</strong> این پارامتر نشان می دهد با توجه دوز استفاده شده از ماده حاجب در بخش آنژیوگرافی و اطلاعات بالینی بیمار چه میزان ممکن است عملکرد کلیه دچار اختلال گردد.
                            <div style="margin:2rem 0">
                                <div style="text-align:left">
                                    <strong>CIN:</strong><span> Risk of Contrast-induced Nephropathy </span>
                                </div>
                                <div style="text-align:left">
                                    <strong>MACD:</strong><span> Maximal Allowable Contrast Dose  </span>

                                </div>
                            </div>


                    </li>
                    <li class="my-2">
                        	<strong>
                                ارزیابی تنگی عروق با درصد متوسط و کم:
                            </strong> این پارامتر تعیین می کند که افت فشار و احتمال پاره شدن پلاگ های چربی کوچک که در تصاویر آنژیوگرافی مشهود است چه میزان ممکن است منجر به ریسک سکته قلبی و مغزی در آینده گردد.
                            <div style="margin:2rem 0">
                                <div style="text-align:left">
                                    <strong>NiFFR:</strong><span> Non-invasive Flow Reserved </span>

                                </div>
                                <div style="text-align:left">
                                    <strong>PTP of CAD:</strong><span> Post-test Probability of CAD  </span>
                                </div>
                            </div>



                    </li>
                    <li class="my-2">
                        	<strong>ارزیابی احتمال توسعه تنگی عروق:</strong> این پارامتر تعیین می کند که احتمال تشکیل تنگی مجدد داخل استنت و یا توسعه تنگی هایی با درصد کم و متوسط در عروق بیمار چه میزان است.
                            <div style="margin:2rem 0">
                                <div style="text-align:left">
                                    <strong>WSS:</strong><span> Wall Shear Stress </span>

                                </div>
                                <div style="text-align:left">
                                    <strong>ISR:</strong><span> Probability of In-stent Restenosis  </span>
                                </div>
                            </div>



                    </li>
                    <li class="my-2">
                        	<strong>ارزیابی احتمال تشکیل ترومبوز یا لخته:</strong> این پارامتر تعیین می کند که احتمال رخدادهای بد قلبی نظیر لخته و ترومبوز در عروق به ویژه داخل استنت در یک دوره سه ماهه اول از انجام آنژیوگرافی چه میزان خواهد بود.
                            <div style="margin:2rem 0">
                                <div style="text-align:left">
                                    <strong>DAPT:</strong><span> Thrombosis Risk  </span>
                                </div>
                            </div>
                    </li>
                </ul>
                <div class="payment d-flex justify-content-center">
                    <a href="https://zarinp.al/455762" class="btn btn-primary btn-lg">
                        ثبت و پرداخت
                    </a>
                </div>
            @endif
           @if(request('step') == 2)

                <p class="mt-4">
                    پس از انجام فرآیند آنژیوگرافی لطفا اطلاعات زیر را تا 3 روز بعد از انجام عمل تحویل کلینیک بفرمایید:
                </p>
                <div>
                    <p>-	اطلاعات اکوکاردیوگرافی </p>
                    <p>-	اطلاعات آزمایش خون </p>
                    <p><strong>-	سی دی آنژیوگرافی </strong></p>

                </div>
                <p>
                    پس از تکمیل فرآیند محاسبات و شبیه سازی های کامپیوتری نتایج در قالب گزارش برای کلینیک ارسال و به بیمار در قالب پیامک ابلاغ خواهد شد. پس از مراجعه، پزشک متخصص نتایج را برای بیمار تفسیر خواهد و سپس در صورت نیاز اقدامات تشخیصی بعدی، دوره درمانی و روند دارو درمانی بر پایه دوز مناسب برای بیمار وضع خواهد شد.
                </p>
                  <div class="payable-amount">
                    <span>مبلغ کل (فنی + اپراتور) قابل پرداخت:</span>
                    <span>2.830.000 تومان</span>
                </div>
                <div class="pay-info-box mt-3">
                    <div class="mb-5 mt-3">
                        <div class="d-flex justify-content-around">
                            <div>
                                مبلغ فنی قابل پرداخت:
                            </div>
                            <div>
                                940.000 تومان
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mt-3">
                            <div>
                                <a href="" class="btn btn-primary">
                                    پرداخت درگاه
                                </a>
                            </div>
                            <div>
                                <a href="" class="btn btn-danger">
                                    شماره کارت
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="mb-5 mt-3">
                        <div class="d-flex justify-content-around">
                            <div>
                                مبلغ اپراتور قابل پرداخت:
                            </div>
                            <div>
                                1.890.000 تومان
                            </div>
                        </div>
                        <p class="text-center">
                            توضیحات: حق حرفه ای تجهیزات محاسباتی (سخت افزاری و پروسیجرال)
                        </p>
                        <div class="d-flex justify-content-around mt-3">
                            <div>
                                <a href="" class="btn btn-primary">
                                    پرداخت درگاه
                                </a>
                            </div>
                            <div>
                                <a href="" class="btn btn-danger">
                                    شماره کارت
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           @endif
        </div>
    </div>
</body>
</html>
