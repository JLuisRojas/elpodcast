<html>
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <style type="text/css">
        @font-face {
            font-family: 'yourfont';
            src: url({{ storage_path('fonts/Nunito/Nunito-Regular.ttf') }}) format('truetype');
            font-weight: 400;             
            font-style: normal;         
        }        

        body {
            font-family: "yourfont"
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: black;
            color: white;
        }

        td {
            border: 1px solid grey;
            text-align: center;
        }

        .title {
            font-size: 28px;
        }

        .sub-title {
            font-size: 20px;
        }

        .sep {
            padding-top: 30px;
        }

        img {
            width: 8%;
        }
    </style>
</head>
<body>
    <center>
        <img src="logo.png">
    </center>
    <center class="title">
        El Podcast - Reporte General
    </center>

    <div>
        <p class="sub-title">Top Podcasts</p>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Categoría</td>
                    <td>Suscripciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pods as $pod)
                    <tr>
                        <td>{{ $pod->title }}</td>
                        <td>{{ $pod->category->name }}</td>
                        <td>{{ $pod->numSubs() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="sep">
        <p class="sub-title">Categorías de Podcasts</p>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Num. Podcasts</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->podCount() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
