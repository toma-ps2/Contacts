<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="wrapper">
        <h1>Ваши контакты</h1>
        <form action="admin.php" method="POST">
            <input type="text" name="name" id="name" class="form-control" placeholder="Введите Ваше имя" minlength="3" value=""  required> 
            <input type="phone" name="phone" id="phone" placeholder="Tел в формате +7xxxxxxxxxx" class="form-control" pattern="^\+7[0-9]{10}$" value=""  required> 
            <input type="submit" name="sendContact" class="btn btn-success" value="Создать контакт"></input>
        </form>

    </div>
    
</body>
</html>

