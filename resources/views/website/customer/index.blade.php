@extends('website.master');
@section('body')

    <!--====== Profile Start ======-->
    <section class="profile-wrapper pt-50 pb-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
          @foreach ($orders as $order)
                <div class="profile">
              <div class="profile-header">
                <div
                  class="profile-cover-photo bg_cover"
                  style="background-image: url({{asset('/')}}website/assets/images/profile-cover.png)"
                ></div>
                <div
                  class="profile-author d-sm-flex flex-row-reverse justify-content-between align-items-end"
                >
                  <div class="profile-photo">
                    <img
                      src="{{asset('/')}}website/assets/images/profile-photo.png"
                      alt="Profile Photo"
                    />
                  </div>
                  <div class="profile-name">
                    <h4 class="name">Musa Ahmed</h4>
                    <p class="email">musa@email.com</p>
                  </div>
                </div>
              </div>
              <div class="profile-body">
                <div class="profile-title">
                  <h5 class="title">Personal Details</h5>
                  <a class="profile-link" href="javascript:void(0)">edit</a>
                </div>
                <div class="profile-details">
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">User Full Name:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>Musa Ahmed</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Email:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>musa@email.com</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Phone:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>+123 456 789 0234</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Address:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>Company Inc., 8901 Marmora Road, Glasgow, D04 89GR.</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Gender:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>Male</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Birthday:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>04 January 1992</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="profile-footer mt-45">
                <div class="profile-title">
                  <h5 class="title">Cards</h5>
                  <a class="profile-link" href="javascript:void(0)"
                    >Add Cards</a
                  >
                </div>
                <div class="profile-card-info">
                  <div class="row">
                    <div class="col-md-4 col-sm-6">
                      <div class="single-card-info d-flex">
                        <div class="card-icon">
                          <img src="assets/images/visa.png" alt="Card" />
                        </div>
                        <div class="card-info media-body">
                          <h5 class="card-name">Musa Ahmed</h5>
                          <p class="card-number">
                            .... 4534 <span>02/20</span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <div class="single-card-info d-flex">
                        <div class="card-icon">
                          <img
                            src="assets/images/american-express.png"
                            alt="Card"
                          />
                        </div>
                        <div class="card-info media-body">
                          <h5 class="card-name">Musa Ahmed</h5>
                          <p class="card-number">
                            .... 4534 <span>02/20</span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <div class="single-card-info d-flex">
                        <div class="card-icon">
                          <img src="assets/images/mastercard.png" alt="Card" />
                        </div>
                        <div class="card-info media-body">
                          <h5 class="card-name">Musa Ahmed</h5>
                          <p class="card-number">
                            .... 4534 <span>02/20</span>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        
          </div>
        </div>
      </div>
    </section>
    <!--====== Profile Ends ======-->

    <!--====== Clients Logo Part Start ======-->
    <section class="clients-logo-section pt-70 pb-70">
      <div class="container">
        <div class="row client-logo-active">
          <div class="col-lg-3">
            <div class="single-logo-wrapper">
              <img src="assets/images/client-logo/uideck-logo.svg" alt="" />
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-logo-wrapper">
              <img src="assets/images/client-logo/graygrids-logo.svg" alt="" />
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-logo-wrapper">
              <img src="assets/images/client-logo/lineicons-logo.svg" alt="" />
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-logo-wrapper">
              <img src="assets/images/client-logo/pagebulb-logo.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--====== Clients Logo Part Ends ======-->

@endsection
