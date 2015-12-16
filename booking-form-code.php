<?php

include_once('db.php');

    $promoCode = parse_ini_file('config.ini',true)['promoCode'];
    
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
    $PromoDis = mysql_real_escape_string($_POST['PromoDis']);
    $grandTotal = mysql_real_escape_string($_POST['grandTotal']);

    


    if($lodging_id == "" && $lodging_id == null) {
        $lodging_id = null;
    }
    if($transport_id == "" && $transport_id == null) {
        $transport_id = null;
    }
    if($tourID == "" || $tourID == null) {
        $book_reff_id = $guideID;
        $booking_type = "GUIDE";
        $bookedItemName = mysql_real_escape_string($_POST['guideName']);
        $itemPrice = mysql_real_escape_string($_POST['guidePrice']);
            
    }
    if($guideID == "" || $guideID == null) {
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
        '$promoCode',
        500,
        $grandTotal,
        1,
        now()
    )
    ");

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
		
		SendMail($HostEmail, 'GuidedGateway', 'ankitbhagat.ab@gmail.com', 'Ankit Bhagat', $subject, $message);
//		SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message);
    }
    else
    {
        echo "insertion fail";
    }

PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $dateOfTour, $tourDuration, $lodging_id, $transport_id, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $lodging_id, $transport_id, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber);



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
    function PDFGeneration($tourist_name, $tourist_email, $tourist_mobile, $noOfPerson, $dateOfTour, $tourDuration, $lodging_id, $transport_id, $PromoCode, $serviceTax, $swachhTax, $PromoDis, $grandTotal, $lodging_id, $transport_id, $book_reff_id, $booking_type, $bookedItemName, $itemPrice, $bookingNumber)
    {
require_once('invoice.php');

$pdf = new PDF_Invoice( 'P', 'mm', 'A6' );
$pdf->AddPage();
$pdf->addSociete( "Guided Gateway",
                  "Email: support@xmapledatalab.com \n" .
                  "Contact: +1 510 938 2562 ");
$pdf->addDate( date("d-m-Y") );
$pdf->addClientAdresse("Ste\nM. " . $tourist_name . "\nEmail: " . $tourist_email . "\n" . $tourist_mobile . "");
$pdf->addReference("Booking for ".$booking_type."");
$cols=array( "S.NO."    => 30.5,
             "".$booking_type." Booking Detail"  => 96,
             "Price" => 30 );
$pdf->addCols( $cols);
$cols=array( "S.NO."    => "C",
             "".$booking_type." Booking Detail"  => "L",
             "Price"     => "R");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 90;
$line = array( "S.NO."    => "1",
               "".$booking_type." Booking Detail"  => "".$booking_type." ID : ". $book_reff_id."\n" .$bookedItemName."",
               "Price"     => $itemPrice     );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$line = array( "S.NO."    => "2",
               "".$booking_type." Booking Detail"  => "Promo Code",
               "Price"      => "-".$PromoDis."");
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;


$pdf->Output();

    }

?>