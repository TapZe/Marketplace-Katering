<html lang="en">

@include('hero.layout.header')

<body>
    <div class="main-wrapper">

        @include('hero.layout.navbar')

        <div class="page-wrapper">

            <div class="page-content">

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="position-relative">
                                <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                                    <img src="{{ asset('images/Cover Full.png') }}"class="rounded-top"
                                        alt="cover">
                                </figure>
                                <div
                                    class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                                    <div>
                                        <img class="wd-70 rounded-circle" src="{{ asset('images/MK Logo.jpg') }}"
                                            alt="profile">
                                    </div>
                                    <div class="d-none d-md-block">
                                        <a class="btn btn-primary btn-icon-text" href="{{ route('login') }}" target="_blank">
                                            <i data-feather="user" class="btn-icon-prepend"></i> Join Us Now!
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center p-3 rounded-bottom">
                                <ul class="d-flex align-items-center m-0 p-0">
                                    <li class="d-flex align-items-center active">
                                        <i class="me-1 icon-md text-primary" data-feather="info"></i>
                                        <p class="pt-1px d-none d-md-block text-primary">About Us</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row profile-body">
                    <!-- left wrapper start -->
                    <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                        <div class="card rounded">
                            <div class="card-body">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius aperiam necessitatibus dolores? Sed velit non ad esse labore facere ut, accusamus dolores tenetur vel in dignissimos, perferendis laborum aut quae!.</p>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Started since:</label>
                                    <p class="text-muted">16 July 2024</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Our Office:</label>
                                    <p class="text-muted">Jakarta, Indonesia</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                    <p class="text-muted">MKOffice@gmail.com</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                                    <p class="text-muted">www.MarketplaceKatering.com</p>
                                </div>
                                <div class="mt-3 d-flex social-links">
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- left wrapper end -->
                    <!-- middle wrapper start -->
                    <div class="col-md-8 col-xl-6 middle-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card rounded">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="img-xs rounded-circle"
                                                    src="https://via.placeholder.com/37x37" alt="">
                                                <div class="ms-2">
                                                    <p>Mike Popescu</p>
                                                    <p class="tx-11 text-muted">1 min ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Accusamus minima delectus nemo unde quae recusandae assumenda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- middle wrapper end -->
                    <!-- right wrapper start -->
                    <div class="d-none d-xl-block col-xl-3">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card rounded">
                                    <div class="card-body">
                                        <h6 class="card-title">Latest Menu Photos</h6>
                                        <div class="row ms-0 me-0">
                                            <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                                <figure class="mb-2">
                                                    <img class="img-fluid rounded"
                                                        src="https://via.placeholder.com/96x96" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right wrapper end -->
                </div>

            </div>

            @include('hero.layout.footer')

        </div>
    </div>

    @include('hero.layout.costumScript')

</body>

</html>
