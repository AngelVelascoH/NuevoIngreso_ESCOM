<?php
include("MAIL/class.phpmailer.php");
include("MAIL/class.smtp.php");
include("conexion.php");
include("fpdf/cellfit.php");
$con = conectar();
$Boleta = $_POST['boleta'];
$sql = "SELECT * FROM registros_principal WHERE Boleta='$Boleta'";
$res = mysqli_query($con,$sql);
$alumno = mysqli_fetch_array($res);

$email_user = "Registro2022ESCOM@gmail.com"; //OJO. Debes actualizar esta línea con tu información
$email_password = "RegistroESCOM."; //OJO. Debes actualizar esta línea con tu información
$the_subject = "Nuevo ingreso";
$address_to = $alumno[12]; //OJO. Debes actualizar esta línea con tu información
$from_name = "Escuela Superior de Cómputo";
$phpmailer = new PHPMailer();
$phpmailer->CharSet = 'UTF-8';
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Bienvenido a la escuela superior de cómputo:</h1>";
$phpmailer->Body .="<h1 style='color:#3498db;'>$alumno[1] $alumno[2] $alumno[3]</h1>";
$phpmailer->Body .="<h1 style='color:#3498db; '>:)</h1>";
$phpmailer->Body .= "<p>En el siguiente archivo, encontraras la información que registraste, y el horario y laboratorio para presentar tu exámen diagnostico.</p>";
$phpmailer->Body .= "<p>El exámen diagnostico se realizará el día 20 de Enero.</p>";
$phpmailer->Body .= "<p>Recuerda estar atento a los medios oficiales de la ESCOM.</p>";
$phpmailer->IsHTML(true);

//-----------------------------------------------------------------------------------------------------------

//require('fpdf/fpdf.php');

class PDF extends FPDF_CellFit
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('helvetica','I',8);
    // Print centered page number
    $this->SetTextColor(0,102,153);
    $this->Cell(0,10,'ESCUELA SUPERIOR DE CÓMPUTO 2021-2022 ','T',0,'C');
}
}
$fpdf = new PDF();
$fpdf->SetTitle('Registro Nuevo Ingreso');
$fpdf->AddPage();
$fpdf->SetFont('helvetica','B',18);
$fpdf->Cell(0,10,'INSTITUTO POLITÉCNICO NACIONAL',0,1,'C');
$fpdf->SetFont('helvetica','',13);
$fpdf->Cell(0,10,'ESCUELA SUPERIOR DE CÓMPUTO',0,1,'C');
$fpdf->Image('../Images/LOGOIPN.png' ,null,15, 35 , 30,'PNG');
$fpdf->Image('../Images/EscudoESCOM.png' ,168,15, 30 , 30,'PNG');
$fpdf->Ln(15);
$fpdf->SetTextColor(0,102,153);
$fpdf->Cell(0,10,'REGISTRO NUEVO INGRESO','B',1,'C');
$fpdf->Ln(5);
$fpdf->SetTextColor(0,0,0);
$fpdf->Cell(0,10,$alumno[1]." ".$alumno[2]." ".$alumno[3],0,1,'C');
$fpdf->Ln(5);
$fpdf->SetTextColor(0,102,153);
$fpdf->Cell(190,10,'Datos Personales ','B',1,'C');
$fpdf->SetTextColor(0,0,0);
$fpdf->Cell(40,10,'Boleta: ',0,0,'J');
$fpdf->Cell(40,10,$alumno[0],0,0,'J');
$fpdf->Cell(70,10,'Fecha de Nacimiento: ',0,0,'J');
$fpdf->Cell(40,10,$alumno[4],0,1,'J');
$fpdf->Cell(40,10,'Género: ',0,0,'J');
$fpdf->Cell(40,10,$alumno[5],0,0,'J');
$fpdf->Cell(40,10,'CURP: ',0,0,'J');
$fpdf->Cell(70,10,$alumno[6],0,1,'J');
$fpdf->SetTextColor(0,102,153);
$fpdf->Ln(5);
$fpdf->Cell(190,10,'Contacto ','B',1,'C');
$fpdf->SetTextColor(0,0,0);
$fpdf->Cell(40,10,'Dirección: ',0,0,'J');
$fpdf->SetFont('helvetica','',12);
$fpdf->MultiCell(150,10,$alumno[7]." - ".$alumno[8],0,'J',false);
$fpdf->SetFont('helvetica','',13);
$fpdf->Cell(40,10,'Alcaldía: ',0,0,'J');
$fpdf->Cell(70,10,$alumno[9],0,1,'J');
$fpdf->Cell(40,10,'Teléfono: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[11],0,1,'J'); 
$fpdf->Cell(40,10,'C.P: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[10],0,1,'J');
$fpdf->Cell(40,10,'Correo: ',0,0,'J');
$fpdf->SetFont('helvetica','',13);
$fpdf->CellFitSpace(150,10,$alumno[12],0,1,'J');
$fpdf->SetFont('helvetica','',13);
$fpdf->SetTextColor(0,102,153);
$fpdf->Ln(5);
$fpdf->Cell(190,10,'Procedencia ','B',1,'C');
$fpdf->SetTextColor(0,0,0);
$fpdf->Cell(40,10,'Estado: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[13],0,1,'J');
$fpdf->Cell(40,10,'Escuela: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[14],0,1,'J'); 
$fpdf->Cell(40,10,'Promedio: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[15],0,1,'J');
$fpdf->Cell(40,10,'Opcion: ',0,0,'J');
$fpdf->Cell(150,10,$alumno[16],0,1,'J');
$fpdf->Ln(5);
$fpdf->SetTextColor(0,102,153);
$fpdf->Cell(0,10,'Exámen diagnóstico*','B',1,'C');
$fpdf->SetTextColor(0,0,0);
$fpdf->Cell(40,10,'Laboratorio: ','B',0,'J');
$fpdf->Cell(70,10,$alumno[17],'B',0,'J');
$fpdf->Cell(40,10,'Horario: ','B',0,'J');
$fpdf->Cell(40,10,$alumno[18],'B',0,'J'); 
$fpdf->Ln(20);
$fpdf->SetFont('helvetica','',9);
$fpdf->MultiCell(0,5,'*Recuerda que es de suma importancia que te presentes a tu exámen diagnóstico.
El exámen diagnóstico no determina tu lugar ya asignado en la ESCOM. ',0,'J',false);





$archivo = $fpdf->Output('S',$alumno[2]."".$alumno[3]."Registro.pdf",true);
$phpmailer->addStringAttachment($archivo,$alumno[2]."".$alumno[3]."Registro.pdf");
$phpmailer->Send();
echo "El mensaje se envió."
?>





