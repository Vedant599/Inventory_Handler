<?php

include_once('../fpdf/fpdf.php');

$conn = mysqli_connect("localhost","root","","project_inventory_management","3306");
        $query=mysqli_query($conn,"SELECT * FROM customers where company_name = '".$_GET["customername"]."'");
        $row=mysqli_fetch_array($query);

if (isset($_GET["chalan_no"]))
{
    $pdf = new FPDF('P','mm',array(143,210));
    $pdf->Addpage();
   // $image1 = "../images/logo.png";
    $pdf->Rect(5,5,132,180);
    $pdf->SetFont("Arial","",8);
    //$pdf->Cell(10, 17, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 13), "T", 0,"R",false);
    $pdf->Cell(60,4,"MOB : 9821426800","LT",0,"L");
    $pdf->Cell(62,4,"MOB : 9321426800","TR",1,"R");
    $pdf->SetFont("Arial","B",26);
    $pdf->Cell(122,12,"Vedika Traders","LR",1,"C");
    $pdf->SetFont("Arial","",9);
    $pdf->Cell(122,5,"Dealers and manufacturers of Jewellery and Diamond Tools","LR",1,"C");
    $pdf->Cell(122,5,"A-305 Sarita Bldg. Prabhat Ind. Est. NR. Toll Naka Dahisar (E) Mumbai - 68 ","LBR",1,"C");
    //$pdf->Cell(122,5,"Dealers and manufacturers of Jewellery and Diamond Tools","LBR",1,"C");

    $pdf->Cell(122,4,"",0,1);
    $pdf->Cell(60,1,"","LTR",0);
    $pdf->Cell(62,1,"","LTR",1);
    $pdf->Cell(20,5,"M/s:","L",0);
    $pdf->Cell(40,5,$_GET["customername"],"R",0);
    $pdf->Cell(25,5,"Chalan NO :","L",0);
    $pdf->Cell(37,5,$_GET["chalan_no"],"R",1);
    $pdf->Cell(20,5,"Address:","L",0);
    $pdf->Cell(40,5,"Dahisar (E)","R",0);
    $pdf->Cell(25,5,"Order Date:","L",0);
    $pdf->Cell(37,5,$_GET["orderdate"],"R",1);
    $pdf->Cell(20,5,"Mob:","L",0);
    $pdf->Cell(40,5,$row["mobile"],"R",0);
    $pdf->Cell(25,5,"PO NO:","L",0);
    $pdf->Cell(37,5,$_GET["payment_type"],"R",1);
    $pdf->Cell(20,5,"GST Tin:","BL",0);
    $pdf->Cell(40,5,$row["gst"],"RB",0);
    $pdf->Cell(25,5,"Remarks:","LB",0);
    $pdf->Cell(37,5,"","RB",1);

    $pdf->Cell(122,4,"",0,1);
    $pdf->Cell(6,5,"#",1,0,"C");
    $pdf->Cell(68,5,"Description",1,0);
    $pdf->Cell(16,5,"QTY",1,0);
    $pdf->Cell(16,5,"Rate",1,0);
    $pdf->Cell(16,5,"Amt.",1,1);

    for ($i=0; $i <count($_GET["pid"]) ; $i++) { 
        $pdf->Cell(6,5,$i+1,"LR","C");
        if ($_GET["des"][$i] === "") {
            $pdf->Cell(68,5," ".$_GET["pro_name"][$i],"LR",0);
        }
        else{
            $pdf->Cell(68,5," ".$_GET["pro_name"][$i]." (".$_GET["des"][$i].")","LR",0);
        }
        
        
        $pdf->Cell(16,5," ".$_GET["qty"][$i],"LR",0);
        $pdf->Cell(16,5," ".$_GET["price"][$i],"LR",0);
        $pdf->Cell(16,5," ".$_GET["qty"][$i] * $_GET["price"][$i],"LR",1);
    }

    for ($i=0; $i < 12-count($_GET["pid"]) ; $i++) { 
            $pdf->Cell(6,5,"","LR","C");
            $pdf->Cell(68,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",1);
        }  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Sub Total","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["sub_total"],"LTBR",1);  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Frieght","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["gst"],"LTBR",1);  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Paid","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["paid"],"LTBR",1);  

        $pdf->Cell(6,5,"","LBR","C");
        $pdf->Cell(68,5,"","LBR",0);
        $pdf->Cell(31,5,"Amount To Pay","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["due"],"LTBR",1); 

        $pdf->Cell(70,7,"Total in Words (Rs.) ","LTB",0);
        $pdf->Cell(52,7,$_GET["amt"]." Rupees","TBR",1,"R");


        $pdf->Cell(122,14,"",0,1);
        $pdf->Cell(60,5,"Reciever Signature",0,0);
        $pdf->Cell(62,13,"",0,1,"R");      
                
    
    

    $pdf->Addpage();

    $pdf->SetFont("Arial","",8);
    //$pdf->Cell(10, 17, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 13), "T", 0,"R",false);

    $pdf->Rect(5,5,132,180);
    $pdf->Cell(60,4,"MOB : 9821426800","LT",0,"L");
    $pdf->Cell(62,4,"MOB : 9321426800","TR",1,"R");
    $pdf->SetFont("Arial","B",26);
    $pdf->Cell(122,12,"Vedika Traders","LR",1,"C");
    $pdf->SetFont("Arial","",9);
    $pdf->Cell(122,5,"Dealers and manufacturers of Jewellery and Diamond Tools","LR",1,"C");
    $pdf->Cell(122,5,"A-305 Sarita Bldg. Prabhat Ind. Est. NR. Toll Naka Dahisar (E) Mumbai - 68 ","LBR",1,"C");
    //$pdf->Cell(122,5,"Dealers and manufacturers of Jewellery and Diamond Tools","LBR",1,"C");

    $pdf->Cell(122,4,"",0,1);
    $pdf->Cell(60,1,"","LTR",0);
    $pdf->Cell(62,1,"","LTR",1);
    $pdf->Cell(20,5,"M/s:","L",0);
    $pdf->Cell(40,5,$_GET["customername"],"R",0);
    $pdf->Cell(25,5,"Chalan NO :","L",0);
    $pdf->Cell(37,5,$_GET["chalan_no"],"R",1);
    $pdf->Cell(20,5,"Address:","L",0);
    $pdf->Cell(40,5,"Dahisar (E)","R",0);
    $pdf->Cell(25,5,"Order Date:","L",0);
    $pdf->Cell(37,5,$_GET["orderdate"],"R",1);
    $pdf->Cell(20,5,"Mob:","L",0);
    $pdf->Cell(40,5,$row["mobile"],"R",0);
    $pdf->Cell(25,5,"PO NO:","L",0);
    $pdf->Cell(37,5,$_GET["payment_type"],"R",1);
    $pdf->Cell(20,5,"GST Tin:","BL",0);
    $pdf->Cell(40,5,$row["gst"],"RB",0);
    $pdf->Cell(25,5,"Remarks:","LB",0);
    $pdf->Cell(37,5,"","RB",1);

    $pdf->Cell(122,4,"",0,1);
    $pdf->Cell(6,5,"#",1,0,"C");
    $pdf->Cell(68,5,"Description",1,0);
    $pdf->Cell(16,5,"QTY",1,0);
    $pdf->Cell(16,5,"Rate",1,0);
    $pdf->Cell(16,5,"Amt.",1,1);

    for ($i=0; $i <count($_GET["pid"]) ; $i++) { 
        $pdf->Cell(6,5,$i+1,"LR","C");
        if ($_GET["des"][$i] === "") {
            $pdf->Cell(68,5," ".$_GET["pro_name"][$i],"LR",0);
        }
        else{
            $pdf->Cell(68,5," ".$_GET["pro_name"][$i]." (".$_GET["des"][$i].")","LR",0);
        }
        
        
        $pdf->Cell(16,5," ".$_GET["qty"][$i],"LR",0);
        $pdf->Cell(16,5," ".$_GET["price"][$i],"LR",0);
        $pdf->Cell(16,5," ".$_GET["qty"][$i] * $_GET["price"][$i],"LR",1);
    }

    for ($i=0; $i < 12-count($_GET["pid"]) ; $i++) { 
            $pdf->Cell(6,5,"","LR","C");
            $pdf->Cell(68,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",0);
            $pdf->Cell(16,5,"","LR",1);
        }  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Sub Total","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["sub_total"],"LTBR",1);  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Frieght","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["gst"],"LTBR",1);  

        $pdf->Cell(6,5,"","LR","C");
        $pdf->Cell(68,5,"","LR",0);
        $pdf->Cell(31,5,"Paid","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["paid"],"LTBR",1);  

        $pdf->Cell(6,5,"","LBR","C");
        $pdf->Cell(68,5,"","LBR",0);
        $pdf->Cell(31,5,"Amount To Pay","LTB",0);
        $pdf->Cell(1,5,"","TBR",0);
        $pdf->Cell(16,5," ".$_GET["due"],"LTBR",1); 

        $pdf->Cell(70,7,"Total in Words (Rs.) ","LTB",0);
        $pdf->Cell(52,7,$_GET["amt"]." Rupees","TBR",1,"R");


        $pdf->Cell(122,14,"",0,1);
        $pdf->Cell(60,5,"Reciever Signature",0,0);
        $pdf->Cell(62,5,"Signature",0,1,"R");
        $pdf->output();
}


?>