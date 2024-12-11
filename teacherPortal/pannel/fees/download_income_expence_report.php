<?php

$fdate=$_POST['datepicker'];
$tdate=$_POST['datepicker1'];
$schId=$_POST['schId'];


include('report_sett_top.php');






$gtschoolName ="select * from borno_school where borno_school_id=$schId";
					$qgstschoolName=$mysqli->query($gtschoolName);
					$shschname=$qgstschoolName->fetch_assoc();
                    $fnschname=$shschname['borno_school_name'];



require('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{

$this->SetFont('Arial','B',20);
$this->Cell(280,5,$GLOBALS['fnschname'],0,0,"C");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',10);
$this->Cell(120,5,"From : ",0,0,"R");
$this->SetFont('Arial','',10);
$this->Cell(20,5,$GLOBALS['fdate'],0,0,"L");
$this->SetFont('Arial','B',10);
$this->Cell(10,5,"To : ",0,0,"L");
$this->SetFont('Arial','',10);
$this->Cell(90,5,$GLOBALS['tdate'],0,0,"L");
$this->Ln();
$this->Cell(200,2,"",0,0,"C");
$this->SetFont('Arial','B',12); 
$this->Ln();
$this->Cell(280,5,"Income Expence Report",0,0,"C");
$this->Ln();
$this->Cell(200,5,"",0,0,"C");
$this->Ln();
$this->SetFont('Arial','B',11); 
$this->Cell(188,5,"Income",1,0,"C");
$this->Cell(92,5,"Expence",1,0,"C");
$this->Ln();
$this->Cell(47,5,"Previous Balance",1,0,"C");
$this->Cell(47,5,"Student Collection",1,0,"C");
$this->Cell(47,5,"Other Income",1,0,"C");
$this->Cell(47,5,"Bank Wihtdraw",1,0,"C");
$this->Cell(46,5,"Expence",1,0,"C");
$this->Cell(46,5,"Bank Deposit",1,0,"C");
$this->Ln();
$this->SetFont('Arial','B',10); 
$this->Cell(32,5,"Fund Name",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(32,5,"Fund Name",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(32,5,"Fund Name",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(32,5,"Fund Name",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(31,5,"Expence Head",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Cell(31,5,"Expence Head",1,0,"L");
$this->Cell(15,5,"Amount",1,0,"C");
$this->Ln();
	
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);
$pdf->SetFont('Arial','',8); 

$bornoschempty="UPDATE `borno_report_income_expence` SET `previous_balance`='', `previos_amount`='0',`student_collection`='', `student_amount`='0',`other_income`='', `other_amount`='0',`bank_withdraw`='', `withdraw_amount`='0',`expence_name`='', `expence_amount`='0',`bank_deposit`='', `deposit_amount`='0'"; 
	$qbornoschempty = $mysqli->prepare($bornoschempty);
	$qbornoschempty->execute();

$fdate=date("Y-m-d",strtotime($fdate));
$tdate=date("Y-m-d",strtotime($tdate));

$gtcentral="select * from borno_school_central_account where  	borno_school_date='$fdate'";
					$qgstcentral=$mysqli->query($gtcentral);
					$stcentral=$qgstcentral->fetch_assoc();
                    $previousbalance=$stcentral['previous_balance'];
                    $studcollection=$stcentral['student_collection'];
                    $otherincome=$stcentral['bank_withdraw'];
                    $bankwithdraw=$stcentral['other_income'];
                    $expam=$stcentral['expence'];
                    $bankdeposit=$stcentral['bank_deposit'];
                    $balance=$stcentral['balance'];
                    
$bornoschBranch="UPDATE `borno_report_income_expence` SET `previous_balance`='Previous Balance', `previos_amount`='$previousbalance' where `borno_report_income_expence_id`='1'"; 
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();                    

$stdtotalinocme=0;
$stdtotal=array();
$totalother=array();
$totalotherinocme=0; 


  $result ="select * from borno_school_receipt where borno_school_date between '$fdate' AND '$tdate' AND borno_school_id='$schId' group by borno_school_fund_id asc";
		$qresult=$mysqli->query($result);
		$sl=0;
		while($shgresult=$qresult->fetch_assoc()){$sl++;

		
		$fund=$shgresult['borno_school_fund_id'];
$totalamount=0;		
$total = array();		
		
$gtreceipt ="select * from borno_school_receipt where borno_school_date between '$fdate' AND '$tdate' AND borno_school_fund_id='$fund' AND borno_school_id='$schId' order by borno_school_memo,borno_school_sub_fund_id asc";
					$qgstreceipt=$mysqli->query($gtreceipt);
					while($streceipt=$qgstreceipt->fetch_assoc()){
					    
		$stamount=$streceipt['borno_school_fee'];
        $total[]=$stamount;
        $totalamount=array_sum($total);					    
					    
					}


$gtClassName ="select * from borno_school_fund where  borno_school_fund_id='$fund'";
					$qgstClassName=$mysqli->query($gtClassName);
					$stClassName=$qgstClassName->fetch_assoc();
                    $fststgtfund=$stClassName['borno_school_fund_name'];
                    
$bornoschBranch="UPDATE `borno_report_income_expence` SET `student_collection`='$fststgtfund', `student_amount`='$totalamount' where `borno_report_income_expence_id`='$sl'"; 
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();


        $stdtotal[]=$totalamount;
        $stdtotalinocme=array_sum($stdtotal);        


}


$gtshift ="select * from borno_school_other_income where borno_school_other_income_date between '$fdate' AND '$tdate' AND borno_school_id='$schId' group by borno_school_income_head asc";
					$qgstshifte=$mysqli->query($gtshift);
					$sl=0;
					while($stgtshift=$qgstshifte->fetch_assoc()){$sl++;
					$inhead=$stgtshift['borno_school_income_head'];    
					

$totalinamn=0;		
$intotal = array();
$gtsection = "select * from borno_school_other_income where borno_school_other_income_date between '$fdate' AND '$tdate' AND borno_school_income_head='$inhead' AND borno_school_id='$schId' order by borno_school_other_income_memo asc";
					$qgstsection=$mysqli->query($gtsection);
					while($stgtsection=$qgstsection->fetch_assoc())
					{
$intotal[]=$stgtsection['borno_school_income_amount'];					    
$totalinamn=array_sum($intotal);					    
}

$bornoschBranch="UPDATE `borno_report_income_expence` SET `other_income`='$inhead', `other_amount`='$totalinamn' where `borno_report_income_expence_id`='$sl'"; 
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();

 
$totalother[]=$totalinamn;
$totalotherinocme=array_sum($totalother); 

}
	

    $getwithdraw="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date between '$fdate' AND '$tdate' AND borno_school_transection_type=2";
	$qgetwithdraw =$mysqli->query($getwithdraw);
	while($shgetwithdraw=$qgetwithdraw->fetch_assoc()){
		
		$getwith[]=$shgetwithdraw['borno_school_amount'];
		}
			$withdrawamount=array_sum($getwith);

$withd="Bank Withdraw";
$bornoschBranch="UPDATE `borno_report_income_expence` SET `bank_withdraw`='$withd', `withdraw_amount`='$withdrawamount' where `borno_report_income_expence_id`='1'";  
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();
	
$totalincome1=$totalotherinocme+$withdrawamount+$stdtotalinocme;	
//-----------------------------Expence-------------------------------
$pdf->SetFont('Arial','',8); 
$alltotalexpence=0;
$totalexin=array();

$gtshift1 ="select * from borno_school_expence where borno_school_ex_date between '$fdate' AND '$tdate' AND borno_school_id='$schId' group by borno_school_exhead asc";
					$qgstshifte1=$mysqli->query($gtshift1);
					$sl=0;
					while($stgtshift1=$qgstshifte1->fetch_assoc()){$sl++;
					$inexhead=$stgtshift1['borno_school_exhead']; 
$totalexpence=0;		
$intotalex = array();

$gtsection1 = "select * from borno_school_expence where borno_school_ex_date between '$fdate' AND '$tdate' AND borno_school_exhead='$inexhead' AND borno_school_id='$schId' order by borno_school_expence_memo asc";
					$qgstsection1=$mysqli->query($gtsection1);
					while($stgtsection1=$qgstsection1->fetch_assoc())
					{
$intotalex[]=$stgtsection1['borno_school_expence_amount'];
$totalexpence=array_sum($intotalex);					
					    
					}
$totalexin[]=$totalexpence;
$alltotalexpence=array_sum($totalexin);

$bornoschBranch="UPDATE `borno_report_income_expence` SET `expence_name`='$inexhead', `expence_amount`='$totalexpence' where `borno_report_income_expence_id`='$sl'";  
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();


					}
					

    $getdeposit="select * from borno_school_bank where borno_school_id='$schId' AND borno_school_date between '$fdate' AND '$tdate' AND borno_school_transection_type=1";
	$qgetdeposit =$mysqli->query($getdeposit);
	while($shgetdeposit=$qgetdeposit->fetch_assoc()){
		
		$getdep[]=$shgetdeposit['borno_school_amount'];
		}
			$depositamount=array_sum($getdep);

$withd="Bank Deposit";
$bornoschBranch="UPDATE `borno_report_income_expence` SET `bank_deposit`='$withd', `deposit_amount`='$depositamount' where `borno_report_income_expence_id`='1'";  
	$qbornoschBranch = $mysqli->prepare($bornoschBranch);
	$qbornoschBranch->execute();
$alltotalexpence1=$alltotalexpence+$depositamount;					


$gtinex ="select * from borno_report_income_expence where previous_balance!='' OR student_collection!='' OR other_income!='' OR bank_withdraw!='' OR expence_name!='' OR bank_deposit!='' order by borno_report_income_expence_id asc";
					$qgstinex=$mysqli->query($gtinex);
					while($strinex=$qgstinex->fetch_assoc()){
					    
		$balance1=$strinex['previous_balance'];
		$balance2=$strinex['previos_amount'];
		$balance3=$strinex['student_collection'];
		$balance4=$strinex['student_amount'];
		$balance5=$strinex['other_income'];
		$balance6=$strinex['other_amount'];
		$balance7=$strinex['bank_withdraw'];
		$balance8=$strinex['withdraw_amount'];
		$balance9=$strinex['expence_name'];
		$balance10=$strinex['expence_amount'];	
		$balance11=$strinex['bank_deposit'];
		$balance12=$strinex['deposit_amount'];		
$pdf->Cell(32,5,$balance1,1,0,"L");
if($balance1=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance2/-",1,0,"C");}	

$pdf->Cell(32,5,$balance3,1,0,"L");
if($balance3=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance4/-",1,0,"C");}

$pdf->Cell(32,5,$balance5,1,0,"L");
if($balance5=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance6/-",1,0,"C");}

$pdf->Cell(32,5,$balance7,1,0,"L");
if($balance7=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance8/-",1,0,"C");}

$pdf->Cell(31,5,$balance9,1,0,"L");
if($balance9=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance10/-",1,0,"C");}

$pdf->Cell(31,5,$balance11,1,0,"L");
if($balance11=="")
{
$pdf->Cell(15,5,"",1,0,"C");    
}
else{$pdf->Cell(15,5,"$balance12/-",1,0,"C");}
$pdf->Ln();					    
}

                    $previousbalance=$stcentral['previous_balance'];
                    $studcollection=$stcentral['student_collection'];
                    $otherincome=$stcentral['bank_withdraw'];
                    $bankwithdraw=$stcentral['other_income'];
                    $expam=$stcentral['expence'];
                    $bankdeposit=$stcentral['bank_deposit'];
                    $balance=$stcentral['balance'];	
$incom=$previousbalance+$studcollection+$otherincome+$bankwithdraw;
$expence=$bankdeposit+$expam;
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(188,5,"Total Income : $incom/-",1,0,"C");				
$pdf->Cell(92,5,"Total Expence : $expence/-",1,0,"C");
$pdf->Ln();
$pdf->Cell(280,5,"Balance : $balance/-",1,0,"C");
$pdf->Output();
?>