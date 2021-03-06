<!-- Ahora creamos un script para llamar la conexión y crear el reporte: -->
<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
    // Alias para poder utilizar la variable del numero total de paginas
	$pdf->AliasNbPages();
    // Agrega la pagina
	$pdf->AddPage();
	
    // Establece el color de fondo (q es el ultimo parametro de CELL())
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'ESTADO',1,0,'C',1);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
    // Recorrer los resultado de la consulta
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	}
    
    /* parametros opcionales: 'D' :descarga
                            'F', 'nombre.pdf' : lo guarda en disco directamente, hay que ponerle un nombre
    */                       
	$pdf->Output();
?>