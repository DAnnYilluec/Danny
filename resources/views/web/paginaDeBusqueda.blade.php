@extends($comprobar->esAdmin == 1 ? 'web/layoutAd' : 'web/layout') <!--$comprobar->esAdmin == 1 ? 'Admin/layoutad' : -->
@section('title','Danny Zapata')
@section('content')
    <h2>Usuarios</h2>
    @foreach($usuarios as $usuario)
        <div class="col-lg-3 col-md-3 col-sm-3 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <div style="background: url('{{ asset($usuario->imagen ? 'storage/images/'.$usuario->imagen : '/img/img-web/Abbey Road - The Beatles.png') }}') no-repeat center center; background-size: cover; height: 200px;"></div>
                </div>
                <div class="text-center py-4">
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h2>{{$usuario->nombre_usuario}}</h2>
                        <!--<h5><a href="}</a></h5>-->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <h2>Publicaciones</h2>
    @foreach($publicaciones as $publicacion)
        <div class="col-lg-3 col-md-3 col-sm-3 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <div style="background: url('{{ asset($publicacion->imagen ? 'storage/images/'.$publicacion->imagen : '/img/img-web/Abbey Road - The Beatles.png') }}') no-repeat center center; background-size: cover; height: 200px;"></div>
                </div>
                <div class="text-center py-4">
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h2><a href="{{route('pagPublicacion', $publicacion->id)}}">{{$publicacion->nombre}}</a></h2>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <h2>Discusiones</h2>
    @foreach($discusiones as $discusion)
        <div class="col-lg-3 col-md-3 col-sm-3 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <div style="background: url('{{ asset($discusion->imagen ? 'storage/images/'.$discusion->imagen : '/img/img-web/Abbey Road - The Beatles.png') }}') no-repeat center center; background-size: cover; height: 200px;"></div>
                </div>
                <div class="text-center py-4">
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h2><a href="{{route('pagDiscusion', $discusion->id)}}">{{$discusion->titulo}}</a></h2>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script src="/js/js-web/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
@endsection
