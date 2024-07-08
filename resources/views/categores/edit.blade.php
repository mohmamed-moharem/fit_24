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
                <h2>Categore edit</h2>
                <a href=" {{ route('admin.categores.index') }} " class="btn">Categores Home Page</a>
            </div>

            <form action=" {{ route('category.update', $categore->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" placeholder="Category Name" value=" {{ $categore->name }} ">
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="slug">slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Category slug" value=" {{ $categore->slug }} ">
                    @error('slug')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="image">select image</label>
                    <input type="file" id="image" name="image" placeholder="Category Name" value=" {{ $categore->image }} ">
                    @error('image')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <button type="submit">update</button>
                </div>
            </form>
        </div>
        <!-- ================= New Customers ================ -->
        {{-- <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>

                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>
                </table>
            </div> --}}
    </div>
</div>
@endsection