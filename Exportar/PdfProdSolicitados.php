<?php
require_once('../tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
include('../Utils/conexion.php');
date_default_timezone_set("America/Buenos_Aires");


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF{
      
    	public function Header() {
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false, 0);
            $img_file = dirname( __FILE__ ) .'../Imagenes/c-logodescripcion.png';
            $this->Image($img_file, 85, 8, 20, 25, '', '', '', false, 30, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
	    }
}


//Iniciando un nuevo pdf
$pdf = new MYPDF('l', 'mm', 'Letter', true, 'UTF-8', false);
 
//Establecer margenes del PDF
$pdf->SetMargins(5, 35, 25);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //Eliminar la linea superior del PDF por defecto
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //Activa o desactiva el modo de salto de página automático
 
//Informacion del PDF
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Informe de Empleados');
 
/** Eje de Coordenadas
 *          Y
 *          -
 *          - 
 *          -
 *  X ------------- X
 *          -
 *          -
 *          -
 *          Y
 * 
 * $pdf->SetXY(X, Y);
 */

//Agregando la primera página
$pdf->AddPage();
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(150, 20);
$pdf->Write(0, 'Código: 0014ABC');
$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: '. date('d-m-Y'));
$pdf->SetXY(150, 30);
$pdf->Write(0, 'Hora: '. date('h:i A'));

$canal ='WebDeveloper';
$pdf->SetFont('helvetica','B',10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(15, 20); //Margen en X y en Y
$pdf->SetTextColor(204,0,0);
$pdf->Write(0, 'Desarrollador: Urian Viera');
$pdf->SetTextColor(0, 0, 0); //Color Negrita
$pdf->SetXY(15, 25);
$pdf->Write(0, 'Canal: '. $canal);



$pdf->Ln(40); //Salto de Linea
$pdf->Cell(40,26,'',0,0,'C');

$pdf->SetTextColor(34,68,136);

$pdf->SetFont('helvetica','B', 15); 
$pdf->Cell(100,6,'PRODUCTOS MÁS SOLICITADOS',0,0,'C');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0); 

//Armando la cabecera de la Tabla
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('helvetica','B',10); //La B es para letras en Negritas
$pdf->Cell(150,20,'Producto',1,0,'C',1);
$pdf->Cell(90,20,'Grupo',1,0,'C',1);
$pdf->Cell(20,20,'Cantidad',1,0,'C',1);
$pdf->Cell(25,20,'Precio + IVA',1,1,'C',1); 


$pdf->SetFont('helvetica','',8);


//SQL para consultas Empleados

$qry = $_POST['sqlPdf'];

$query = mysqli_query($datos_base, $qry);

while ($dataRow = mysqli_fetch_array($query)) {
        $pdf->Cell(150,5,$dataRow['producto'],1,0,'L');
        $pdf->Cell(90,5,$dataRow['grupoProducto'],1,0,'L');
        $pdf->Cell(20,5,$dataRow['cantidad'],1,0,'R');
        $pdf->Cell(25,5,('$ '. $dataRow['total']*1.21),1,1,'R');
    }


$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('Resumen_Pedido_'.date('d_m_y').'.pdf', 'I'); 

