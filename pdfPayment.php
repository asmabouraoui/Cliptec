<?php
    
ob_end_clean();
require('Api/fpdf.php');
  
 

if (isset ($_POST['numcarte'])  && isset($_POST['dateex']) && isset($_POST['CVV']) )  {
    $numcarte = $_POST['numcarte'];
    $date = $_POST['dateex'];
    $ccv = $_POST['CVV'];


    if (empty($numcarte)){
      echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
                  echo   "carte number  is empry ! <br>" ;
                  echo "</div>";
          $test = false;
    }
    if (empty($date)){
        echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
                    echo   "date is empry ! <br>" ;
                    echo "</div>";
            $test = false;
      }
      if (empty($ccv)){
        echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
                    echo   "CCV  is empry ! <br>" ;
                    echo "</div>";
            $test = false;
      }
      
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
  
// Prints a cell with given text

$pdf->Image("logo.png", 0, 0, $pdf->w, $pdf->h );
$pdf->Cell(0,10,'To The Moon Ticket' , 1 ,  1 , 'C');


$pdf->SetFont('Arial', 'B', 14);
$pdf->SetY(50);

$pdf->Cell(0,10,'Hello and Welcome To Moon Trip!' , 0 ,  12 , 'L');

$pdf->Cell(0,10,'Your Shipping Card Number is  '.$numcarte.'!' , 0 , 13 , 'C');

$pdf->Cell(0,10,'Your date is  '.$date.'!', 0 , 14 , 'C');

$pdf->Cell(0,10,'Your CCV is  '.$ccv.'!', 0 , 14 , 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->SetY(-60);
$pdf->Cell(0,10,'these payment information are confirmed!', 0 , 15 , 'C');


  
// return the generated output
$pdf->Output();
} else {
      echo "problem !";
}
  
?>