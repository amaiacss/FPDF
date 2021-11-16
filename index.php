<?php
    require 'fpdf/fpdf.php';

    //constructor, de forma opcional puede recibir parámetros
    /* parámetros: 'alineacion de la hoja', P o L (horizontal o vertical)
                    'tipo de medida', pt(puntos) , mm, cm o in(pulgadas)
                    'tamaño', A3, A4, legal
    */              
    $pdf = new FPDF('P', 'mm', 'legal');
    $pdf->AddPage();

    //Establecer una fuente
    //Parametros: 'tipo de letra', 'negrita', 'tamaño'
    $pdf->SetFont('Arial', 'B',15);

    //agregar una celda
    /*Parámetros :'largo',
                'alto',
                'texto que va a contener', 
                1 :lleva borde, 0 no lleva borde,
                1 :salto de linea, 0 no salto de linea,
                'alineacion' -- L left, C centrado, R right  
    */
    $pdf->Cell(100,10,'Hola Mundo', 1, 1, 'C');
    
    // Función para Posicionar en una zona concreta del documento la celda, hay que ponerlo antes de la celda a la que quiero que le afecte
    $pdf->SetY(50);  
    $pdf->SetX(50);

    // para establecer las dos cardinales a la vez
    //$pdf->SetXY(50,50);
    $pdf->Cell(100,10,'Hola Mundo 2', 1, 1, 'C');

    // Posicionar mundo3 a 10 puntos de mundo 2 
    $y = $pdf->GetY(); // obtener la posición de Y de mundo2
    $pdf->SetY($y+10);
    $pdf->Cell(100,10,'Hola Mundo 3', 1, 1, 'C');


    // Multicelda, con la finalidad que la celda se ajuste al texto, cuando detecta que no tiene espacio se baja una linea
    /*Parámetros :'largo',
                'tamaño de la línea',
                'texto que va a contener', 
                1 :lleva borde, 0 no lleva borde,
                'alineacion' -- L left, C centrado, R right,
                1: lleva fondo, 0: no lleva fondo
    */
    $pdf->MultiCell(100, 5, 'nñsdnfñaindfgñainfañdknfñaidfnañsdkvmañidf', 1, 'L', 0);
    $IVA = '21%';
    $pdf->Cell(100, 15, ' ',1,0,'C');
    $pdf->Cell(50, 15, 'Subtotal',1,0,'C');
    $pdf->Cell(50, 15, $IVA,1,0,'R');

    $pdf->Output();

    
    //variable para sumar todos los conceptos, mostrarlos en pantalla
    //Mostrar porcentaje de IVA
    //Mostrar total con IVA

    // ¿Como filtrar si es una factura con o sin IVA? al alta del cliente ¿input para la BD con iva o sin iva?, si existe iva, va a la vista con iva o muestra la parte del iva si solo lo hago en una vista

    // utf8_decode()

    //  https://www.lawebdelprogramador.com/foros/PHP/1759694-Problema-con-pdf-y-fpdf-para-detalle-de-factura.html

    // http://www.v-espino.com/~chema/daw2/factura_en_pdf.htm
    


  

?>