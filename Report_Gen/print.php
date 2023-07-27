<?php
require("fpdf/fpdf.php");
require "config.php";

$info = [
    "Roll_No" => "",
    "Class" => "",
    "T_ID" => "",
    "Student_Name" => "",
    "Gender" => "",
    "DOB" => "",
    "Mobile_No" => "",
    "Email_ID" => "",
];

try {
    // Check the database connection
    if (!$con) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }

    // Select Invoice Details From Database
    if (isset($_GET["id"])) {
        $sql = "SELECT * FROM pro WHERE T_ID = ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error preparing the SQL query: " . mysqli_error($con));
        }

        $stmt->bind_param('s', $_GET["id"]);
        if (!$stmt->execute()) {
            throw new Exception("Error executing the SQL query: " . mysqli_error($con));
        }

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            // Check if the keys exist in the $row array before accessing them
            $info = [
                "Roll_No" => isset($row["Roll_No"]) ? $row["Roll_No"] : "",
                "Class" => isset($row["Class"]) ? $row["Class"] : "",
                "T_ID" => isset($row["T_ID"]) ? $row["T_ID"] : "",
                "Student_Name" => isset($row["Student_Name"]) ? $row["Student_Name"] : "",
                "Gender" => isset($row["Gender"]) ? $row["Gender"] : "",
                "DOB" => isset($row["DOB"]) ? date("d-m-Y", strtotime($row["DOB"])) : "",
                "Mobile_No" => isset($row["Mobile_No"]) ? $row["Mobile_No"] : "",
                "Email_ID" => isset($row["Email_ID"]) ? $row["Email_ID"] : "",
            ];
        } else {
            throw new Exception("No record found for the given T_ID");
        }
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
    
    function body($info)
    {
        // Billing Details
        // $this->SetY(55);
        // $this->SetX(10);
        // $this->SetFont('Arial', 'B', 12);
        // $this->Cell(50, 10, "Bill To: ", 0, 1);
        // $this->SetFont('Arial', '', 12);
        // $this->Cell(50, 7, $info["Student_Name"], 0, 1);
        // $this->Cell(50, 7, $info["Mobile_No"], 0, 1);
        // $this->Cell(50, 7, $info["Email_ID"], 0, 1);

        // Display Invoice no
        $this->SetY(55);
        $this->SetX(210);
        $this->Cell(50, 7, "Roll No : " . $info["Roll_No"]);

        // Display Invoice date
        $this->SetY(63);
        $this->SetX(210);
        $this->Cell(50, 7, "DATE : " . date('Y-m-d'));

        // Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(30, 9, "Roll_No", 1, 0, "C");
        $this->Cell(30, 9, "Class", 1, 0, "C");
        $this->Cell(30, 9, "T_ID", 1, 0, "C");
        $this->Cell(50, 9, "Student_Name", 1, 0, "C");
        $this->Cell(30, 9, "Gender", 1, 0, "C");
        $this->Cell(30, 9, "DOB", 1, 0, "C");
        $this->Cell(40, 9, "Mobile_No", 1, 1, "C");

        // Display table product rows
        $this->SetFont('Arial', '', 12);
        $this->Cell(30, 9, $info["Roll_No"], 1, 0, "C");
        $this->Cell(30, 9, $info["Class"], 1, 0, "C");
        $this->Cell(30, 9, $info["T_ID"], 1, 0, "C");
        $this->Cell(50, 9, $info["Student_Name"], 1, 0, "C");
        $this->Cell(30, 9, $info["Gender"], 1, 0, "C");
        $this->Cell(30, 9, $info["DOB"], 1, 0, "C");
        $this->Cell(40, 9, $info["Mobile_No"], 1, 1, "C");
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
$pdf->body($info);
$pdf->Output();
}
catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

?>