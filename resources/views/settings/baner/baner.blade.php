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
                <h2>Baners</h2>
                <a href=" {{ route('baner.create') }} " class="btn">Add New Baner</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Image</td>
                        <td>Title</td>
                        <td>Desc</td>
                        <td>Value</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>

                <tbody>
                @foreach($baners as $baner)

                    <tr>
                        <td> {{ $loop->index + 1}} </td>
                        <td><img src="{{asset('assets/imgs')}}/{{$baner->image}}" alt=""></td>
                        <td> {{ $baner->title }} </td>
                        <td> {{ $baner->desc }} </td>
                        <td> {{ $baner->value }} </td>
                        <td>
                            <a href=" {{ route('baner.edit', $baner->id) }} " style="display: block; text-decoration: none; color: #000; margin-bottom: 10px;">Edit</a>

                        </td>
                        <td>
                            <form action=" {{ route('baner.destroy', $baner->id) }} " method="POST" style="margin: 0;">
                                @csrf
                                @method('delete')
                                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; color: #000;">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
