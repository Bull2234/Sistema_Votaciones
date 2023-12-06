<?php 
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: admin_panel.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>eDemocracia</title>
</head>
<body>
   <div class="container">
        <div class="form-content">
            <h1 id="title">Iniciar sesión [administrador]</h1>
            <form action="login_admin_be.php" method="post">
                <div class="input-group">
                    <div class="input-field" id="cedula-input">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" placeholder="Número de identificación" name="identificacion" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="passwordd" required>
                    </div>
                    <p>¿Olvidaste tu contraseña? <a href="../olvide_contrasena.html">click aqui</a></p>
                    <p>¿Aún no tienes una cuenta? <a href="registro.html">crear cuenta</a></p>
                </div>
                <div class="btn-field">
                    <button type="submit" id="singIn">Ingresar</button>

                </div>
            </form>
        </div>
   </div>
</body>
</html>