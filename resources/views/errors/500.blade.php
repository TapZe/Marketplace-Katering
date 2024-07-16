<!DOCTYPE html>
<html lang="en">

@include('errors.layout.header')

<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
						<img src="{{ asset('style/merchantStyle/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
						<h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">500</h1>
						<h4 class="mb-2">Internal server error</h4>
						<h6 class="text-muted mb-3 text-center">Mohon maaf. Terdapat masalah pada halaman tersebut.</h6>
						<a href="{{ route('login') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	@include('errors.layout.costumScript')

</body>
</html>
