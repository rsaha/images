<?php

include_once('db.php');

//    $promoCode = parse_ini_file('config.ini',true)['promoCode'];
    
    $tourist_name = mysql_real_escape_string($_POST['tourist_name']);
    $tourist_email = mysql_real_escape_string($_POST['tourist_email']);
    $tourist_mobile = mysql_real_escape_string($_POST['tourist_mobile']);
    $noOfPerson = mysql_real_escape_string($_POST['noOfPerson']);
    $dateOfTour = mysql_real_escape_string($_POST['dateOfTour']);
    $tourDuration = mysql_real_escape_string($_POST['tourDuration']);
    $lodging_id = mysql_real_escape_string($_POST['lodging_id']);
    $transport_id = mysql_real_escape_string($_POST['transport_id']);
    $PromoCode = mysql_real_escape_string($_POST['promoCode']);
    $tourID = mysql_real_escape_string($_POST['tourID']);
    $guideID = mysql_real_escape_string($_POST['guideID']);
    $serviceTax = mysql_real_escape_string($_POST['serviceTax']);
    $swachhTax = mysql_real_escape_string($_POST['swachhTax']);
    $PromoCode = mysql_real_escape_string($_POST['promoCode']);
    $PromoDis = mysql_real_escape_string($_POST['PromoDis']);
    $grandTotal = mysql_real_escape_string($_POST['grandTotal']);

    


    if($lodging_id == "" || $lodging_id == NULL) {
        $lodging_id = "NULL";
    }
    if($transport_id == "" || $transport_id == NULL) {
        $transport_id = "NULL";
    }
    if($PromoCode == "" || $PromoCode == NULL) {
        $PromoCode = "NULL";
        $promoDis = "NULL";
    }
    if($tourID == "" || $tourID == NULL) {
        $book_reff_id = $guideID;
        $booking_type = "GUIDE";
        $bookedItemName = mysql_real_escape_string($_POST['guideName']);
        $itemPrice = mysql_real_escape_string($_POST['guidePrice']);
            
    }
    if($guideID == "" || $guideID == NULL) {
        $book_reff_id = $tourID;
        $booking_type = "TOUR";
        $bookedItemName = mysql_real_escape_string($_POST['tourName']);
        $itemPrice = mysql_real_escape_string($_POST['tourPrice']);
    }

    $bookingNumber = AutoGenerateBookingNumber();

    $select2 = mysql_query("INSERT INTO `tbl_booking`(
        `user_id`, 
        `booking_number`, 
        `book_reff_id`, 
        `booking_type`, 
        `name`, 
        `email`, 
        `contact`, 
        `no_of_person`, 
        `date_of_tour`, 
        `tour_duration`, 
        `lodging_id`, 
        `transport_id`, 
        `promoCode`, 
        `promoCodeAmount`, 
        `total_price`, 
        `status`, 
        `date_created`
    ) VALUES (
        NULL,
        '$bookingNumber',
        $book_reff_id,
        '$booking_type',
        '$tourist_name',
        '$tourist_email',
        '$tourist_mobile',
        $noOfPerson,
        '$dateOfTour',
        $tourDuration,
        $lodging_id,
        $transport_id,
        '$PromoCode',
        $promoDis,
        $grandTotal,
        1,
        now()
    )
    ") or die(mysql_error());

    if($select2)
    {
        include_once('sendEmail.php');
		$HostEmail = parse_ini_file('config.ini',true)['email'];
		$subject = "A Tourist hase booked a " .$booking_type;
		$message    = "<b> A touriest with the following information has booked the " . $booking_type . "... </b><br>
        <table> 
        <tr> 
        <td>Tourest Name </td> 
        <td>:&nbsp;&nbsp;" . $tourist_name . "</td> 
        </tr> 
        <tr> 
        <td>Tourest Email </td> 
        <td>:&nbsp;&nbsp;" . $tourist_email . "</td> 
        </tr> 
        <tr> 
        <td>Tourest Contact </td> 
        <td>:&nbsp;&nbsp;" . $tourist_mobile . "</td> 
        </tr> 
        <tr> 
        <td>Booked ". $booking_type ." ID </td> 
        <td>:&nbsp;&nbsp;". $book_reff_id ."</td> 
        </tr> 
        <tr> 
        <td>Date Of Tour </td> 
        <td>:&nbsp;&nbsp;". $dateOfTour ."</td> 
        </tr> 
        <tr> 
        <td><b>Booking Number </b></td> 
        <td><b>:&nbsp;&nbsp;". $bookingNumber ."</b></td> 
        </tr> 
        <tr> 
        <td><b>Booking Amount </td> 
        <td><b>:&nbsp;&nbsp;". $grandTotal ."</b></td> 
        </tr> 
        </table> 
        <br><br> -----------------------------<br>";
		
//		SendMail($HostEmail, 'GuidedGateway', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $subject, $message);
		SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message);
        
        PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $dateOfTour, $tourDuration, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber,$lodging_id, $transport_id);

    }
    else
    {
        echo "insertion fail";
    }




//==========================================================================================================
    function AutoGenerateBookingNumber()
    {
        $select1 = mysql_query("SELECT * FROM `tbl_booking` WHERE `date_created` = DATE(now())");
        $count4booking = mysql_num_rows($select1);
        
        if($count4booking==0)
        {
            $bkn="1";
        }
        else
        {
            $bkn = $count4booking + 1;
        }
        
        $bkNo = "B". date("ymd") . str_pad($bkn, 4, '0', STR_PAD_LEFT);
        return $bkNo;
        
        
    }
//==========================================================================================================
    function PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $dateOfTour, $tourDuration, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber,$lodging_id, $transport_id)
    {
        
        require('fpdf/fpdf.php');
        $pdf = new FPDF();
 
        $pdf->AddPage();

        $pdf->Image('guidedImg.png',10,10,100);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(101);
        $pdf->Cell(0,20,'GuidedGateway!',0,0,"L");
        $pdf->Cell(-89); 
        $pdf->Cell(0,30,'Email: support@xmapledatalab.com',0,0,"L");
        $pdf->Cell(-89); 
        $pdf->Cell(0,40,'Contact: +91 9830032920',0,0,"L");
        $pdf->Ln(5);

        $pdf->Cell(0,50,'Invoice Date : '. date("d.m.Y"),0,1,"R");
        $pdf->SetFont('Arial','I',10);
        $pdf->SetTextColor(62,66,67);
        $pdf->Cell(0,0,'Tourest Name : Ashutosh Goel',0,1,"R");
        $pdf->Cell(0,10,'Tourest Contact : 8532859600',0,1,"R");
        $pdf->Cell(0,0,'Tourest Email : acewin4u@gmail.com',0,1,"R");
        $pdf->SetFont('Arial','B',10);
        $pdf->SetTextColor(62,66,67);
        $pdf->Cell(0,10,'Date Of Tour : '. date("d.m.Y"),0,1,"R");

        $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");
        
        //======Booked Tour===================
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,6,'Booked Tour     Tour Id:50001',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Agra Fort Tour',0,1,"L");
        $pdf->Cell(0,5,'Tour Duration : 6 Days',0,1,"L");
        $pdf->Cell(0,5,'Number Of person : 2 Adult, 1 Child',0,1,"L");
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,6,'Guide Name : Gopal Chand        Guide Id : 10001',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Pickup Location :IGI Terminal 3, Delhi',0,1,"L");
        $pdf->Cell(0,5,'Drop Location : Kashmeri Gate, Delhi',0,1,"L");
        
        $pdf->Cell(0,5,'Price : Rs 4000',0,1,"R");
        
        //======Booked Tour===================
        $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,6,'Hotel     Lodging Id:5001',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Lodging Service Name',0,1,"L");
        
        $pdf->Cell(0,5,'Price : Rs 2000',0,1,"R");
        
        //======Booked Tour===================
        $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,6,'Cab     Transport Id:5001',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Transport Service Name',0,1,"L");
        
        $pdf->Cell(0,5,'Price : Rs 1500',0,1,"R");
        
        //======Booked Tour===================
        $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,6,'Promo Code     DIS500',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Discount',0,1,"L");
        
        $pdf->Cell(0,5,'Price : Rs (-)500',0,1,"R");
        
        //======Booked Tour===================
        $pdf->Ln(2);
        $pdf->Cell(140);$pdf->Cell(50,0,' ',1,1,"R");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,5,'Total',0,1,"L");
        $pdf->Cell(0,5,'Price : Rs 7000',0,1,"R");
        
        //======Booked Tour===================
        $pdf->Ln(2);
        $pdf->Cell(140);$pdf->Cell(50,0,' ',1,1,"R");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,5,'Grand Total (Tax Inc.)',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Service Tax @ 14%',0,1,"L");
        $pdf->Cell(0,5,'Swachh Bharat Tax @ 0.5%',0,1,"L");
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,5,'Price : Rs 7650',0,1,"R");
        
        $pdf->Ln(19);

        $pdf->SetFont('Arial','',9);
        $pdf->Cell(0,5,'',0,1,"C");
        $pdf->Cell(0,5,'Inclusive, Exclusive, Cancelation Policy',0,1,"C");
        

        $pdf->Output();

    }

?>