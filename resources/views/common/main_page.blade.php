@extends('common.layouts.main_block')











@section('content')

{{--<div class="contant-main-page " >--}}

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        {{--<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>--}}
        <input id="new_link" class="form-control main_input w-100" type="text" placeholder="Enter link" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <div class="nav-link save-link" href="#">Save link  </div>
            </li>
        </ul>
    </nav>


    <div class="container-fluid " >
        <div class="row">
            <div class="categories_block" >
                <div class="push-effect">

                    @forelse($aBDLinks as $kay => $itBDLinks)

                        <div class="jumbotron shadow p-3 categories_sub_block" id="link_{{$itBDLinks->id}}">
                               {{$itBDLinks->id}}
                            <div class="container-fluid " >
                                <div class="row">
                                    <div class="col-10 name">
                                        <h1>{{$itBDLinks->name}}</h1>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-danger">Delete</button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-dark edit_link" id="{{$itBDLinks->id}}" data-toggle="modal" data-target="#ModalEdit">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="description"> {{$itBDLinks->description}} </div>
                            <a class="lead"> <b>Link:</b>  {{$itBDLinks->link}}</a>
                        </div>

                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

{{--</div>--}}

    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit link</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                        <input class="main_input w-100 change_name" type="text" placeholder="Enter link" >
                        <input class="main_input w-100 change_link" type="text" placeholder="Enter link" >
                        <input class="main_input w-100 change_description" type="text" placeholder="Enter link" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop


@section('styles')

    <style>


        .contant-main-page{

        }
        .categories_block{
            /*background: #5c430f;*/
            background: linear-gradient(45deg, #302e52, #494db0);
            min-height: 100vh;
            min-width: 100vw;
            padding: 50px;
        }

        .push-effect{
            border: 10px solid rgba(0,0,0,0.2);
            border-radius: 20px;
            border-color: #494db0;


        }

        .categories_sub_block{
            background: linear-gradient(90deg, #31357a, #313158);
            /*border: 6px double black;*/
            border-color: #6382ff;
            border-style: solid;
            color: #6382ff;

        }

        .description{
            color: #f8f9fa;
            border: 1px;
            border-color: #4c4cff;
            border-style: solid;
            padding: 7px;
            min-height: 50px;
        }




    </style>

@stop


@section('scripts')

    <script>

        var _token = '{{ csrf_token() }}';

        $(function () {

            // $('.categories_block').html('ddddddddddddddddd');


            $('.save-link').bind('click', function () {

                var newLink = $('#new_link').val();
                var newname = "newname";
                var newdescription =  "newdescription";
                // console.log(newLink);
                var params = {
                    _token: _token,
                    newLink: newLink,
                    newname: newname,
                    newdescription: newdescription,
                };

                $.post('{{ route('post_save_db_link') }}', params, res => {

                    //console.log('ответ получен');
                    // console.log(res.param1);    // Возвращенный результат
                    // console.log(res.param2);

                    if (res.status === 'success') {
                        location.reload();
                        // $newLink
                        // $newname
                        // $newdescription

                    } else {
                        alert('error');
                    }

                });


                // dd($aBDLinks);

                // $('.categories_block').html($aBDLinks[0]);
                /*var period = $(this).data('period');
                $('.period_list .period').addClass('hidden_item');
                $('#period' + period).removeClass('hidden_item');
                $('.period_control').removeClass('active_period');
                $(this).addClass('active_period');
                $('.period_line_item .circle_item').removeClass('active_circle_item');
                $('.period_line_item.' + period + ' .circle_item').addClass('active_circle_item');*/
            });




            $('.edit_link').bind('click', function () {
                var thisId = $(this).attr('id');
                //var thisName = $('.edit_link').text();
                var thisName = $('#link_' + thisId + ' .name h1').text();




                var currentBlock = $(this).closest('.categories_sub_block');

                // console.log(currentBlock);
                //
                // console.log();

                console.log(thisName);
            });


        });

    </script>

@stop
