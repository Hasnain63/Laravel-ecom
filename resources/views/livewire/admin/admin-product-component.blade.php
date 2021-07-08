<div>
    <style>
    nav svg {
        height: 20px;
    }

    nav .hidden {
        display: block !important;
    }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add New
                                    Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body"></div>
                    @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Product slug</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->slug}}</td>
                                <td> <img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60" />
                                </td>
                                <td>{{$product->stock_status}}</td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}">Edit</a>
                                    <a class="btn btn-danger" href="#"
                                        wire:click.prevent="deleteCategory({{$product->id}})">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>


    </div>
</div>