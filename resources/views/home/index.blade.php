@extends('layout.main')
@section('tite', 'APIs')
@section('active-api', 'selected')
@section('links')
    <link rel="stylesheet" href="">
@endsection

@section('content')
    {{-- Auth API --}}
    <h3>Auth APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1000px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/auth/login</td>
                    <td>user login</td>
                    <td>POST</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.authLogin'))}}" >show Example</a></td>
                </tr>
           </tbody>
        </table>
    </div>
    <hr>
    {{-- ----------------- --}}

    {{-- Users API --}}
    <h3>Users APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1200px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/user</td>
                    <td>list all users</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.userList'))}}" >show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/user/{id}</td>
                    <td>find user by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.userSingle'))}}" >show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/user</td>
                    <td>create new user</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.userCreate'))}}" >show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/user/update/{id}</td>
                    <td>update user</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.userUpdate'))}}" >show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/user/{id}</td>
                    <td>delete user</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.userDelete'))}}" >show Example</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>Note: admin@mail.com is protected from deleting or updateing</p>
    <hr>
    {{-- ----------------- --}}

    {{-- Restaurant Categories API --}}
    <h3>Restaurant Categories APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1330px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/restaurant-category</td>
                    <td>list all restaurant categories</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.restaurantCategoryList'))}}" >show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/restaurant-category/{id}</td>
                    <td>find restaurant category by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.restaurantCategorySingle'))}}" >show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant-category</td>
                    <td>create new restaurant category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantCategoryCreate'))}}" >show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant-category/update/{id}</td>
                    <td>update restaurant category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantCategoryUpdate'))}}" >show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant-category/{id}</td>
                    <td>delete restaurant category</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantCategoryDelete'))}}" >show Example</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    {{-- ----------------- --}}

    {{-- Restaurant API --}}
    <h3>Restaurant APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1450px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/restaurant</td>
                    <td>list all restaurants</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.restaurantList'))}}">show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/restaurant/{id}</td>
                    <td>find restaurant by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.restaurantSingle'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant</td>
                    <td>create new restaurant</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantCreate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant/update/{id}</td>
                    <td>update restaurant category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantUpdate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/restaurant/{id}</td>
                    <td>delete restaurant</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.restaurantDelete'))}}">show Example</a></td>
                </tr>
                <tr class="filter">
                    <td>{{ url('') }}/api/restaurant/filter-by-category/{id}</td>
                    <td>filter restaurant by restaurant category id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.restaurantFilterByCategory'))}}">show Example</a></td>
                </tr>

            </tbody>
        </table>
    </div>
    <p>Note: if restaurant category deleted , so all restaurants belong to it will be delete </p>
    <hr>
    {{-- ----------------- --}}

    {{-- Product Categories API --}}
    <h3>Product Categories APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1300px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/product-category</td>
                    <td>list all product categories</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.productCategoryList'))}}">show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/product-category/{id}</td>
                    <td>find product category by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.prodcutCategorySingle'))}}">show Example</a></td>
                </tr>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product-category</td>
                    <td>create new product category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutCategoryCreate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product-category/update/{id}</td>
                    <td>update product category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutCategoryUpdate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product-category/{id}</td>
                    <td>delete product category</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutCategoryDelete'))}}">show Example</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    {{-- ----------------- --}}

    {{-- Products API --}}
    <h3>Product APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1850px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/product</td>
                    <td>list all products</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.productList'))}}">show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/product/{id}</td>
                    <td>find product by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.prodcutSingle'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product</td>
                    <td>create new product</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutCreate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product/update/{id}</td>
                    <td>update product category</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutUpdate'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/product/{id}</td>
                    <td>delete product</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.prodcutDelete'))}}">show Example</a></td>
                </tr>
                <tr class="filter">
                    <td>{{ url('') }}/api/product/filter-by-category/{id}</td>
                    <td>filter product by product category id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.prodcutFilterByCategory'))}}">show Example</a></td>
                </tr>
                <tr class="filter">
                    <td>{{ url('') }}/api/product/filter-by-restaurant/{id}</td>
                    <td>filter product by restaurant id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.prodcutFilterByRestaurant'))}}">show Example</a></td>
                </tr>
                <tr class="filter">
                    <td>{{ url('') }}/api/product/filter-by-category/{category_id}/and-restaurant/{restaurant_id}</td>
                    <td>filter product by product category id and restaurant id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.prodcutFilterByCategoryAndRestaurant'))}}">show Example</a></td>
                </tr>

            </tbody>
        </table>
    </div>
    <p>Note: if product category deleted , so all products belong to it will be delete </p>
    <hr>
    {{-- ----------------- --}}

    {{-- Order API --}}
    <h3>Order APIs</h3>
    <div class="table-container">
        <table class="table" style="width:1100px">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Actoin</th>
                    <th>Method</th>
                    <th>Content-Type</th>
                    <th>Authorized</th>
                    <th>Exaample</th>
                </tr>
            </thead>
            <tbody>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/order</td>
                    <td>list all order</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.orderList'))}}">show Example</a></td>
                </tr>
                <tr class="not-protect">
                    <td>{{ url('') }}/api/order/{id}</td>
                    <td>find order by id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.orderSingle'))}}">show Example</a></td>
                </tr>
                <tr class="protect">
                    <td>{{ url('') }}/api/order</td>
                    <td>create new order</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>admin only</td>
                    <td><a href="{{url(route('example.orderCreate'))}}">show Example</a></td>
                </tr>
                <tr class="disabled">
                    <td>{{ url('') }}/api/order/update/{id}</td>
                    <td>update order</td>
                    <td>POST</td>
                    <td>form-data</td>
                    <td>disabled</td>
                    {{-- <td><a href="">show Example</a></td> --}}
                    <td>---</td>
                </tr>
                <tr class="disabled">
                    <td>{{ url('') }}/api/order/{id}</td>
                    <td>delete order</td>
                    <td>DELTE</td>
                    <td>form-data</td>
                    <td>disabled</td>
                    {{-- <td><a href="">show Example</a></td> --}}
                    <td>---</td>
                </tr>
                <tr class="filter">
                    <td>{{ url('') }}/api/order/filter-by-user/{id}</td>
                    <td>filter order by user id</td>
                    <td>GET</td>
                    <td>---</td>
                    <td>any</td>
                    <td><a href="{{url(route('example.orderFilterByUser'))}}">show Example</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr><br>
    <br><br><br><br>
    {{-- ----------------- --}}

@endsection
