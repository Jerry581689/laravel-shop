@extends('layouts.app')


<br><br>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">您的購物車</div>
                @if(session()->has('cart'))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><img src="{{$product['item']['picture']}}" height="140px" width="120px" /></td>
                            <td>{{$product['item']['name']}}</td>
                            <td>{{$product['item']['price']}}</td>
                            <td class="border px-4 py-2">{{$product['qty']}}</td>
                            <td class="border px-4 py-2">
                                <a class="btn btn-outline-info" href="/shop/public/increase-one-item/{{$product['item']['id']}}">+</a>
                                <a class="btn btn-outline-info" href="/shop/public/decrease-one-item/{{$product['item']['id']}}">-</a>
                                <a class="btn btn-outline-info" href="/shop/public/remove-item/{{$product['item']['id']}}">Remove</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                @else
                <center>
                    <p>購物車是空的</p>
                </center>
                @endif
                <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                <h4>總共 {{ $totalQty}} 樣 , Total : $ {{ $totalPrice}}</h4>
                <div class="flex justify-end mt-4" style="text-align:right">
                    <a href="/shop/public/clear-cart" class="btn btn-outline-info">清除購物車</a>
                </div>
            </div>
        </div>
    </div>

</div>
<main class="py-4">
    @yield('content')
</main>