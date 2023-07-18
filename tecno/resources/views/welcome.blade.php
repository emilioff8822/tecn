<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .tile {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .tile h3 {
            color: #343a40;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .tile p {
            color: #6c757d;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            padding: 10px 20px;
            margin-right: 10px;
        }

        .btn-custom:hover,
        .btn-custom:focus {
            background-color: #0069d9;
            border-color: #0062cc;
            color: #ffffff;
        }

        .title {
            color: #343a40;
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="title">Software Gestionale XYZ</h1>

        <div class="tile">
            <h3>Operazioni disponibili</h3>
            <p>Il software gestionale offre le seguenti operazioni:</p>
            <ul>
                <li>Gestione anagrafica dei servizi</li>
                <li>Gestione costi e listini di vendita per singolo Point</li>
                <li>Attivazione/disattivazione vendita servizi su un determinato Point</li>
                <li>Consultazione storico vendite di ogni articolo</li>
            </ul>
        </div>

        <div class="text-center">
            <a href="{{ route('listinos.index') }}" class="btn btn-custom" type="button">Vai ai Listini</a>
            <a href="{{ route('servizis.index') }}" class="btn btn-custom" type="button">Vai ai Servizi</a>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
