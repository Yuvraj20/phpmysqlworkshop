<?php
    require ("connect.php");
    session_start();
    $success="";
    $mail=$_SESSION['mail'];  
    $sname=$_SESSION['user'];   
    $select = "Select * FROM marks,student where student.id=marks.student_id AND student.email='$mail'"; 
    $result = mysqli_query($conn, $select);
    if(isset($_POST['parent_submit'])){ 
        $parent_email=(isset($_POST['parent_email']) ? $_POST['parent_email'] : null );
        if (mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
            $subject1=$row["sub1"];
            $subject2=$row["sub2"];
            $subject3=$row["sub3"];
            $totalobtained=$row['totalobtained'];
            $percentage=$row['percentage'];
            
            $to=$parent_email;
            $subject="$sname Marksheet";
            $headers="From: yuviomac@gmail.com";
            nl2br("New line will start from here\n in this string\r\n on the browser window");
            $body=" HTML : $subject1 \n PHP : $subject2 \n MYSQL : $subject3 \n Total : $totalobtained \n Percentage : $percentage";            
            mail($to,$subject,$body,$headers);      
            echo "Mail sent";      
            }    
        }                  
    }
    else echo "Please input all the parameters";
      
    ?>