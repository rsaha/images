<?php

include_once('db.php');

//    $promoCode = parse_ini_file('config.ini',true)['promoCode'];
    
    $tourist_name = mysql_real_escape_string($_POST['tourist_name']);
    $tourist_email = mysql_real_escape_string($_POST['tourist_email']);
    $tourist_mobile = mysql_real_escape_string($_POST['tourist_mobile']);
    $noOfPerson = mysql_real_escape_string($_POST['noOfPerson']);
    $noOfPersonChild = mysql_real_escape_string($_POST['noOfPersonChild']);

    $dateOfTour = mysql_real_escape_string($_POST['dateOfTour']);
    
    
    $lodging_id = mysql_real_escape_string($_POST['lodging_id']);
    if(!(is_null($lodging_id)))
    {
        $lodging_name = mysql_real_escape_string($_POST['lodging_name']);
        $lodging_price = mysql_real_escape_string($_POST['lodging_price']);
    }
    $transport_id = mysql_real_escape_string($_POST['transport_id']);
    if(!(is_null($transport_id)))
    {
        $transport_name = mysql_real_escape_string($_POST['transport_name']);
        $transport_price = mysql_real_escape_string($_POST['transport_price']);
    }
    $tourID = mysql_real_escape_string($_POST['tourID']);
    $guideID = mysql_real_escape_string($_POST['guideID']);
    $serviceTax = mysql_real_escape_string($_POST['serviceTax']);
    $swachhTax = mysql_real_escape_string($_POST['swachhTax']);
    $PromoCode = mysql_real_escape_string($_POST['promoCode']);
    $PromoDis = mysql_real_escape_string($_POST['PromoDis']);
    $gTotal = mysql_real_escape_string($_POST['gTotal']);
    $grandTotal = mysql_real_escape_string($_POST['grandTotal']);
    $grandTotalTemp = str_replace( ',', '', $grandTotal );
    if( is_numeric( $grandTotalTemp ) ) {
        $grandTotal = $grandTotalTemp;
    }

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
    else
    {
        $promoDis=$PromoDis;
    }
    if($PromoDis==0)
    {
        $PromoCode = "NULL";
        $promoDis = "NULL";
    }
    if($tourID == "" || $tourID == NULL) {
        $book_reff_id = $guideID;
        $booking_type = "GUIDE";
        $bookedItemName = mysql_real_escape_string($_POST['guideName']);
        $itemPrice = mysql_real_escape_string($_POST['guidePrice']);
        $tourDuration = mysql_real_escape_string($_POST['tourDurationG']);
        $guideName = mysql_real_escape_string($_POST['guideName']);
        
        $guideMobileNumber = mysql_real_escape_string($_POST['guideMobileNumber']);
        $guideSummary = mysql_real_escape_string($_POST['guideSummary']);
        $guidePaymentTerm = mysql_real_escape_string($_POST['guidePaymentTerm']);
        
        $tGuideID = "NULL";
        $tGuideName = "NULL";
        $inclusive = "NULL";
        $exclusice = "NULL";
        $cancelationPolicy = "NULL";
        $restrictions = "NULL";
        $PickupLocation = "NULL";
        $DropLocation = "NULL";
    }
    if($guideID == "" || $guideID == NULL) {
        $book_reff_id = $tourID;
        $booking_type = "TOUR";
        $bookedItemName = mysql_real_escape_string($_POST['tourName']);
        $itemPrice = mysql_real_escape_string($_POST['tourPrice']);
        $tourDuration = mysql_real_escape_string($_POST['tourDurationT']);
        
        $tGuideID = mysql_real_escape_string($_POST['tGuideID']);
        $tGuideName = mysql_real_escape_string($_POST['tGuideName']);
        $inclusive = mysql_real_escape_string($_POST['tInclusive']);
        $exclusice = mysql_real_escape_string($_POST['tExclusice']);
        $cancelationPolicy = mysql_real_escape_string($_POST['tCancelationPolicy']);
        $restrictions = mysql_real_escape_string($_POST['tRestrictions']);
        $PickupLocation = mysql_real_escape_string($_POST['PickupLocation']);
        $DropLocation = mysql_real_escape_string($_POST['DropLocation']);
         
        $guideMobileNumber = "NULL";
        $guideSummary = "NULL";
        $guidePaymentTerm = "NULL";
    }
$tGuideID = mysql_real_escape_string($_POST['tGuideID']);
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
    ")  or die('Error : ' . mysql_error());

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
//		SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message);

        PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $noOfPersonChild, $dateOfTour, $tourDuration, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber,$lodging_id, $lodging_name, $lodging_price, $transport_id, $transport_name, $transport_price, $gTotal, $tourID, $guideID, $tGuideID, $tGuideName, $inclusive, $exclusice, $cancelationPolicy, $restrictions, $guideMobileNumber, $guideSummary, $guidePaymentTerm, $PickupLocation, $DropLocation);

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
    function PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $noOfPersonChild, $dateOfTour, $tourDuration, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber,$lodging_id, $lodging_name, $lodging_price, $transport_id, $transport_name, $transport_price, $gTotal, $tourID, $guideID, $tGuideID, $tGuideName, $inclusive, $exclusice, $cancelationPolicy, $restrictions, $guideMobileNumber, $guideSummary, $guidePaymentTerm, $PickupLocation, $DropLocation)
    {
//        $serviceTax
//        $swachhTax
            
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
        $pdf->Cell(0,30,'',0,1,"L");
        $pdf->Cell(0,0,'Invoice Date : '. date("d.m.Y"),0,1,"R");
        $pdf->Cell(0,10,'Booking Number : '.$bookingNumber,0,1,"R");
        $pdf->Cell(0,10,'',0,1,"L");
        $pdf->SetFont('Arial','I',10);
        $pdf->SetTextColor(62,66,67);
        $pdf->Cell(0,0,'Tourest Name : '.$tourist_name,0,1,"R");
        $pdf->Cell(0,10,'Tourest Contact : '.$tourist_mobile,0,1,"R");
        $pdf->Cell(0,0,'Tourest Email : '.$tourist_email,0,1,"R");
        $pdf->SetFont('Arial','B',10);
        $pdf->SetTextColor(62,66,67);
        $pdf->Cell(0,10,'Date Of Tour : '. $dateOfTour,0,1,"R");

        $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");
        
        //======Booked Tour/Guide===================
        if(((int)$tourID))
        {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,'',0,1,"L");
            $pdf->Cell(0,5,$bookedItemName,0,1,"L");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,6,'Booked '.$booking_type.' Id : '.$book_reff_id,0,1,"L");
            $pdf->Cell(0,5,'Tour Duration : '.$tourDuration .' Day(s)',0,1,"L");
            $pdf->Cell(0,5,'Number Of person : '.$noOfPerson.' Adult, '.$noOfPersonChild.' Child',0,1,"L");
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(0,6,'Guide Name : '.$tGuideName.' (Guide Id : '.$tGuideID.')',0,1,"L");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,5,'Pickup Location : '. $PickupLocation ,0,1,"L");
            $pdf->Cell(0,5,'Drop Location : '. $DropLocation,0,1,"L");

            $pdf->Cell(0,5,'Price : Rs '.$itemPrice,0,1,"R");
        }
        if(((int)$guideID))
        {
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,'',0,1,"L");
            $pdf->Cell(0,5,'Guide: '.$bookedItemName,0,1,"L");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,6,'Booked '.$booking_type.' Id:'.$book_reff_id,0,1,"L");
            $pdf->Cell(0,5,'Guide Mobile Numer : '.$guideMobileNumber,0,1,"L");
            $pdf->Cell(0,5,'Tour Duration : '.$tourDuration,0,1,"L");
            $pdf->Cell(0,5,'Number Of person : '.$noOfPerson.' Adult, '.$noOfPersonChild.' Child',0,1,"L");
            $pdf->SetFont('Arial','',10);

            $pdf->Cell(0,5,'Price : Rs '.$itemPrice,0,1,"R");
        }
        
        
        
        //======Lodging===================
        if(((int)$lodging_id))
        {
            $pdf->Ln(2);
            $pdf->Cell(0,0,' ',1,1,"L");

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,'',0,1,"L");
            $pdf->Cell(0,6,'Lodging (Id:'.$lodging_id.')',0,1,"L");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,5,$lodging_name,0,1,"L");

            $pdf->Cell(0,5,'Price : Rs '.$lodging_price,0,1,"R");
        }
        //======Transport===================
        if(((int)$transport_id))
        {
             $pdf->Ln(2);
            $pdf->Cell(0,0,' ',1,1,"L");

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,'',0,1,"L");
            $pdf->Cell(0,6,'Transport (Id:'.$transport_id.')',0,1,"L");
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,5,$transport_name,0,1,"L");

            $pdf->Cell(0,5,'Price : Rs '.$transport_price,0,1,"R");
        }
        
        //======$PromoCode===================
        if($PromoDis)
        {
            $pdf->Ln(2);
        $pdf->Cell(0,0,' ',1,1,"L");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,6,'Promo Code \''.$PromoCode.'\'',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Discount',0,1,"L");

        $pdf->Cell(0,5,'Price : Rs (-)'.$PromoDis,0,1,"R");
        }
        
        //======Total===================
        $pdf->Ln(2);
        $pdf->Cell(140);$pdf->Cell(50,0,' ',1,1,"R");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,5,'Total',0,1,"L");
        $pdf->Cell(0,5,'Price : Rs '.$gTotal,0,1,"R");
        
        //======Grand Total===================
        $pdf->Ln(2);
        $pdf->Cell(140);$pdf->Cell(50,0,' ',1,1,"R");

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,5,'',0,1,"L");
        $pdf->Cell(0,5,'Grand Total (Tax Inc.)',0,1,"L");
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Service Tax @ 14%',0,1,"L");
        $pdf->Cell(0,5,'Swachh Bharat Tax @ 0.5%',0,1,"L");
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,5,'Price : Rs '.$grandTotal,0,1,"R");
        
        $pdf->SetY(-41);
        $pdf->SetFont('Arial','I',9);
        
        if(((int)$tourID))
        {
            $pdf->Cell(0,5,'Inclusive :'.$inclusive,0,1,'L');
            $pdf->Cell(0,5,'Exclusive :'.$exclusice,0,1,'L');
            $pdf->Cell(0,5,'Cancelation Policy :'.$cancelationPolicy,0,1,'L');
            $pdf->Cell(0,5,'Restriction :'.$restrictions,0,1,'L');
        }
        if(((int)$guideID))
        {
            $pdf->Cell(0,5,'Guide Summary :'.$guideSummary,0,1,'L');
            $pdf->Cell(0,5,'Guide Payment Term :'.$guidePaymentTerm,0,1,'L');
        }
        
        $pdf->Output();
    }
?>