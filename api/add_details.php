<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign";
$con= new mysqli($servername, $username, $password, $dbname);
$con->set_charset("utf8");

$employees = [];

$inserted_emails = [];
$inserted_phones = [];
$inserted_employee_ids = [];

$_SESSION['insert_success'] = 0;
$_SESSION['insert_fail'] = 0;

$link = "http://" .$_SERVER['HTTP_HOST'] . "/task";


$i = 0;
if(isset($_POST["submit"])){
    
    echo $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                $datas = explode(";",$getData[0]);
                if(count($count) <= 1){
                    $error = "Hatalı csv Dosyası";
                    header("Location: $link");
                }
                    
                if ($i == 0)
                {
                    if ($datas[0] != 'name' || $datas[1] != 'surname' || $datas[2] != 'email' || $datas[3] != 'employee_id' || $datas[4] != 'phone' || $datas[5] != 'point')
                    {
                        $error = "Hatalı csv Dosyası";
                    }else{
                        $i++;
                        continue;
                    }
                }
                $data['name'] = $datas[0];
                $data['surname'] = $datas[1];
                $data['email'] = $datas[2];
                $data['employee_id'] = $datas[3];
                $data['phone'] = $datas[4];
                $data['point'] = $datas[5];

                $employees[] = $data;
                $i++;
           }
           $insert_success = 0;
           $insert_fail = 0;
           foreach($employees as $employee){
                if (!filter_var($employee['email'], FILTER_VALIDATE_EMAIL)) {
                    continue;
                }
                if (in_array($employee['email'], $inserted_emails)) {
                    continue;
                }
                if (substr($employee['phone'],0,1) == 0 || strlen($employee['phone']) <> 10){
                    continue;
                }
                if (in_array($employee['phone'], $inserted_phones)) {
                    continue;
                }
                if (in_array($employee['employee_id'], $inserted_employee_ids)) {
                    continue;
                }
            
                if (isset($_POST["campaign"]))
                    $campaign_id=$_POST["campaign"];

                if(isset($_POST['campaign_name']))
                    $campaign_name = $_POST['campaign_name'];
                else
                    $campaign_name = 'Testtir';

                $sql = "INSERT into details (campaign_id, campaign_name, name, surname, email, employee_id, phone,points) " .
                    "values (" . $campaign_id." ,'". $campaign_name . "','" . $employee['name'] . "','" . $employee['surname']."','".$employee['email']."','".$employee['employee_id']."','".$employee['phone']."','".$employee['point']."')";
                $result = mysqli_query($con, $sql);

                if ($result){
                    $insert_success++;
                    $inserted_emails[] = $employee['email'];
                    $inserted_phones[] = $employee['phone'];
                    $inserted_employee_ids[] = $employee['employee_id'];
                }else{
                    $insert_fail++;
                }
            }
            $_SESSION['insert_success'] = $insert_success;
            $_SESSION['insert_fail'] = $insert_fail;

        }      
        fclose($file);  
     }
?>