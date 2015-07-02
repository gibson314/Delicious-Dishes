@extends('layouts.master')

@section('content')
    {{--<div class="hero-unit">--}}
        {{--<h1>Hello, world!</h1>--}}
        {{--<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>--}}
        {{--<p><a href="http://v2.bootcss.com/examples/hero.html#" class="btn btn-primary btn-large">Learn more »</a></p>--}}
    {{--</div>--}}
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="carousel slide" id="carousel-743797">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-743797">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-743797">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-743797">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="{{ url('dishes') }}"><img alt="" src="../resources/imagines/home/index-img1.jpg" /></a><br/>
                            <div class="carousel-caption">
                                <h4>
                                    棒球
                                </h4>
                                <p>
                                    棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="../resources/imagines/home/index-img2.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    冲浪
                                </h4>
                                <p>
                                    冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="../resources/imagines/home/index-img3.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    自行车
                                </h4>
                                <p>
                                    以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。
                                </p>
                            </div>
                        </div>
                    </div> <a data-slide="prev" href="#carousel-743797" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-743797" class="right carousel-control">›</a>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Marketing stuff!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <a class="btn btn-large btn-success" href="#">Get started today</a>
    </div>

    <hr>

    <!-- Example row of columns -->
    <div class="row-fluid">
        <div class="span4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    <div class="footer">
        <p>&copy; Company 2013</p>
    </div>

    </div> <!-- /container -->



@endsection