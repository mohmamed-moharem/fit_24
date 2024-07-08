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
                <h2>Categores</h2>
                <a href=" {{ route('category.create') }} " class="btn">Add New Category</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Categore Name</td>
                        <td>Slug</td>
                        <td>Image</td>
                        <td>actions</td>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categores as $categore)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $categore->name }} </td>
                            <td> {{ $categore->slug }} </td>
                            <td><img src="{{ asset('assets/imgs') }}/{{ $categore->image }}" alt=""></td>
                            <td>
                                <a href=" {{ route('category.show', $categore->id) }} " style="display: block; text-decoration: none; color: #000; margin-bottom: 10px;">view</a>
                                <a href=" {{ route('category.edit', $categore->id) }} " style="display: block; text-decoration: none; color: #000; margin-bottom: 10px;">Edit</a>
                                <form action=" {{ route('category.destroy', $categore->id) }} " style="margin: 0;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="background: none; border: none; padding: 0; margin: 0; color: #000;">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <p>No Categores Avaliable</p>
                    @endforelse

                </tbody>
            </table>
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
