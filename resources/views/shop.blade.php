@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">

            <!-- <h1 class="my-4">Apple</h1> -->
            <!-- <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div> -->
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox" width="100%" height="1000">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="https://www.apple.com/v/iphone-12-pro/d/images/meta/iphone-12-pro_specs__f12v7vvx042m_og.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="https://i1.wp.com/sc.myfone.taiwanmobile.com/website_twmf/uploads/cute/buy/558p985/blog/Y2009/iphone12/2.jpg?resize=747%2C420&ssl=1" alt="Second slide" width="100%" height="90">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="https://bnextmedia.s3.hicloud.net.tw/image/album/2020-10/img-1602651709-90528@900.jpg" alt="Third slide" width="100%" height="90">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src=" {{ $product->picture}} " alt="" width="250" height="300"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ $product->name }}</a>
                            </h4>
                            <h5>${{ $product->price }}</h5>
                            <p class="card-text">{{ $product->content }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                        <button class="btn btn-outline-info buybutton" aria-pressed="true" type="submit" value="{{$product->id}}">Buy</button>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


</body>
@endsection

</html>