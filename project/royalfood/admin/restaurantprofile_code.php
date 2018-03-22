<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'dbconfig.php';
    
    try{
        $q="select count(company_name) as company_name from tbl_companydetails where company_name='".$_POST['company_name']."' and company_id <> '".$_POST['company_id']."'";
        foreach ($conn->query($q) as $i){
            $e=$i['company_name'];
        }
       
        if($e==0){
              $conn->beginTransaction();
            if(empty($_FILES['uploadimage']['name'])){
                $query1='update tbl_companydetails set company_name=?, company_address=?, company_email=?, company_mobile=?, company_landline=?, company_website=?, company_type=?, company_service=? where company_id=?';
                
                $res=$conn->prepare($query1);
                $data=array(
                    $_POST['company_name'],
                    $_POST['company_address'],
                    $_POST['company_email'],
                    $_POST['company_mobile'],
                    $_POST['company_landline'],
                    $_POST['company_website'],
                    $_POST['company_type'],
                    $_POST['company_service'],
                    $_POST['company_id']
                );
                
                $success=$res->execute($data);
                
                if($success){
                   
                        if(isset($_FILES['uploadbanner1']['name']) and !empty($_FILES['uploadbanner1']['name'])){
                        $nameArray1 = explode('.', $_FILES['uploadbanner1']['name']);
                        $newname1 = md5(microtime() . $_FILES['uploadbanner1']['name']) . '.' . end($nameArray1);
                        $fileSuccess1 = move_uploaded_file($_FILES['uploadbanner1']['tmp_name'],'../restaurantbanner/'.$newname1);
                        $company_bannerid=1;
                         
                       }
                    
                        if(isset($_FILES['uploadbanner2']['name']) and !empty($_FILES['uploadbanner2']['name'])){
                        $nameArray1 = explode('.', $_FILES['uploadbanner2']['name']);
                        $newname1 = md5(microtime() . $_FILES['uploadbanner2']['name']) . '.' . end($nameArray1);
                        $fileSuccess1 = move_uploaded_file($_FILES['uploadbanner2']['tmp_name'],'../restaurantbanner/'.$newname1);
                        $company_bannerid=2;
                       }
                   
                        if(isset($_FILES['uploadbanner3']['name']) and !empty($_FILES['uploadbanner3']['name'])){
                        $nameArray1 = explode('.', $_FILES['uploadbanner3']['name']);
                        $newname1 = md5(microtime() . $_FILES['uploadbanner3']['name']) . '.' . end($nameArray1);
                        $fileSuccess1 = move_uploaded_file($_FILES['uploadbanner3']['tmp_name'],'../restaurantbanner/'.$newname1);
                        $company_bannerid=3;
                       }
                    
                   
                        $imgquery="update tbl_companybanner set company_banner=?,company_id=? where company_bannerid=?";
                       
                        $imgres=$conn->prepare($imgquery);
                        $data1=array(
                            $newname1,
                            $_POST['company_id'],
                            $company_bannerid
                        );
                
                $imgsuccess=$imgres->execute($data1);
               
                if($imgsuccess){
                        
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:changepassword.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:changepassword.php');
                    exit;
                }
             }
            }
            else {
                $query4='update tbl_companydetails set company_name=?, company_address=?, company_email=?, company_mobile=?, company_landline=?, company_website=?, company_type=?, company_service=?, company_logo=? where company_id=?';
                //$conn->beginTransaction();
                $res=$conn->prepare($query4);
                
                if(isset($_FILES['uploadimage']['name']) and !empty($_FILES['uploadimage']['name'])){
                    $nameArray = explode('.', $_FILES['uploadimage']['name']);
                    $newname = md5(microtime() . $_FILES['uploadimage']['name']) . '.' . end($nameArray);
                    $fileSuccess = move_uploaded_file($_FILES['uploadimage']['tmp_name'],'../restaurantlogo/'.$newname);
                }
                

                $data=array(
                    $_POST['company_name'],
                    $_POST['company_address'],
                    $_POST['company_email'],
                    $_POST['company_mobile'],
                    $_POST['company_landline'],
                    $_POST['company_website'],
                    $_POST['company_type'],
                    $_POST['company_service'],
                    $newname,
                    $_POST['company_id']
                );
                $success=$res->execute($data);
                if($success){
        if(file_exists('../restaurantlogo/'.$name)){
                        unlink('../restaurantlogo/'.$name);
                    }
                
                if($success){
                    $conn->commit();
                    $_SESSION['successmessage']='Record updated successfully';
                    session_write_close();
                    header('Location:changepassword.php');
                    exit;
                }
                else{
                    $conn->rollback();
                    $_SESSION['warningmessage']='Failed to update record';
                    session_write_close();
                    header('Location:changepassword.php');
                    exit;
                }
            }
        }
         
        
        }
        else{
            $_SESSION['warningmessage'] = 'SubItem Name Already Exists';
            session_write_close();
            header('Location:changepassword.php');
            exit;
        }
    } catch (Exception $ex) {
        $_SESSION['errormessage'] = $ex->getMessage();
            session_write_close();
            header('Location:changepassword.php');
            exit;
    }


