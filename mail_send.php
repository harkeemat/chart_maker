<?php 

add_action( 'wp_ajax_mail_send', 'mail_send' );
    add_action( 'wp_ajax_nopriv_mail_send', 'mail_send' );
function mail_send(){
  ob_start();
  global $wpdb,$current_user,$wp;
  
  
  $risk_name=explode(",",$_POST['values']);
  $trader_name=explode(",",$_POST['trader_name']);
  $count=Count($risk_name);
  
 


  $to = 'harkeematbhullar92@gmail.com';
  $subject = $current_user->user_nicename.$current_user->id;
  $headers = "From: ".$current_user->user_email."\r\n";
$headers .= "Reply-To: ".$current_user->user_email."\r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
 
  $message .= '<div class="table-responsive"><table rules="all" style="border-color: #666;" cellpadding="10">';
  $message .= "<tr><td><strong>Deposite </strong> </td><td>".$_POST['amount'] ."</td></tr><tr><td><strong>Risk </strong> </td><td>".$_POST['risk'] ."</td></tr>
  <tr><td><strong>Fixed %P/L Risk </strong> </td><td>".$_POST['fixed'] ."</td></tr>";
  $message .="<tr><td><strong>Compounding Risk %P/L </strong> </td><td>".$_POST['compound'] ."</td></tr>";
  $message .="<tr><td><strong>Total $ %P/L</strong> </td><td>".$_POST['total'] ."</td></tr>";
  $message .="<tr><td><strong>Trader Name</strong> </td><td>";
  for($x=0; $x<$count; $x++){
    $message .= $trader_name[$x].",";
   }
    $message .="</td>";
    $message .="</tr>";
  $message .="<tr><td><strong>Trader Risk</strong> </td><td>";
  for($y=0; $y<$count; $y++){
    $message .= $risk_name[$y].",";
    }
    $message .="</td>";
  $message .="</tr>";
 
  $message .= "</table></div>";
  $message .= "</body></html>";
  mail($to, $subject, $message,$headers);
  
  ob_end_clean();


  echo json_encode( 'Send Email');
   die;   
}