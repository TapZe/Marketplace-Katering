<!DOCTYPE html>
<html lang="en">

@include('auth.layout.header')

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">
                                        <img style="width: 100%; height: 100%; object-fit: cover;"
                                            src="{{ asset('images/MK Logo.jpg') }}" alt="Image">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">Marketplace
                                            <span>Katering</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Lakukan verifikasi email terlebih dahulu!</h5>
                                        <form action="{{ route('verification.send') }}" method="post" autocomplete="off">
                                            @csrf
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Kirim Ulang Email</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i data-feather="alert-circle"></i>
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i data-feather="alert-circle"></i>
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="btn-close"></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('auth.layout.costumScript')

</body>

</html>
