@extends('admin.master')
@section('body')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <<!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Create New User </h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">All User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create User</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!--ROW OPENED-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div  class="card">
                            <div class="card-body p-5 create-project-main">

                                <!-- Header Title + Right Side Button -->
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4 class="m-0">All User</h4>
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-secondary">
                                         Back to List
                                    </a>
                                </div>
                                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">User Name:</label>
                                        <input name="name" type="text" class="form-control text-dark" placeholder="Enter User Name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">User Email:</label>
                                        <input name="email" type="email" class="form-control text-dark" placeholder="Enter Email Name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">User Password:</label>
                                        <input name="password" type="password" class="form-control text-dark" placeholder="Enter Password Name">
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Add Image:</label>
                                        <input type="file" class="dropify" data-bs-height="100" name="image" />
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="text-end">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fe fe-check-circle"></i> Save
                                    </button>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <!--ROW CLOSED-->
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
