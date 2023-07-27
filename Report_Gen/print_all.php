<?php
require("fpdf/fpdf.php");
require "config.php";

try {
    // Check the database connection
    if (!$con) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }

    // Fetch all data from the database
    $sql = "SELECT * FROM pro";
    $result = $con->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"ABC College",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"Nerul",0,1);
      $this->Cell(50,7,"Maharastra",0,1);
      $this->Cell(50,7,"PH : 999999999",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(210);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"Student Report",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,410,48);
    }
    
    function body()
        {
            global $data; // Use global keyword to access the $data array from the outer scope

            // Display Table headings
            $this->SetY(55);
            $this->SetX(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(30, 9, "Roll_No", 1, 0);
            $this->Cell(30, 9, "Class", 1, 0);
            $this->Cell(30, 9, "T_ID", 1, 0);
            $this->Cell(50, 9, "Student_Name", 1, 0);
            $this->Cell(30, 9, "Gender", 1, 0);
            $this->Cell(30, 9, "DOB", 1, 0);
            $this->Cell(40, 9, "Mobile_No", 1, 1);

            // Display table rows
            foreach ($data as $row) {
                $this->Cell(30, 9, $row["Roll_No"], 1, 0, "C");
                $this->Cell(30, 9, $row["Class"], 1, 0, "C");
                $this->Cell(30, 9, $row["T_ID"], 1, 0, "C");
                $this->Cell(50, 9, $row["Student_Name"], 1, 0, "C");
                $this->Cell(30, 9, $row["Gender"], 1, 0, "C");
                $this->Cell(30, 9, date("d-m-Y", strtotime($row["DOB"])), 1, 0, "C");
                $this->Cell(40, 9, $row["Mobile_No"], 1, 1, "C");
            }
        }
   
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"ABC College",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated Report",0,1,"C");
      
    }
    
  }
 // Create A4 Page with Portrait
$pdf = new PDF("L", "mm", "A4");
$pdf->AddPage();
$pdf->body();
$pdf->Output();
}
catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

?>