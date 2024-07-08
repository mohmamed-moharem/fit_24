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
                <h2>Update New Baner</h2>
                <a href=" {{ route('admin.categores.index') }} " class="btn">Baners Home Page</a>
            </div>

            <form action=" {{ route('baner.update', $baner->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label for="name">Title</label>
                    <input type="text" id="name" name="title" placeholder="Baner Title" value="{{$baner->title}}">
                    @error('title')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="slug">Description</label>
                    <input type="text" id="slug" name="desctiption" placeholder="Baner Description" value="{{$baner->desc}}">
                    @error('desctiption')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="slug">Value</label>
                    <input type="text" id="slug" name="Value" placeholder="Value" value="{{$baner->value}}">
                    @error('Value')
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
                    <button type="submit">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection
