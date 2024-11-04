<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Boas-Vindas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #A2C8E3, #B5E0D3);
            animation: gradientAnimation 8s ease-in-out infinite;
            color: #4A4A4A;
        }

        .welcome-container {
            text-align: center;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 3s ease-in-out;
        }

        .welcome-title {
            font-size: 2.5rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: #4A90E2;
        }

        .welcome-subtitle {
            font-size: 1.2rem;
            color: #6B6B6B;
            margin-bottom: 1.5rem;
        }

        .btn-calm {
            background-color: #A2C8E3;
            color: #ffffff;
            border: none;
            margin-bottom: 1.5rem;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn-calm:hover {
            background-color: #88b0cb;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes gradientAnimation {
            0% { background: linear-gradient(135deg, #A2C8E3, #B5E0D3); }
            50% { background: linear-gradient(135deg, #B5E0D3, #D2E8F2); }
            100% { background: linear-gradient(135deg, #A2C8E3, #B5E0D3); }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1 class="welcome-title">Bem-vindo(a), <?php echo $_SESSION['nome']; ?>.</h1>
        <p class="welcome-subtitle">Explore nosso site e sinta-se em casa. Que sua experiência seja leve e agradável.</p>
        <a href="../../../" class="btn btn-calm">Explorar</a>
        <p>
        <a href="logout.php" class="btn btn-calm">Sair</a>
        </p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
