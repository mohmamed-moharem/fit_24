@extends('layouts.admin')
@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <!-- <ion-icon name="menu-outline"></ion-icon> -->
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <!-- <ion-icon name="search-outline"></ion-icon> -->
            </label>
        </div>

        <div class="user">
            <img src="assets/imgs/customer01.jpg" alt="">
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Categores create</h2>
                <a href=" {{ route('admin.categores.index') }} " class="btn">Categore Home Page</a>
            </div>

            <form action=" {{ route('category.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-control">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" placeholder="Category Name">
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="slug">slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Category slug">
                    @error('slug')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="image">select image</label>
                    <input type="file" id="image" name="image" placeholder="Category Name">
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <button type="submit">save</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection