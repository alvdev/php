<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/scripts.js" defer></script>
</head>
<body>

    <div class="container-form">
        <form action="" id="form" method="post">
            <div>
                <label for="name" id="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email" id="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="income" id="income">Income:</label>
                <input type="number" step="0.01" name="income" id="email">
            </div>
    
            <button type="submit" value="submit" name="submit">Submit form</button>
        </form>

        <div id="message">This is a test</div>

    </div>
    
</body>
</html>