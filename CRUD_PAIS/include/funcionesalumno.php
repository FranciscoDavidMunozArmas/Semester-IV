<?php

// 1.- funcion es para conexion con el motor de bdd
function conexion_bdd(){
	$user = "root";
	$password = "";
	$servidor = "localhost";
	$db = "pais";
	$c = mysqli_connect($servidor,$user,$password,$db); // cadena de conexion`
	mysqli_set_charset($c,"utf8");  // instruccion para que se visualice tildes, caracteres especiales 
	return $c;
		
}

function conseguir_formulario($id)
{
	$c=conexion_bdd();
	
	if($id == NULL)
	{
		$mombres=NULL;
		$apellidos=NULL;
		
	}
	else
	{
			$sql = "SELECT * FROM alumno;";	// select de todos los registros de la tabla a entidad alumno
			$res = mysqli_query($c,$sql);		// ejecuta la sentencia sql
			$p = mysqli_fetch_assoc($res);		// asocia el cursor resultante de la sentencia sql
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
	}
	// a continuacion se procede a generar el formulario desde php
	// en una variable se acumula el codigo html para los elementos del formulario
	$html= '
	<form name="alumno" action="" method="POST=">
		<input type="hidden" name="id" value="' . $id . '">
			<table border="3" align="center">
				<tr>
					<th colspan="2"> DATOS DEL ALUMNO </th>
				</tr>
				<tr>
					<td>Nombres : </td>
					<td>
						<input type="text" size="14" name="nombres" value="' . $nombres . '"> 
					</td>
				</tr>
				<tr>
					<td>Apellidos : </td>
					<td>
						<input type="text" size="14" name="apellidos" value="' . $apellidos . '"> 
					</td>
				</tr>
			</table>
	</form>
	';
	// finalmente retorna la variable html qu econtiene el formulario 
	return $html;
	
}		// aqui finaliza la funcion conseguir_formulario

	//---------------------a continuacion otra funcion para listar todos los registros del formulario ------------
	// 2.- funcion para listar registros
	function listar_formulario()
	{
		// empezamos con un sql para cargar todos los registros del formulario 
		$sql="SELECT * FROM alumno";
		
		// inmediatamente se construye la variable que contendra todo el formulario para LISTAR TODOS LOS REGISTROS
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
					<th> Apellidos : </th>
					<th> Acciones </th>
				</tr>';
				
				// hasta aqui los tittulos de la tabla
				// continuar con el enlace con los datos desde la base de datos
				$con=conexion_bdd();
				$res=mysqli_query($con, $sql);
				// inmediatamente se recorre el cursor desde el primero hasta el ultimo registro resultante
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
				// se procede a concatenar con la variable html
				$html .= '
			<table>
		';
			//finalmente se retorna la variable html que contiene el listado tipo formulario
			return $html;
	}	// fin de la funcion listar_formulario
