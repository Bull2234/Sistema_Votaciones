<?php 
$inc = include('../../php/conexion_be.php');
if($inc){
    $sql = "SELECT * FROM `tipo_eleccion` WHERE estado = 'Activa'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        ?>
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Darumadrop+One&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                
            }
            body{
                background-color: #0C8CE9;
            }
            .main_text{
                background-color: #72c1e8;
                color: #FFFFFF;
                display: flex;
                justify-content: center;
                padding: 22px;
                width: 1200px; 
                height: 100px; 
                margin: 20px auto;
                border-radius: 10px
            }
            .body_table{
                width: 1200px; 
                height: 600px; /* Ajusta la altura según tus necesidades */
                max-width: 1200px; /* Establece el ancho máximo para evitar que se vuelva demasiado grande */
                background-color: #ccc;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 10px;
                
            }
            .table{
                display: flex;
                justify-content: center;
            }
            table{
                border-collapse: separate;
                border-spacing: 10px
            }
            th {
                 background-color: #0C8CE9; /* Color de fondo */
                color: #FFFFFF; /* Color de texto */
                font-weight: bold; /* Fuente en negrita */
                 padding: 10px; /* Espaciado interno */
                 border: 1px solid #ccc; /* Borde */
                }
            td, th {
            padding: 10px; /* Ajusta el valor para obtener el espaciado deseado */
            }

            .btnVotar{
                background-color: #7EE687;
            }
        </style>
        <body>
            <div class="main_text">
                <h1>Encuestas disponibles</h1>
            </div>
            
            <div class="body_table">
                <div class="table">
                <table>
            <thead>
                <tr>
                    <!-- ... (encabezados de la tabla) ... -->
                    <th>ID votación</th>
                    <th>ID Administrador</th>
                    <th>Típo Votacion</th>
                    <th>Estado</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while($row = $resultado->fetch_array()){
                $idvo = $row['id_votacion'];
                $idadmin = $row['id_admin'];
                $tipo = $row['tipo'];
                $estado= $row['estado'];
                $fechai= $row['fecha_inicio'];
                $fechaf= $row['fecha_final'];
                ?>
                <tr>
                    <td><?php echo $idvo; ?></td>
                    <td><?php echo $idadmin; ?></td>
                    <td><?php echo $tipo; ?></td>
                    <td><a href="../administrador/votar_dos.php"><?php echo $estado; ?></a></td>
                    <td><?php echo $fechai; ?></td>
                    <td><?php echo $fechaf; ?></td>
                    <td><a href="../administrador/votar_usuario.php?id=<?php echo $idvo; ?>" name="enviar">Votar</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
                </div>
            </div>
        </body>
        <?php
    }
}
?>
