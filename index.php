<?php include('inc/config.php'); ?>
<?php include('inc/Api.php'); ?>

<!doctype html>
<html lang="<?= $site_lang ?>" dir="<?= $site_direction ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $website_description ?>">
    <meta name="keywords" content="<?= $website_keywords ?>">
    <meta name="author" content="<?= $website_author ?>">
    <meta name="generator" content="<?= $website_generator ?>">
    <link rel="canonical" href="<?= $website_canonical ?>">
    <title><?= $website_title ?></title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.rtl.min.css?v<?= $website_generator ?>" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>
    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">فحص ايبي جديد</h1>
                    <p class="lead text-muted">
                    <form action="ip.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="scan" class="form-control" placeholder="IP OR DOMAIN" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">فحص</button>
                        </div>
                    </form>
                    </p>
                    <p>
                        <span class="btn btn-secondary my-2">مرات الفحص
                            <?php echo $details->completed_requests; ?></span>
                    </p>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">بيانات الزائر

                                    <li class="list-group-item d-flex justify-content-between align-items-center">الايبي
                                        <span class="badge bg-success rounded-pill"><?php echo $details->ip; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">دولته
                                        <span class="badge bg-success rounded-pill"><?php echo $details->country; ?>
                                            ,<span><?php echo $details->country_code; ?> <img id="home" src="flags/4x3/<?php echo strtolower("$details->country_code"); ?>.svg"></span></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">مدينته
                                        <span class="badge bg-success rounded-pill c1"><?php echo $details->city; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">منطقته
                                        <span class="badge bg-success rounded-pill c1"><?php echo $details->region; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        المتصفح

                                        <span class="badge bg-success rounded-pill">
                                            <?php
                                            $agent = $_SERVER["HTTP_USER_AGENT"];

                                            if (preg_match('/MSIE (\d+\.\d+);/', $agent)) {
                                                echo "IE";
                                            } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent)) {
                                                echo "Chrome";
                                            } else if (preg_match('/Edge\/\d+/', $agent)) {
                                                echo "Edge";
                                            } else if (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
                                                echo "Firefox";
                                            } else if (preg_match('/OPR[\/\s](\d+\.\d+)/', $agent)) {
                                                echo "Opera";
                                            } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent)) {
                                                echo "Safari";
                                            } else if (preg_match('/UCBrowser[\/\s](\d+\.\d+)/', $agent)) {
                                                echo "UCBrowser";
                                            }
                                            ?>
                                        </span>

                                    </li>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">الشبكة
                                    <li class="list-group-item d-flex justify-content-between align-items-center">شركة
                                        الاتصالات <span class="badge bg-success rounded-pill c1"><?php echo $details->org; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">مزود
                                        الانترنت <span class="badge bg-success rounded-pill c1"><?php echo substr("$details->isp", 4); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">رمز
                                        الشبكة <span class="badge bg-success rounded-pill c1"><?php echo $details->asn; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">نوع
                                        الايبي <span class="badge bg-success rounded-pill c1"><?php echo $details->type; ?></span>
                                    </li>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">
                                    بيانات البلد
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">الدولة
                                        <span class="badge bg-success rounded-pill"><?php echo $details->country; ?> ,
                                            <?php echo $details->country_code; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">عاصمة
                                        البلد
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->country_capital; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">هاتف
                                        الدولة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->country_phone; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">عملة
                                        البلد
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->currency; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">دول
                                        محيطة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->country_neighbours; ?></b></span>
                                    </li>

                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">
                                    تفاصيل العملة
                                    <li class="list-group-item d-flex justify-content-between align-items-center">كود
                                        العملة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->currency_code; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">مسمى
                                        العملة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->currency_symbol; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">سعر
                                        الصرف
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->currency_rates; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">نطق
                                        العملة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->currency_plural; ?></b></span>
                                    </li>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">
                                    النطاق الجغرافي
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        التوقيت
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->timezone; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">فارق
                                        التوقيت
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->timezone_gmt; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">مسمى
                                        التوقيت
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->timezone_name; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">يقع في
                                        قارة
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->continent; ?>,
                                                <?php echo $details->continent_code; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">خط
                                        الطول
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->latitude; ?></b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">خط
                                        العرض
                                        <span class="badge bg-success rounded-pill"><b><?php echo $details->longitude; ?></b></span>
                                    </li>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">
                                    الخريطة
                                    <br> <br>
                                    <iframe src="https://maps.google.com/maps?q=<?php echo $details->latitude; ?>,<?php echo $details->longitude; ?>&hl=ar;z=10&amp;output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">عرض
                                            الاتجاه</button>
                                    </div>
                                    <small class="text-muted"><a href="https://maps.google.com/maps?q=<?php echo $details->latitude; ?>,<?php echo $details->longitude; ?>&hl=ar;z=10&amp;">ذهاب
                                            الان</a></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">


                            <div class="card-body">
                                <p class="card-text">
                                    تفاصيل جهازك
                                <p dir="ltr">
                                    <?php echo $ua; ?></p>
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-text">
                                    مرات الفحص
                                    <?php echo $details->completed_requests; ?>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">عد إلى الأعلى</a>
            </p>
            <p class="mb-1">نظام التحقق من ip و domain</p>
            <p class="mb-0">من تطوير وبرمجة <a href="mailto:admin@aljup.com"> محمد الجيلاني </a> / <a href="https://github.com/aljailane"> مشاريع github </a>.</p>
        </div>
    </footer>

</body>

</html>