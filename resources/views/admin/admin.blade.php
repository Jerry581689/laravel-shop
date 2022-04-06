@extends('layouts.app')

<button type="button" class="btn btn-outline-info btn-lg btn-block" data-toggle="modal" data-target="#addproductModal" data-whatever="@mdo">新增商品</button>
<!-- 新增modal -->
<div class="modal fade" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">新增商品</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="product-name" class="col-form-label">商品名稱:</label>
                        <input type="text" class="form-control" id="product-name">
                    </div>
                    <div class="form-group">
                        <label for="product-price" class="col-form-label">商品價錢:</label>
                        <input type="text" class="form-control" id="product-price">
                    </div>
                    <div class="form-group">
                        <label for="product-content" class="col-form-label">商品內容:</label>
                        <input type="text" class="form-control" id="product-content">
                    </div>
                    <div class="form-group">
                        <label for="product-picture" class="col-form-label">商品圖片網址:</label>
                        <input type="text" class="form-control" id="product-picture">
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                <button type="button" class="btn btn-primary" id="checkaddproductbutton">送出</button>
            </div>
        </div>
    </div>
</div>
<!-- 修改modal -->
<div class="modal fade" id="editproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改商品</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="product-name" class="col-form-label">商品名稱:</label>
                        <input type="text" class="form-control" readonly="readonly" id="edit-name">
                    </div>
                    <div class="form-group">
                        <label for="product-price" class="col-form-label">商品價錢:</label>
                        <input type="text" class="form-control" id="edit-price">
                    </div>
                    <div class="form-group">
                        <label for="product-content" class="col-form-label">商品內容:</label>
                        <input type="text" class="form-control" readonly="readonly" id="edit-content">
                    </div>
                    <!-- <div class="form-group">
                        <label for="product-picture" class="col-form-label">商品圖片網址:</label>
                        <input type="text" class="form-control" readonly="readonly"  id="edit-picture">
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                <button type="button" class="btn btn-primary" id="CheckEditproductbutton">送出</button>
            </div>
        </div>
    </div>
</div>


<table class="table table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col" width="200px">ProductID</th>
            <th scope="col">ProductName</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td width="150px">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editproductModal" data-whatever="{{ $product->price }}" data-what="{{ $product->id }}" data-name="{{ $product->name }}" data-content="{{ $product->content }}">修改</button>
                <button type="button" class="btn btn-outline-danger" data-id="{{ $product->id }}" id="deleteid">刪除</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>