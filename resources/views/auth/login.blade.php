<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Info Elite 21</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition login-page" style="background-image: url({{asset('img/fondo.jpg')}});
    background-size: cover;
    height: auto;
    width: 100vw;">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{asset('img/logo.png')}}" style="width: 150px;height: 135px;">
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg" id="animacion"></p>

            <form method="post" action="{{ url('/login') }}">
                @csrf

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label">Correo</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Iniciar Sesion</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
        var texto = "Ingresa tus datos de Acceso";
        // 100 es el intervalo de minisegundos en el que se escribirá cada letra.
        maquina("animacion", texto, 100, 0);

        function maquina(contenedor, texto, intervalo, n) {
            var i = 0,
                // Creamos el timer
                timer = setInterval(function() {
                    if (i < texto.length) {
                        // Si NO hemos llegado al final del texto..
                        // Vamos añadiendo letra por letra y la _ al final.
                        $("#" + contenedor).html(texto.substr(0, i++) + "|");
                    } else {
                        // En caso contrario..
                        // Salimos del Timer y quitamos la barra baja (_)
                        clearInterval(timer);
                        $("#" + contenedor).html(texto);
                        // Auto invocamos la rutina n veces (0 para infinito)
                        if (--n != 0) {
                            setTimeout(function() {
                                maquina(contenedor, texto, intervalo, n);
                            }, 2000);
                        }
                    }
                }, intervalo);
        };
    </script>
</body>

</html>