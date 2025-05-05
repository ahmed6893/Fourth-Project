@extends('admin.master')
@section('body')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Product</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details </li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
        
                <!--ROW OPENED-->
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-body project-list-table-container">
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 table-bordered border-top border-bottom project-list-main">
                                        <tr>
                                            <th>Product ID</th>
                                            <td>{{ $product->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Product Name</th>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                         
                                        <tr>
                                            <th>Product Code</th>
                                            <td>{{ $product->code }}</td>
                                        </tr>
                                         
                                        <tr>
                                            <th>Product Category</th>
                                            <td>{{ $product->category->name }}</td>
                                        </tr>
                                      
                                        <tr>
                                            <th>Product Sub Category</th>
                                            <td>{{ $product->subCategory->name }}</td>
                                        </tr>
                                       
                                        <tr>
                                            <th>Product Unit</th>
                                            <td>{{ $product->unit->name }}</td>
                                        </tr>
                                     
                                        <tr>
                                            <th>Product Color</th>
                                            <td>
                                                @foreach ($product->productColors as $productColor )
                                                    {{ $productColor->color->name }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Product Size</th>
                                            <td>
                                                @foreach ($product->productSizes as $productSize )
                                                    {{ $productSize->size->name }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Meta Title</th>
                                            <td>{{ $product->meta_title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meta Description</th>
                                            <td>{{ $product->meta_description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Regular Price</th>
                                            <td>{{ $product->regular_price }}</td>
                                        </tr>
                                        <tr>
                                            <th>Selling Price</th>
                                            <td>{{ $product->selling_price }}</td>
                                        </tr>
                                        <tr>
                                            <th>Short Description</th>
                                            <td>{{ $product->short_description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Long Description</th>
                                            <td>{!! $product->long_description !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Stock Amount</th>
                                            <td>{{ $product->stock_amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total View </th>
                                            <td>{{ $product->hit_count }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Sales </th>
                                            <td>{{ $product->sales_count }}</td>
                                        </tr>
                                        <tr>
                                            <th>Featured Status </th>
                                            <td>{{ $product->featured_status == 0 ? 'No Featured' : 'Featured' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Product Image </th>
                                            <td><img src="{{ asset($product->product_image) }}" alt="NO Image" height="180px"></td>
                                        </tr>
                                        <tr>
                                            <th>Product Other Images </th>
                                            <td>
                                                @foreach ($product->productImages as $productImage)
                                                <img src="{{ asset($productImage->image) }}" alt="NO Image" height="180px">
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>
                <!--ROW CLOSED-->


            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
