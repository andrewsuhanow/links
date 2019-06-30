@extends('common.layouts.main_block')











@section('content')



    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        {{--<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>--}}
        <input class="form-control main_input w-100" type="text" placeholder="Enter link" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>


    <div class="container-fluid " >
        <div class="row">
                <div class="categories_block">
                    <div  >
                        <div class="jumbotron shadow p-3 categories_sub_block">
                            <h1>Name</h1>
                            <a class="lead"> <b>Link:</b> "This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page."</a>
                        </div>
                    </div>
                    <div  >
                        <div class="jumbotron shadow p-3 categories_sub_block">
                            <h1>Name</h1>
                            <a class="lead"> <b>Link:</b> "This example is a quick exercise to illustrate how the top-aligned navbar works. As you scroll, this navbar remains in its original position and moves with the rest of the page."</a>
                        </div>
                    </div>

                </div>
        </div>
    </div>

@stop


@section('styles')

    <style>

        .categories_block{
            /*position: fixed;*/
            background: #84c183;
            min-height: 100vh;
            /*width: 100%;*/
            padding: 50px;
        }

        .categories_sub_block{
            background: #006514;
        }


    </style>

@stop


@section('scripts')



@stop
