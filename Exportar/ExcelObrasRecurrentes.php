<?php
session_start();
include('../Utils/conexion.php');
?>
<!DOCTYPE html>
<html lang="es-es">

<head>
	<meta charset="utf-8">
	<title>Contacto</title>

	<head>

	<body>
		<?php
		// Definimos el archivo exportado
		$arquivo = 'ObrasSociales.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="4">Lista de Obras sociales recurrentes</tr>';
		$html .= '</tr>';


		$html .= '<tr>';
		$html .= '<td><b>Obra social</b></td>';
		$html .= '<td><b>Cantidad de productos solicitados</b></td>';
		$html .= '<td><b>Ventas concretadas</b></td>';
		$html .= '<td><b>Inversion (con IVA)</b></td>';
		$html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
	/* 	$result_msg_contatos = "SELECT * FROM contactos"; */
		$variable = $_POST['sql'];
		$resultado_msg_contatos = mysqli_query($datos_base, $variable);

		while ($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)) {
			$html .= '<tr>';
			$html .= '<td>' . $row_msg_contatos["usuario"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["cantidad"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["TOTAL"] . '</td>';
            $html .= '<td>$' . $row_msg_contatos["monto"]*1.21 . '</td>';
			$html .= '</tr>';
		}
		// Configuración en la cabecera
		header("Expires: Mon, 26 Jul 2227 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
		header("Content-Description: PHP Generado Data");
		// Envia contenido al archivo
		echo $html;
		exit; ?>
	</body>

</html>