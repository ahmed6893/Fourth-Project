@extends('admin.master')
@section('body')
    <body class="ltr app sidebar-mini">

        <!-- PAGE -->
		<div class="page">
			<div class="page-main">
                <!--app-content open-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">


							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">Invoice-Details</h1>
								</div>
								<div class="ms-auto pageheader-btn">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">Apps</li>
										<li class="breadcrumb-item"><a href="javascript:void(0);">Invoices</a></li>
										<li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<!-- ROW-1 OPEN -->
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="clearfix">
												<div class="float-start">
													<h3 class="card-title mb-0">#INV-773</h3>
												</div>
												<div class="float-end">
													<h3 class="card-title">Date: 21-10-2021</h3>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg-6 ">
													<p class="h3">Invoice Form:</p>
													<address>
														Street, Line<br>
														State, City<br>
														Country, Postal Code<br>
														invoice@spruko.com
													</address>
												</div>
												<div class="col-lg-6 text-end">
													<p class="h3">Invoice To:</p>
													<address>
														Street Address<br>
														State, City<br>
														Country, Postal Code<br>
														invoice@spruko.com
													</address>
												</div>
											</div>
											<div class="table-responsive push">
												<table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
													<tbody><tr class=" ">
														<th class="text-center"></th>
														<th>Item</th>
														<th class="text-center">Quantity</th>
														<th class="text-end">Unit Price</th>
														<th class="text-end">Sub Total</th>
													</tr>
													<tr>
														<td class="text-center">1</td>
														<td>
															<p class="font-w600 mb-1">Website wireframe for 2 pages</p>
															<div class="text-muted"><div class="text-muted">doloremque laudantium unde ut perspiciatis  omnis iste natus voluptatem accusantium Sed error sit </div></div>
														</td>
														<td class="text-center">8</td>
														<td class="text-end">$2240</td>
														<td class="text-end">$4,480</td>
													</tr>
													<tr>
														<td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
														<td class="fw-bold text-end h4">$11,160</td>
													</tr>
												</tbody></table>
											</div>
										</div>
										<div class="card-footer text-end">
											<button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-wallet"></i> Pay Invoice</button>
											<button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>
											<button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
										</div>
									</div>
								</div><!-- COL-END -->
							</div>
							<!-- ROW-1 CLOSED -->


                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
             </div>


        </div>

    </body>
@endsection
