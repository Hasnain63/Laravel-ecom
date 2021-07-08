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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New
                                    Category</a>
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
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}">Edit</a>
                                    <a class="btn btn-danger" href="#"
                                        wire:click.prevent="deleteCategory({{$category->id}})">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>


    </div>
</div>