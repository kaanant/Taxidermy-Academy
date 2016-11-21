@extends('layouts.layout')

@section('content')
    <style>
        .albumTrash {
            position: absolute;
            left: 355px;
            top: 12px;
            cursor: pointer;
        }
    </style>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ action('Admin\\AlbumController@getList') }}">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a></li>
            <li class="active">Galeri</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div><!--/.row-->

    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h1 class="header">Albümler</h1>
            </div>
            <div class="col-lg-1">
                <a style="position: relative; top:24px; left: -58px; border-radius: 100%" data-toggle="modal"
                   data-target="#addAlbumModal" type="submit" class="btn pull-right btn-lg btn-info">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($albums as $album)
                <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                    <h3 style="margin-top:5px;">{{$album->name}}</h3>
                    <i onclick="show_notification('{{action("Admin\\AlbumController@getDelete",['id'=>$album->id])}}', this)"
                       class="glyphicon glyphicon-trash albumTrash text-danger"></i>
                    <a class="thumbnail" href="{{action("Admin\\AlbumController@getAlbum",["id"=>$album->id])}}">
                        <img class="img-responsive" src="/images/albums/{{$album->cover_image}}" alt="">
                    </a>
                    <h5>Açıklama:<br>{{$album->description}}</h5>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{ $albums->links() }}
        </div>
    </div>

    <div class="modal fade" id="addAlbumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" action="{{action("Admin\\AlbumController@postCreate")}}" id="createAlbumForm">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Yeni Albüm Ekle</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Album Adı</label>
                            <input name="name" type="text" class="form-control" placeholder="Album Name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Album Açıklaması</label>
                            <textarea name="description" type="text" class="form-control" placeholder="Albumdescription">{{old('descrption')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Select a Cover Image</label>
                            <input type="file" name="cover_image">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Oluştur</button>
                    </div>
                </form>
            </div>
        </div>
        @endsection



        @section('scripts')
            @parent

            <script type="text/javascript">
                function show_notification(url, elm) {
                    var $div = $(elm).parents('div.thumb');

                    bootbox.confirm('Silmek istediğinizden emin misiniz?', function (resp) {
                        if (!resp) return;

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            dataType: 'JSON',
                            success: function (result) {
                                var message = 'Silme işlemi başarılı';
                                var status = 'success';

                                console.log(result.err);
                                if (result.err) {
                                    message = "Silme işlemi başarısız";
                                    status = 'danger';
                                } else {
                                    console.log($div);
                                    $div.hide('slow', function () {
                                        $div.remove();
                                    });
                                }

                                $.notify({
                                    message: message
                                }, {
                                    delay: 3000,
                                    type: status,
                                    allow_dismiss: false,
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    },
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutUp'
                                    }
                                });
                            }
                        });
                    });
                }

                $(function(){

                    $('#createAlbumForm').submit(function(e){
                        e.preventDefault();

                        $(this).ajaxSubmit({
                            dataType: 'JSON',
                            success: function(resp) {
                                $('#addAlbumModal').modal('hide');

                                if (resp.err) {
                                    return $.notify({
                                        message: "Albüm Oluşturulamadı"
                                    }, {
                                        delay: 3000,
                                        type: 'danger',
                                        allow_dismiss: false,
                                        placement: {
                                            from: "top",
                                            align: "center"
                                        },
                                        animate: {
                                            enter: 'animated fadeInDown',
                                            exit: 'animated fadeOutUp'
                                        }
                                    });
                                }

                                window.location.reload();
                            },
                            error: function() {
                                $('#addAlbumModal').modal('hide');
                                $.notify({
                                    message: "Albüm Oluşturulamadı"
                                }, {
                                    delay: 3000,
                                    type: 'danger',
                                    allow_dismiss: false,
                                    placement: {
                                        from: "top",
                                        align: "center"
                                    },
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutUp'
                                    }
                                });
                            }
                        });

                    });
                });

            </script>
        @endsection