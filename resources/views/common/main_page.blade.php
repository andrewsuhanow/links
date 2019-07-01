@extends('common.layouts.main_block')











@section('content')



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
                <div class="categories_block">

                    @forelse($aBDLinks as $itBDLinks)
                    <div>
                        <div class="jumbotron shadow p-3 categories_sub_block">
                            <div class="container-fluid " >
                                <div class="row">
                                    <div class="col-10">
                                        <h1>{{$itBDLinks->name}}</h1>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-danger">Delete</button>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#ModalEdit">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="description"> {{$itBDLinks->description}} </div>
                            <a class="lead"> <b>Link:</b>  {{$itBDLinks->link}}</a>
                        </div>
                    </div>
                    @empty
                    @endforelse

                </div>
        </div>
    </div>



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

        .categories_block{
            background: #5c430f;
            min-height: 100vh;
            min-width: 100vw;
            padding: 50px;
        }

        .categories_sub_block{
            background: #b78918;
        }

        .description{
            background: #745010;
            border: 4px solid;
            border-color: #846211;
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

                $.post('{{ route('main') }}', params, res => {

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
        });

    </script>

@stop
