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
                <h2>Settings</h2>
                <a href=" {{ route('app.index') }} " class="btn">Home</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                        <td>View</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Baner</td>
                        <td>
                            <a href=" {{ route('admin.baner.index') }} " style="display: block; text-decoration: none; color: #000; margin-bottom: 10px;">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection