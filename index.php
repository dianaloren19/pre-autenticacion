<?php
//conexion a la Bd
$mysqli = new mysqli("localhost", "root", "", "mibasededatos");
//validar si hay conexion
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
    
        if(empty($_POST["usuario"]) && (empty($_POST["password"]))){
            echo "ingrese datos en los campos";
        }else{
            $usuario=$_POST["usuario"];
            $password=md5($_POST["password"]);
            
            $query="SELECT password FROM usuarios WHERE nombreusuario='".$usuario."' LIMIT 1";
			if($query==""){
				echo "los datos son errados";
				
			}else{
            $result=mysqli_query($mysqli,$query);
            $fila=mysqli_fetch_array($result);
			echo "la contrasena es:".$fila[0];
               if(isset($fila)){
                    if($password==$fila[0]){
                        header ("location: sesioniniciada.php");
                    }else{
                       echo '<p class="alert alert-danger" role="alert"><b>El usuario o la contraseña son incorrectos</b>';
                    }
                } 
    		}
		}
}
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style type="text/css">
    #cover{
    background-image: url('./img/form.jpg');
    background-size: cover;
    color:black;
    text-align: center; 
    font-family:cursive;
    }

    #cover-texto{
        width: 100%;
    }
    #cover-texto .form-inline{
        padding: 8rem 0;
    }
    .contenido-seccion{
        padding: 3rem 0;
    }
    #footer{
    background: #222;
    color:white;
    font-size:0.8rem;
    padding:2.5rem 0;
    }
      
      </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 
    <title>Autenticacion</title>
  </head>
  <body>
  <section>
      
      
  </section>
   <!-- inicio con fondo -->
     <section id="cover">
        <div id="cover-texto">
            <div class="container ">
                <div class="row">
                   <div class="col-sm-12">
                      <h1 class="display-3">Autenticación</h1>
                           <form method="post" action="" class="form-inline justify-content-center">
                              <div class="form-group">
                                <input type="texto" class="form-control form-control-lg" placeholder="Usuario" name="usuario">
                                 <input type="password" class="form-control form-control-lg" name="password" placeholder="password">
                               <button type="submit" class="btn btn-dark btn-lg" value="Ingresar">Ingresar</button>
                              </div>
                           </form>
                   </div>
                </div>
             </div>
        </div>
    </section>
<footer id="footer">
       <div class="container">
           <div class="row">
               <div class="col-sm-3">
                   <p>Creado por Grupo Niche colombia</p>
                   <p>Mas videos en <a href="https://www.youtube.com/watch?v=FldLWuBibuw"></a>Mi Canal</p>
               </div>
               <div class="col-sm-3">
                   <ul class="list-unstyled">
                       <li><a href="">Facebook</a></li>
                       <li><a href="">Twitter</a></li>
                       <li><a href="">youtube</a></li>
                   </ul>
               </div>
                   <div class="col-sm-3">
                       <h6>Contactame</h6>
                       <p>Celular:   31111111111</p>
                       <p>Fijo:      0000005</p>
                       <p>nomebusques@latinmail.com</p>
                   </div>
           </div>
       </div>
</footer>  
 
      <!-- Optional JavaScript -->
      <!--  jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
</html>