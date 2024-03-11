<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cambiar_contrasena.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif; /* se indica el uso de Popins, un tipo de letra importada desde google fonts por el método link*/
    
    }
    body{
        background-color: aqua;
    }
    .container{
    width: 100%;
    height: 100vh;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #7EE687;

}

    </style>
    <title>recuperación contraseña</title>
</head>
<body>
    <div class="container">
        <div class="formulario_cambiar_contrasena">
            
            <form action="../php/cambiar_contrasena.php" method="POST">
                <h2>Restablecer contarseña</h2>  <br>
                <label for=""> nueva contraseña</label> <br>
                <input type="password" name="new_password" id="" required> <br> <br>
                <input type="hidden" name="identificacion" value="<?php echo $_GET['identificacion']; ?>"> <br> <br>
                <button type="submit">Restablecer</button>
            </form>
        </div>
    </div>
    
</body>
</html>