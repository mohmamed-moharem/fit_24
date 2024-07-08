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
                <h2>Messages</h2>
                <a href="#" class="btn">View All</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Supject</td>
                        <td>Message</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td> {{ $loop->index + 1 }} </td>
                        <td> {{ $message->name }} </td>
                        <td> {{ $message->email }} </td>
                        <td> {{ $message->phone }} </td>
                        <td> {{ $message->subject }} </td>
                        <td> {{ $message->message }} </td>
                        <td>
                            @if($message->status == 'unreded')
                            <form action=" {{ route('message.update', $message->id) }} " method="POST">
                                @csrf
                                @method('put')
                                <button class="status return" type="submit">unrededd</button>
                            </form>
                            @else
                            <span class="status delivered" >rededd</span>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection