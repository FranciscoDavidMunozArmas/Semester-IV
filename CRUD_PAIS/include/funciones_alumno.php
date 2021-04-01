<?php
	// generar funcion para conectarse con la base de datos
	// funcion 1.- conectarse a la base de datos
	function conexion_bdd()
	{
		
	$user = "root";
	$password = "";
	$servidor = "localhost";
	$db = "pais";
	$c = mysqli_connect($servidor,$user,$password,$db); // cadena de conexion`
	mysqli_set_charset($c,"utf8");  // instruccion para que se visualice tildes, caracteres especiales 
	return $c;
		
	}

	// 2.- funcion para construir el formulario ---------------------------------------
	// generar funcion para crear formulario en tiempo de ejecion 
	function conseguir_formulario($id)
	{
		// ---- llamar a la conexion con la base de datos------
		//echo "<br> va a ejecutar la cadena de conexion ";
		$c=conexion_bdd();
		//echo "<br> debe haber ejecutado la cadena de conexion con la base de datos ";
		// a continuacion encerar las variables verificando si se ha cargado o no los registros y su estado (null o not null)
		if ($id == NULL){	// VERIFICA estado de los atributos si son NULL o si estan en NO  NULL en memoria
			$nombres=NULL;
			$apellidos=NULL;
		}
		else{
			$sql = "SELECT * FROM alumno;";
			//$sql = "SELECT * FROM alumno WHERE codigo=$id;"; // realiza un select para cargar todos los registros cuyo ID sea igual al id de la bdd
			$res = mysqli_query($c,$sql);		// ejecuta el query
			$p = mysqli_fetch_assoc($res);		// asigna el resultado del query  y lo asocia 
			$nombres = $p['nombres'];			// toma del record set y lo asigna a la variable de la 1ra columna del record set`
			$apellidos = $p['apellidos'];		// toma del record set y lo asinga a la variable de la 2da columna del record set
		}
		// a continuacion empieza el proceso de codificacion para el formulario
		$html='			// inicia la variable que contendra todo el formulario
		<form name="alumnos" action="" method="POST">
		<input type="hidden" name="id" value="' . $id . '">
			<table border="3" align="center">
				<tr>
					<th colspan="2"> DATOS DEL ALUMNO </th>
				</tr>
				<tr>
					<td> Nombres : </td>
					<td><input type="text" name="nombres" size="14" value="' . $nombres . '"> </td>
				</tr>
				<tr>
					<td> Apellidos : </td>
					<td><input type="text" name="apellidos" size="14" value="' . $apellidos . '"> </td>
				</tr>
				<tr>
				<td colspan="2" align="center"><input type="submit" name="guardar" value="GUARDAR"></td>
			</tr>
			</table>
		</form>
		';			// aqui termina la variable que contiene todo el formulario
		// a continuacion retorna el formulario completo a traves de la variable que lo contiene
		return $html;   // ok ok que tal hasta ahi??????
		
	}
	// 3.- funcion para listar los registros del formulario ---------------------------------------------------------
	// bien very good a continuacion vamos a generar la siguiente funcion para listar todos los registros ok ????
	function listar_formulario(){
		// iniciamos generando una sentencia sql para cargar los registros
		$sql = "select * from alumno ";
		// a continuacion generamos el formulario completo tambien en una variable de instancia
		$html='
			<table border="3" align="center">
				<tr>
					<th colspan="5"> LISTADO DE ALUMNOS </th>
				</tr>
				<tr>
					<th colspan="5"><a href="index.php?op=nuevo"> <img src="iconos/nuevo.png"></a> </th>
				</tr>
				<tr>
					<th> Nombres : </th>
					<th> Apellidos: </th>
					<th colspan="3"> Acciones </th>
				</tr>';
	
		// hasta aqui termina el formato de tabla con los titulos de la tabla nombres y apellidos
		// a continuacion la inter accion con la base de datos
		$con = conexion_bdd(); //conectar con la funcion para la base de datos
		$res = mysqli_query($con, $sql); // ejecuta la sentencia sql con la conexion respectiva
		// a continuacion se recorre todo el cursor que se encuentra en memoria RAM 
		while($p = mysqli_fetch_assoc($res))
		{
				
				$html .= '
					<tr>
						<td> ' . $p['nombres'] . ' </td>
						<td> ' . $p['apellidos'] . ' </td>
						<td> <a href="index.php?op=del&id=' .  $p['codigo'] . '"><img src="iconos/borrar.png"> </a> </td> 
						<td> <a href="index.php?op=up&id=' . $p['codigo'] . '"><img src="iconos/editar.png"> </a> </td> 
					</tr>
				';
		}
		// concatenar la variable del formulario
		$html .= '
		<table>
		';
		return $html;
		
	} // finaliza la funcion listar formulario
	
	//----------------------------------- a continuacion la funcion para guardar ----------------------------------------
	// 4.- formulario para guardar un nuevo registro -----------------------------------------------------
	
	function guardar(){
		$id = $_POST['codigo'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		
		if( $id == NULL)
		{
			$sql = "INSERT INTO alumno VALUES (NULL, '$nombres', '$apellidos');";
		}
		else
		{
			echo "<br> Actualizar informacion del alumno";
			$sql = "UPDATE alumno SET nombres='$nombres', apellidos='$apellidos' WHERE codigo=$id;";
		}
		$con = conexion_bdd();
		if(mysqli_query($con, $sql)){
				$html='
				<table border="0" align="center">
					<tr>
						<th>Se guardó correctamnte</th>
					</tr>
					<tr>
						<th><a href="index.php">Regresar</a></th>
					</tr>
				</table>';
		}
		else{
			$html='
			<table border="0" align="center">
				<tr>
					<th>No se guardo el registro. Por favor contactar al admnistrador</th>
				</tr>
				<tr>
					<th><a href="index.php">Regresar</a></th>
				</tr>
			</table>';
		}
	return $html;		
	}	// fin del metodo guardar()
