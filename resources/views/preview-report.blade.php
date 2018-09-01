<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seguridad</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Raleway', sans-serif;
                height: 100vh; 
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <div class="content" id="printableArea">
                <div style="color: black; font-weight: normal;">Método {{$method}}</div>
                <div class="title m-b-md">
                    Reporte final
                </div>
                <img src="{{$picture}}">
                <div style="color: black;font-size: large; font-weight: bold;">Luis Eduardo López Andrade, identificado con la cédula 1.143.456.297 de Barranquilla, acepta voluntariamente la realización de cobros mensuales a su nombre en la tarjeta de crédito de franquicia Visa con número de tarjeta 52.122.123.212
                por lo cuál, firma y declara ser el tarjeta habiente con una simetría de la cédula de: {{$scan}}* </div>
                <div style="margin-top: 100px; color: black; font-size: small; font-weight: bold;">*Método ImageHash: 0 (Totalmente igual); 1-26(similar); 27 o más(Diferente)
                    <br>
                Método Imagick: 0(Totalmente igual); 0.20(Relacionado); 0.22(Diferente)
                </div>
                <div style="margin-top: 50px">Firma:_________________________________</div>

            </div>
            <div style="text-align: center; margin-top: 50px;">
                <input type="button" onclick="printDiv('printableArea')" value="Imprimir" />
            </div>
            <script type="text/javascript">
                function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
            </script>
    </body>
</html>
