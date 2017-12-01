<?php  
    $name=$_POST['name'];  
    $college=$_POST['college'];  
    $major=$_POST['major'];  
    $ID=$_POST['ID'];  
    $phone=$_POST['phone'];  
    $mail=$_POST['mail'];  
    $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];  
    //设置时区  
    date_default_timezone_set('Asia/Shanghai');  
    //按指定格式输出日期  
    $date=date('Y-m-d H:i');  
  
?>  
<!DOCTYPE html>  
<html>  
<head lang="zh_CN">  
    <meta charset="UTF-8">  
    <title>报名结果</title>  
</head>  
<body>  
<?php  
    echo "<h2> $name 的报名结果";
    echo '<p>报名提交时间：'.$date.'</p>';  
    if(strlen($name)==0){  
        echo '您没有填写名字';  
    }else{  
        if(strlen($college)>0){  
            echo  "学院： $college <br/>" ;  
        }  
        if(strlen($major)>0){  
            echo  "班级 $major <br/>" ;  
        }  
        if(strlen($phone)>0){  
            echo "电话： $phone<br/>";  
        }  
        if(strlen($mail)>0){  
            echo "邮箱: $mail <br/>";  
        }  
        if(strlen($ID)>0){  
            echo "学号: $ID <br/>";  
        }
    }  
    // //设置文件输出内容和格式  
    $out_put_string=$date."\t姓名：".$name ."\t学院：".$college ."\t班级".$major."\t学号". $ID."\t电话：". $phone."\t邮箱:". $mail."\n" ;  
    echo $out_put_string;
    //打开文件,（追加模式+二进制模式） 
    @$fp=fopen("./newMember.txt",'a+');  
    flock($fp,LOCK_EX);  
    if(!$fp){  
        echo "<p><strong>您的报名没有提交完成，请再试一次。或者联系：15927681243</strong></p></body></html>"; 
        // echo "<a href="./index.html">重试</a>";
        exit;  
    }  
    //将数据写入到文件  
    fwrite($fp,$out_put_string,strlen($out_put_string));  
    flock($fp,LOCK_UN);  
    //关闭文件流  
    fclose($fp);  
    echo "<p>数据保存完成</p>";  

  
?>  
</body>  
</html>  