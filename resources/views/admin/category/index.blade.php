@extends('layouts.layout')


@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kategoriler</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
</div><!--/.row-->
<div class="row">
    <!-- Table -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Kategoriler
                <a href="{{ action('Admin\\CategoryController@create') }}" class="btn btn-primary pull-right">Yeni Kategori</a>
            </div>
            <div class="panel panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori Adı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $index=>$category)
                        <tr>
                            <th>{{ $index+1 }}</th>
                            <th>{{ $category->name }}</th>
                            <th>
                                <a href="{{ action('Admin\\CategoryController@edit', ['category' => $category]) }}" class="btn btn-default">Düzenle</a>
                            </th>
                            <th>
                                <a data-url="{{ action('Admin\\CategoryController@destroy', ['category' => $category]) }}" class="btn btn-danger removeCategory">Sil</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

<script src="/js/bootbox.min.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>

<script>

    $('body').on('click', '.removeCategory', function(){
        var url = $(this).attr('data-url');
        var $tr = $(this).parents('tr');
        bootbox.confirm({
            message: "Ürünü silmek istediğinize emin misiniz?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Vazgeç'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Onayla'
                }
            },
            callback: function (result) {
                if(!result){
                    return;
                }
                $.ajax({
                    'url': url,
                    'type': 'DELETE',
                    'dataType': 'JSON',
                    'success': function(result){

                        var message='Silme işlemi başarılı';
                        var status='success';

                        if(result.err){
                            //return bootbox.alert("Silme işlemi başarısız!");
                            message = "Silme işlemi başarısız";
                            status = 'danger';
                        }

                        $tr.animate('').remove();
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
            }
        });
    })

</script>

@endsection