<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>API CEP</title>

    <style>

        body{
            background:#111;
            color:white;
            font-family:Arial;
            padding:40px;
        }

        .box{
            max-width:700px;
            margin:auto;
            background:#1b1b1b;
            padding:30px;
            border-radius:15px;
        }

        h1{
            color:#00ff88;
        }

        .link{
            background:#262626;
            padding:15px;
            border-radius:10px;
            margin-top:15px;
        }

        a{
            color:#00ff88;
            text-decoration:none;
        }

        .footer{
            margin-top:30px;
            color:#999;
        }

    </style>

</head>

<body>

    <div class="box">

        <h1>API REST de CEP</h1>

        <p>
            API feita em PHP + MySQL utilizando PDO.
        </p>

        <div class="link">
            <strong>Listar CEPs:</strong><br>

            <a href="http://localhost/api-cep/api/cep.php">
                http://localhost/api-cep/api/cep.php
            </a>
        </div>

        <div class="link">
            <strong>Buscar Copacabana:</strong><br>

            <a href="http://localhost/api-cep/api/cep.php?cep=22021-001">
                http://localhost/api-cep/api/cep.php?cep=22021-001
            </a>
        </div>

        <div class="link">
            <strong>Buscar Itapira:</strong><br>

            <a href="http://localhost/api-cep/api/cep.php?cep=13970-000">
                http://localhost/api-cep/api/cep.php?cep=13970-000
            </a>
        </div>

        <div class="footer">
            Feito por Nicolas Furtado <br>
            🕊 Luto Ganley Goat
        </div>

    </div>

</body>
</html>