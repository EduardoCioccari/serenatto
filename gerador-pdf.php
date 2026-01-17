<?php

require "vendor/autoload.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start(); // inicia um buffer de saída. Armazena o conteúdo do require abaixo mas não exibe.
require "conteudo-pdf.php";
$html = ob_get_clean(); // joga o conteúdo do require na variável e limpa o buffer após fazer isso.

$dompdf->loadHtml($html); // passando html do pdf como parâmetro.

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4'); // config de papel.

// Render the HTML as PDF
$dompdf->render(); // renderizando html para pdf.

// Output the generated PDF to Browser
$dompdf->stream(); // gerando saída do pdf.
