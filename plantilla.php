<!-- Creamos una clase que herede las funciones de FPDF para utilizarla como plantilla para el encabezado y pie de página: -->
<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{   
            /*parámetros; posicion, posicion, tamaño*/ 
			$this->Image('images/logo.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Estados',0,0,'C');
            //Salto de linea de 20puntos
			$this->Ln(20);
		}
		
		function Footer()
		{
            // posicion del final de la pagina 15 hacia arriba
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
            /* parametros: el 0 indica que va a estar en el centro y ocupa toda la hoja,
                        'alto',
                        'leyenda' muestra el número de página
                        nb --> muestra el total de las paginas que se van a crear
                        borde 1 o 0
                        salto de linea 1 o 0
                        center , left or right
            */
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>