<?php
/**
 * كود فحص تسجيل الدخول
 * يستقبل البيانات من نموذج تسجيل الدخول ويقوم بالتحقق منها
 * ويعيد النتيجة بتنسيق JSON للمتصفح
 */
ob_start();
include("App_constant.php");
include("Logins.php");
require_once("App_Funcations.php");

$empno = $_REQUEST["EmployeeNos"] ?? '';
$password = $_REQUEST["APasswords"] ?? '';
$remeber = $_REQUEST['remeber'] ?? '';
$Fun_cls2 = new App_Funcation();
$app_fun = new App_Funcation();
$User_name = $empno;

if ($Applogins_cls->logged_in) {
    $Applogins_cls->logout();
    $_SESSION["loginattemps"] = 0;
}

procLogin($User_name, $password);

function procLogin($User, $password) {
    global $Applogins_cls;
    if (!isset($_SESSION["loginattemps"])) {
        $_SESSION["loginattemps"] = 0;
    } else {
        $_SESSION["loginattemps"] += 1;
    }
    
    if ($_SESSION["loginattemps"] > 5) {
        $Applogins_cls->block_user($User);
        $_SESSION["loginattemps"] = 0;
        $resultadmin = array('status' => 5, 'url' => $Applogins_cls->referrer);

        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($resultadmin);
        exit;
    } else {
        $app_fun = new App_Funcation();
        /* Login attempt */
        $logedcheck = $Applogins_cls->login($User, $password);
        $resultadmin = array();
        
        /* Login successful */
        if ($logedcheck) {
            $errsarry = $Applogins_cls->errorarray;
            $erno = $errsarry["errono"];
            $_SESSION["loginattemps"] = 0;

            try {
                $rowComun = $app_fun->getDetailscampany(1, 1);
                $Email = $rowComun['EmailNotifcation'] ?? '';
                $subject = $Applogins_cls->Shown_Name;
                $message = 'لاحظنا تسجيل الدخول إلى حسابك من جهاز جديد. هل هذا أنت؟';
                if (!empty($Email)) {
                    ob_start();
                    $app_fun->SendEmailFront($Email, $subject, $message);
                    ob_end_clean();
                }
            } catch (\Throwable $e) {
                // Silently ignore mail failures so login is never blocked
            }

            $resultadmin = array('status' => $erno, 'url' => $Applogins_cls->referrer);
            while (ob_get_level() > 0) {
                ob_end_clean();
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($resultadmin);
            exit;
        } else {
            /* Login failed */
            $errsarry = $Applogins_cls->errorarray;
            $erno = $errsarry["errono"];
            $resultadmin = array('status' => $erno, 'url' => $Applogins_cls->referrer);
            while (ob_get_level() > 0) {
                ob_end_clean();
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($resultadmin);
            exit;
        }
    }
}
