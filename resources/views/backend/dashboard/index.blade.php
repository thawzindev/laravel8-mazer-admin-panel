@extends('backend.layouts.master')


@section('heading')
	<h3>Dashboard</h3>
@endsection

@section('content')

	<section class="row">
			<div class="col-12 col-lg-12">
				<div class="row">
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon purple">
											<i class="iconly-boldShow"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Profile Views</h6>
										<h6 class="font-extrabold mb-0">112.000</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon blue">
											<i class="iconly-boldProfile"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Followers</h6>
										<h6 class="font-extrabold mb-0">183.000</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 col-lg-4 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon blue">
											<i class="iconly-boldProfile"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Followers</h6>
										<h6 class="font-extrabold mb-0">183.000</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>Profile Visit</h4>
							</div>
							<div class="card-body">
								<div id="chart-profile-visit"></div>
							</div>
						</div>
					</div>
				</div>
				

</div>
</section>

@endsection