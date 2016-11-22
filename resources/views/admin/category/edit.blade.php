@extends('layouts.layout')

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="{{ action('Admin\CategoryController@index') }}">Kategoriler</a></li>
            <li class="active">Kategori Düzenle</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kategori Düzenle</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" id="editCategory" method="post" action="{{ action('Admin\\CategoryController@update', ['category' => $category]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-6 pull right">
                                    <button type="reset" class="btn btn-block btn-default">Temizle</button>
                                </div>
                                <div class="form-group col-md-6 pull right">
                                    <button type="submit" class="btn btn-block btn-primary">Onayla</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/jquery-validate/jquery.validate.min.js"></script>

    <script>

        $(function(){
            $('#editCategory').submit(function(e){
                e.preventDefault();
                $(this).ajaxSubmit({
                    dataType: 'JSON',
                    success: function(resp) {
                        if (resp.err) {
                            return $.notify({
                                message: "Kategori Düzenleme Başarısız!"
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
                        return $.notify({
                            message: "Kategori Başarıyla Düzenlendi"
                        }, {
                            delay: 3000,
                            type: 'success',
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
                        window.location.reload();
                    },
                });

            });
        });

    </script>

@stop