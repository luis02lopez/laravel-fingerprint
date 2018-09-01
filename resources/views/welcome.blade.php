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
                background-color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: normal;
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
            #container {
                margin: 0px auto;
                width: 300px;
                height: 300px;
                border: 10px #333 solid;
            }
            #player {
                width: 300px;
                height: 300px;
                background-color: #666;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Biometría Kinbu 
                </div>
                <form method="post" action="/compare" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    Método ImageHash
                    <input type="radio" name="method" value="imagehash">
                    Método Imagick
                    <input type="radio" name="method" value="imagick">
                    Imagen 1
                    <input type="file" name="image1" accept="image/*" />
                    Imagen 2
                    <input type="file" name="image2" accept="image/*" />
                    <input type="text" id="picture" name="picture" value="">
                    <input type="submit">
                </form>
                    Foto
                    <button id="capture">Capturar</button>
                    <div id="container">
                        <video autoplay="true" id="player">
                        </video>
                        <canvas id="canvas" width=150 height=150></canvas>

                    </div>
                    <script type="text/javascript">
                      const player = document.getElementById('player');
                      const canvas = document.getElementById('canvas');
                      const context = canvas.getContext('2d');
                      const captureButton = document.getElementById('capture');

                      const constraints = {
                        video: true,
                      };

                      captureButton.addEventListener('click', () => {
                        // Draw the video frame to the canvas.
                        context.drawImage(player, 0, 0, canvas.width, canvas.height);
                        // Stop all video streams.
                        player.srcObject.getVideoTracks().forEach(track => track.stop());
                        var dataURL = canvas.toDataURL();
                        document.getElementById('picture').value = dataURL;
                      });

                      // Attach the video stream to the video element and autoplay.
                      navigator.mediaDevices.getUserMedia(constraints)
                        .then((stream) => {
                          player.srcObject = stream;
                        });
                    </script>
                    
            </div>
        </body>
    </html>
