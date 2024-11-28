
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador de URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fa7f72;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        input[type="url"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size:16px;
        }

        p {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #f08080;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #f08080;
        }

        .result {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Encurtador de URL</h1>
        <form action="/encurtar" method="POST">
            <p><a href="<?php echo $_SESSION['long_url']?>"><?php echo "http://localhost:8080/" . $_SESSION['shorturl']?></a></p>
            <br>
          
        </form>
    </div>
</body>
</html>
