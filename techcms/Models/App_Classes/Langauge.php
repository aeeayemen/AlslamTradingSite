<?php
/**
 * كلاس اللغة 
 * كان لغرض التطوير للنظام بالمستقبل باكثر من لغة 
 * وحاليا الجزء المفعل هو اللغه العربية   
 */
class Language {

    private $UserLng;
    public $UserLangDir;
    private $langSelected;
    public $lang = array();


    public function __construct($userLanguage){

        $this->UserLng = $userLanguage;
    }


public function userLangDir(){

        switch($this->UserLng){
            /*
            ------------------
            Language: English
            ------------------
            */
           case "en":
                 $UserLangDir='ltr';
                return $UserLangDir;
                break;

                /*
                ------------------
                Language: Italian
                ------------------
                */

            case "ar":
                          $UserLangDir='rtl';
               return $UserLangDir;
                break;

                /*
                ------------------
                Default Language
                ------------------
                */
                default:
                 $UserLangDir='rtl';
               return $UserLangDir;
                break;


        }
    }
    public function userLanguage(){

        switch($this->UserLng){
            /*
            ------------------
            Language: English
            ------------------
            */
           case "en":
            $lang['COMPANY_NAME'] = 'Techsoft'
 ;          $lang['App_name_ar'] = 'Techsoft';
                $lang['LOGIN_PGTITL'] = 'Login Page';
                $lang['LOGIN_WMSG'] = 'Login To Your Account';
                $lang['LOGIN_UNMTITL'] = 'User Name';
                $lang['LOGIN_PASSTITL'] = 'Password';
                $lang['LOGIN_EmilTitl'] = 'E-mail Address';                
                $lang['LOGIN_BTNTITL'] = 'Login';
                $lang['LOGIN_REMCHKBOXTITL'] = 'Remember Me';
                $lang['LOGIN_RSTLINK'] = 'Reset Password';
                $lang['LOGIN_FORGTMSG'] = 'Forgot your password?';
                $lang['LOGIN_FORGTMSG2'] = 'To Reset Your Password Click ';
                $lang['LOGIN_Err1'] = 'Error Please Check UserName & Password and try again ';
                 $lang['LOGIN_SUCSMSG'] = 'You are logedin successfully  ';
                $lang['LOGIN_RESTMSG'] = 'Please Enter  Your Email ADN  Password Reset Link Will be sent to your Email  ';
                $lang['LOGIN_DRPDONLST']="Select Your User";
                $lang['LOGIN_Sucess']="You Are Loged in Sucessfully ";
                 $lang['LOGIN_UKNOWNUSR']="Invalied User Please check User";
                 $lang['LOGIN_Blocked']="This User was Blocked Please Contact Admin";
                  $lang['LOGIN_MAXATEMPT']="You've exceeded the number of times Attempts";
                 $lang['LOGIN_WRONGPASS']="Error:Wrong Password Please Enter correct Password";
                 $lang['copyright'] = 'ALL Rights Reserved  '.$lang['COMPANY_NAME']." 2018 &copy ";
                 $lang['programingby'] ="<IT4 Smart Solutions >";
                 
                 
                //HomePage Translation
                 $lang['Home_PGTITL'] = 'Dashboard';
                 $lang['Home_SLOTEXT'] = 'Managment Web App';
                $lang['Home_UWELCMSG'] = 'Welcome';
                $lang['Home_PGNAME'] ='Home';
                   
                //General Compaonnet Translation
                 $lang['Gen_LGOUTTEXT'] = 'Logout';
                
                 // General Menu Translation
                $lang['BASIC_CONFIG'] ='Basic Configuration ';
                
                // App Alerts Messges Translate 
                  $lang['NOT_PAUTHRIZED_MSG'] ='Sorry: You do not have enough permission to access this page please back to home or contact admin to get Access permission for this page  ';
                   
                   
                   
                 // Misc Links and button translate 
                  $lang['NOT_PAUTHRIZED_BTNTXT']="Back to Home";
                  $lang['SHURT_LNKTITL']="Shurt Link";  
                  $lang['GRID_LOADING_TXT']="Loading.....";
                   $lang['RELATED_DELETE_ERR']="Error:This Filde has related data you can't delete it ";
                   
                 // APPCONFIG Menu Translation
              $lang['APP_CONFIG_DEPT_TITLE'] ='Departments';
               $lang['APP_CONFIG_LOCATIONCONFIGROOT'] ='Golden Maps';
               $lang['APP_CONFIG_MAGMNTAPPROOT'] ='Management App';
              $lang['APP_CONFIG_JOB_MANAGTITLE'] ='Job Management';
              $lang['APP_CONFIG_PRPOSLCAT_MANAGTITLE'] ='Proposal Categories';
              $lang['APP_CONFIG_PRPOSLSTATUS_MANGITLE'] ='Proposal Status';
              $lang['APP_CONFIG_UNITS_MANGITLE'] ='Units Management';  
              $lang['APP_CONFIG_CONTRCT_TYPE_MANGITLE'] ='Contract Types';
              $lang['APP_CONFIG_YEAR_MANGITLE'] ='Year Managment';
              $lang['APP_CONFIG_CITIES_MANGITLE'] ='Cities Managment';
              $lang['APP_CONFIG_ZONES_MANGITLE'] ='Zones Managment';
              $lang['APP_CONFIG_LOCATIONSTATUS_MANGITLE'] ='Locations Status';
              $lang['APP_CONFIG_LOCATIONTYPES_MANGITLE'] ='Locations Types';
                // Departments Menu Translation
                $lang['DEPTMENU_ROOT'] ='Departments';
                $lang['DEPTMENU_LIST'] ='Departments List';
                $lang['DEPTMENU_ADD'] ='Add Departments';
                $lang['DEPTMENU_EDIT'] ='Edite Departments';
                $lang['DEPTMENU_DELETE'] ='Delete Departments';
                
               
                 //Jobs Menu Translation
                $lang['JOBSMENU_ROOT'] ='Manage Jobs';
                $lang['JOBSMENU_LIST'] ='Jobs List ';
                $lang['JOBSMENU_ADD'] ='Add Jobs';
                $lang['JOBSMENU_EDIT'] ='Edit Jobs';
                $lang['JOBSMENU_DELETE'] ='Delete Jobs';
                 $lang['JOB_PAGE_RPRTTITLE'] ='Job List Reports';
                 $lang['JOB_PAGE_JOBID'] ='Job-ID.';
                $lang['JOB_PAGE_JOBNMAR'] ='Arabic Title';
                $lang['JOB_PAGE_JOBNMEN'] ='English Title';
                $lang['JOB_PAGE_JOBNOTS'] ='More Details';
                $lang['JOB_PAGE_JOBNONOTS'] ='No Details ';
                $lang['JOB_PAGE_ADDATE'] ='Add Date';
                $lang['JOB_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['JOB_PAGE_EDTDATE'] ='Last Update';
                
                 // City Menu & Page Tranlation                  
                 $lang['City_PAGE_RPRTTITLE'] ='Cities List Reports';
                 $lang['City_PAGE_CityID'] ='ID.';
                $lang['City_PAGE_CityNMAR'] ='Arabic Title';
                $lang['City_PAGE_CityNMEN'] ='English Title';
                $lang['City_PAGE_CityNOTS'] ='More Details';
                $lang['City_PAGE_CityNONOTS'] ='No Details ';
                $lang['City_PAGE_ADDATE'] ='Add Date';
                $lang['City_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['City_PAGE_SHOWONMAP'] ='Show ON Map';
                $lang['City_PAGE_Gps_X'] ='Gps-X';
                $lang['City_PAGE_Gps_Y'] ='Gps-Y';                                
                $lang['City_PAGE_EDTDATE'] ='Last Update';


                     // Zones Menu & Page Tranlation                  
                 $lang['ZONE_PAGE_RPRTTITLE'] ='Zones List Reports';
                 $lang['ZONE_PAGE_ZONEID'] ='ID.';
                $lang['ZONE_PAGE_ZONECITYNM'] ='City';
                $lang['ZONE_PAGE_ZONENMAR'] ='Arabic Title';
                $lang['ZONE_PAGE_ZONENMEN'] ='English Title';
                  $lang['ZONE_PAGE_ZONECODE'] ='Short Title';
                   $lang['ZONE_PAGE_ZONEGPSBTN'] ='Get-GPS';
                $lang['ZONE_PAGE_ZONENOTS'] ='More Details';
                $lang['ZONE_PAGE_ZONENONOTS'] ='No Details ';
                $lang['ZONE_PAGE_ADDATE'] ='Add Date';
                $lang['ZONE_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['ZONE_PAGE_Gps_X'] ='Gps-X';
                $lang['ZONE_PAGE_Gps_Y'] ='Gps-Y';                                
                $lang['ZONE_PAGE_EDTDATE'] ='Last Update';
                
                
                     // Locations Status Menu & Page Tranlation                  
                 $lang['LOCTION_STATUS_PAGE_RPRTTITLE'] ='Locations Status Reports';
                 $lang['LOCTION_STATUS_PAGE_STATUSID'] ='ID.';
                $lang['LOCTION_STATUS_PAGE_LOCTION_NMAR'] ='Arabic Title';
                $lang['LOCTION_STATUS_PAGE_LOCTION_NMEN'] ='English Title';
                $lang['LOCTION_STATUS_PAGE_STUTSCOLOR'] ='Status Color';
                $lang['LOCTION_STATUS_PAGE_LOCTION_STATUSNOTS'] ='More Details';
                $lang['LOCTION_STATUS_PAGE_LOCTION_STATUSNONOTS'] ='No Details ';
                $lang['LOCTION_STATUS_PAGE_ADDATE'] ='Add Date';
                $lang['LOCTION_STATUS_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['LOCTION_STATUS_PAGE_EDTDATE'] ='Last Update';
                
                   // Locations Types Menu & Page Tranlation                  
                 $lang['LOCTION_TYPES_PAGE_RPRTTITLE'] ='Locations Status Reports';
                 $lang['LOCTION_TYPES_PAGE_TYPEID'] ='ID.';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYP_NMAR'] ='Arabic Title';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYP_NMEN'] ='English Title';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYPPATH1'] ='Status Color';
                $lang['LOCTION_TYPES_PAGE_TYPENOTS'] ='More Details';
                $lang['LOCTION_TYPES_PAGE_TYPNONOTS'] ='No Details ';
                $lang['LOCTION_TYPES_PAGE_ADDATE'] ='Add Date';
                $lang['LOCTION_TYPES_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['LOCTION_TYPES_PAGE_EDTDATE'] ='Last Update';
                
                //YEARS Menu Translation
                $lang['YEARMENU_ROOT'] ='Manage Years';
                $lang['YEARMENU_LIST'] ='Years List ';
                $lang['YEARMENU_ADD'] ='Add Years';
                $lang['YEARMENU_EDIT'] ='Edit Years';
                $lang['YEAR_PAGE_RPRTTITLE'] ='Delete Years';
                 $lang['YEAR_PAGE_YEARID'] ='ID.';
                $lang['YEAR_PAGE_YEAR_NO'] ='Year';
                $lang['YEAR_PAGE_ADDATE'] ='Add Date';
                $lang['YEAR_PAGE_ENBLSTTUS'] ='Is Closed';
                $lang['YEAR_PAGE_EDTDATE'] ='Last Update';
                
                
                 //Proposal catogries Menu Translation
                $lang['PRPSLCATMENU_ROOT'] ='Proposal Categories';
                $lang['PRPSLCATMENU_LIST'] ='Categories List';
                $lang['PRPSLCATMENU_ADD'] ='Add Categories';
                $lang['PRPSLCATMENU_EDIT'] ='Edite Categories';
                $lang['PRPSLCATMENU_DELETE'] ='Delete Categories';
                $lang['PRPSLCAT_PAGE_RPRTTITLE'] ='Proposal Categories List Reports';
                $lang['PRPSLCAT_PAGE_TYPCODE'] ='Cat-ID';
                $lang['PRPSLCAT_PAGE_PRPSLCATNMAR'] ='Arabic Title';
                $lang['PRPSLCAT_PAGE_PRPSLCATNMEN'] ='English Title';
                $lang['PRPSLCAT_PAGE_PRPSLCATNOTS'] ='More Details';
                $lang['PRPSLCAT_PAGE_PRPSLCATNONOTS'] ='No Details ';
                $lang['PRPSLCAT_PAGE_ADDATE'] ='Add Date';
                $lang['PRPSLCAT_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['PRPSLCAT_PAGE_EDTDATE'] ='Last Update';
                
                  //CONTRACTS catogries Menu Translation
                $lang['PRPSLSTUSMENU_ROOT'] ='Proposal Status';
                $lang['PRPSLSTUSMENU_LIST'] ='Status List';
                $lang['PRPSLSTUSMENU_ADD'] ='Add Status';
                $lang['PRPSLSTUSMENU_EDIT'] ='Edite Status';
                $lang['PRPSLSTUSNU_DELETE'] ='Delete Status';
                 $lang['PRPSLSTUT_PAGE_RPRTTITLE'] ='Proposal Status List Reports';
                $lang['PRPSLSTUT_PAGE_TYPCODE'] ='ID';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNMAR'] ='Arabic Title';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNMEN'] ='English Title';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNOTS'] ='More Details';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNONOTS'] ='No Details ';
                $lang['PRPSLSTUT_PAGE_ADDATE'] ='Add Date';
                $lang['PRPSLSTUT_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['PRPSLSTUT_PAGE_EDTDATE'] ='Last Update';
                
                
                //Units Menu Translation
                $lang['UNITMENU_ROOT'] ='Manage Units';
                $lang['UNITMENU_LIST'] ='Units List';
                $lang['UNITMENU_ADD'] ='Add Units';
                $lang['UNITMENU_EDIT'] ='Edite Units';
                $lang['UNITMENU_DELETE'] ='Delete Units';
                 $lang['UNIT_PAGE_RPRTTITLE'] ='Units List Reports';
                 $lang['UNIT_PAGE_UNITID'] ='Unit-ID';
                $lang['UNIT_PAGE_UNITNMAR'] ='Arabic Title';
                $lang['UNIT_PAGE_UNITNMEN'] ='English Title';
                $lang['UNIT_PAGE_UNIT_SHURT_NMAR'] ='Short Ar Title';
                $lang['UNIT_PAGE_UNIT_SHURT_NMEN'] ='Short EN Title';
                $lang['UNIT_PAGE_UNITNOTS'] ='More Details';
                $lang['UNIT_PAGE_UNITNONOTS'] ='No Details ';
                $lang['UNIT_PAGE_ADDATE'] ='Add Date';
                $lang['UNIT_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['UNIT_PAGE_EDTDATE'] ='Last Update';
            
                
                
                //CONTRACTS catogries Menu Translation
                $lang['CONTRACTMENU_ROOT'] ='Contracts Categories';
                $lang['CONTRACTMENU_LIST'] ='Categories List';
                $lang['CONTRACTMENU_ADD'] ='Add Categories';
                $lang['CONTRACTMENU_EDIT'] ='Edite Categories';
                $lang['CONTRACTENU_DELETE'] ='Delete Categories';
                 $lang['CONTRCT_TYP_PAGE_RPRTTITLE'] ='Contract Types Reports';
                $lang['CONTRCT_TYP_PAGE_CONTRCTYPID'] ='ID';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNMAR'] ='Arabic Title';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNMEN'] ='English Title';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPPRFX'] ='Type Prfix';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNOTS'] ='More Details';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNONOTS'] ='No Details ';
                $lang['CONTRCT_TYP_PAGE_ADDATE'] ='Add Date';
                $lang['CONTRCT_TYP_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['CONTRCT_TYP_PAGE_EDTDATE'] ='Last Update';
                
                
                 //MATERIALS Menu Translation
                $lang['MATERIALSMENU_ROOT'] ='Manage Materials';
                $lang['MATERIALSMENU_LIST'] ='Materials List';
                $lang['MATERIALSMENU_ADD'] ='Add Materials';
                $lang['MATERIALSMENU_EDIT'] ='Edit Materials';
                $lang['MATERIALSMENU_DELETE'] ='Delete Materials';
                
                
                
                
                  //Contract_Tempaltes Menu Translation
                $lang['CONTACTEMPTMENU_ROOT'] ='Contracts Tempaltes';
                $lang['CONTACTEMPTMENU_LIST'] ='Tempaltes List';
                $lang['CONTACTEMPTMENU_ADD'] ='Add Tempaltes';
                $lang['CONTACTEMPTMENU_EDIT'] ='Edit Tempaltes';
                $lang['CONTACTEMPTMENU_DELETE'] ='Delete Tempaltes';
                
              
                //Dertment page Tranlate
                
                $lang['DEPT_PAGE_ADDTITLE'] ='Add Departments';
                 $lang['DEPT_PAGE_EDTTITLE'] ='Edit Departments';
                 $lang['DEPT_PAGE_LSTTITLE'] ='Departments List';
                 $lang['DEPT_PAGE_DELTTITLE'] ='Delete Department';
                $lang['DEPT_PAGE_RPRTTITLE'] ='Departments List Reports';
                $lang['DEPT_PAGE_DEPTNO'] ='DeptNo.';
                $lang['DEPT_PAGE_DEPTNMAR'] ='Arabic Title';
                $lang['DEPT_PAGE_DEPTNMEN'] ='English Title';
                $lang['DEPT_PAGE_DEPTMNGR'] ='Dept Manager';
                $lang['DEPT_PAGE_DEPTNOTS'] ='More Details';
                $lang['DEPT_PAGE_DEPTNONOTS'] ='No Details ';
                $lang['DEPT_PAGE_DEPTPHON'] ='Phone No.';
                 $lang['DEPT_PAGE_DEPTPHEXT'] ='Ext Phone';
                $lang['DEPT_PAGE_ADDATE'] ='Add Date';
                $lang['DEPT_PAGE_ADDATE'] ='Add Date';
                $lang['DEPT_PAGE_ENBLSTTUS'] ='Is Active';
                $lang['DEPT_PAGE_BLOCKSTTUS'] ='Is Closed';
                $lang['DEPT_PAGE_EDTDATE'] ='Last Update';
                
                 //   Valdation Translate 
        
          $lang['Validation_Required_Msg'] = ' This Field is Required';
            $lang['Validation_Remote_Msg'] = 'Please Check The Error ';
            $lang['Validation_Email_Msg'] = 'Please enter a valid email address';
            $lang['Validation_Url_Msg'] = 'Please enter a valid URL e.g: http://www.demo.com ';
            $lang['Validation_Date_Msg'] = 'Wrong Date Format ';
            $lang['Validation_dateISO_Msg'] = 'Wrong Date Format (ISO)';
            $lang['Validation_Number_Msg'] = 'Please enter a valid number';
            $lang['Validation_Creditcard_Msg'] = 'Please enter a correct Credit Card number';
            $lang['Validation_equalTo_Msg'] = 'كلمات المرور التي ادخلتها غير متطابقة';
            $lang['Validation_extension_Msg'] = 'لايمسح بالملفات الاخرى يسمح فقط اختيار ملفات الصور';
              $lang['Validation_maxlength_Msg'] = 'الحد الأقصى لعدد الحروف هو {0}';
              $lang['Validation_minlength_Msg'] = 'الحد الأدنى لعدد الحروف هو {0}';
              $lang['Validation_rangelength_Msg'] = 'عدد الحروف يجب أن يكون بين {0} و {1}';
              $lang['Validation_range_Msg'] = 'رجاء إدخال عدد قيمته بين {0} و {1}';
              $lang['Validation_max_Msg'] = 'رجاء إدخال عدد أقل من أو يساوي (0}';
              $lang['Validation_min_Msg'] = 'رجاء إدخال عدد أكبر من أو يساوي (0}';
              $lang['Validation_RequiredUN_Msg'] = 'يجب ادخال اسم المستخدم';
              $lang['Validation_lettersonly_Msg'] = 'يجب ان يكون اسم المستخدم مكون من الاحرف فقط';
                // Menu
                
                
                
                $lang['SITE_NAME'] = 'My Website';
                $lang['SLOGAN'] = 'My slogan here';
                $lang['HEADING'] = 'Heading';

                // Menu

                $lang['MENU_LOGIN'] = 'Login';
                $lang['MENU_SIGNUP'] = 'Sign up';
                $lang['MENU_FIND_RIDE'] = 'Find Ride';
                $lang['MENU_ADD_RIDE'] = 'Add Ride';
                $lang['MENU_LOGOUT'] = 'Logout';
                $UserLangDir='ltr';
                return $lang;
                break;

                /*
                ------------------
                Language: Italian
                ------------------
                */

            case "ar":
         $lang['COMPANY_NAME'] = 'Techsoft';
         $lang['App_name_ar'] = 'Techsoft ';
                $lang['LOGIN_WMSG'] = 'سجل الدخول الى حسابك';
                $lang['LOGIN_PGTITL'] = 'تسجيل الدخول';
                $lang['LOGIN_UNMTITL'] = 'اسم المستخدم';
                $lang['LOGIN_PASSTITL'] = 'كلمة المرور';
                $lang['LOGIN_EmilTitl'] = 'البريد الالكتروني';
                $lang['LOGIN_BTNTITL'] = 'تسيجل الدخول';
                $lang['LOGIN_REMCHKBOXTITL'] = 'تذكرني المرة القادمة';
                 $lang['LOGIN_RSTLINK'] = 'اعادة تعيين';
                $lang['LOGIN_FORGTMSG'] = 'هل نسيت كلمة المرور؟';
                $lang['LOGIN_FORGTMSG2'] = 'لاعادة تعيين كلمة المرور انقر  ';
                $lang['LOGIN_Err1'] = 'بيانات خاطئة قم بالتحقق من بيانات الدخول والمحاولة مره اخرى';
                  $lang['LOGIN_SUCSMSG'] = 'تم تسجيل الدخول بنجاح ';
                $lang['LOGIN_RESTMSG'] = 'قم بادخال ايميلك وسيتم ارسال رابط اعادة تعيين كلمة المرور الى بريدك';
                $lang['LOGIN_DRPDONLST']="اختر من القائمة";
                $lang['LOGIN_UKNOWNUSR']="هذا المستخدم غير موجود";
                $lang['LOGIN_WRONGPASS']="كلمة المرور غير صحيحة يرجاء التأكد من كملة المرور";
                 $lang['LOGIN_Blocked']="تم حظر هذا المستخدم قم بالتواصل مع مدير النظام";
                 $lang['LOGIN_Sucess']="تم تسجيل الدخول بنجاح ";
                 $lang['LOGIN_MAXATEMPT']="لقد تجاوزت عدد مرات المحاولة وتم ايقاف المستخدم";
              
                //HomePage Translation
                 $lang['Home_PGTITL'] = 'لوحة التحكم';
                 $lang['Home_UWELCMSG'] = 'اهلاً';
                $lang['Home_SLOTEXT'] = 'مجموعة الفتح';   
                $lang['Home_PGNAME'] = 'الرئيسية';
                //General Compaonnet Translation
                 $lang['Gen_LGOUTTEXT'] = 'تجسيل الخروج';
                 
                 //Footre Translation
                $lang['copyright'] = '  جميع الحقوق محفوظه لدى الحيدري   للتجارة  '."  &copy 2018 ";
                $lang['programingby'] ="نوافذ  الابداع";
                $lang['SLOGAN'] = 'My slogan here';
                $lang['HEADING'] = 'Heading';


                 // General Menu Translation
                $lang['BASIC_CONFIG'] ='إلاعدادت الاساسية';
                
                
                
                  // App Alerts Messges Translate 
                  $lang['NOT_PAUTHRIZED_MSG'] ='عفواً: ليس لديك الصلاحية لدخول هذه الصفحة يرجى التراجع او التواصل مع مدير النظام لمنح صلاحية الوصول الى هذه الصفحة ';
                 
                
                  
                 // Links and button translate 
                  $lang['NOT_PAUTHRIZED_BTNTXT']="الرجوع الى الرئيسية";
                  $lang['SHURT_LNKTITL']="الوصول السريع";  
                   $lang['GRID_LOADING_TXT']="جاري التحميل...";
                $lang['RELATED_DELETE_ERR']="لايمكن حذف هذا السجل لوجود بيانات  مرتبطة بهذا الحقل ";
                
                 // APPCONFIG Menu Translation
                $lang['APP_CONFIG_DEPT_TITLE'] ='إدارة الاقسام';
                 $lang['APP_CONFIG_LOCATIONCONFIGROOT'] ='تطبيق الخرائط';
                 $lang['APP_CONFIG_MAGMNTAPPROOT'] ='النظام الاداري';
                $lang['APP_CONFIG_JOB_MANAGTITLE'] ='إدارة الوظائف';
                $lang['APP_CONFIG_PRPOSLCAT_MANAGTITLE'] ='فئات عروض الاسعار';
                $lang['APP_CONFIG_PRPOSLSTATUS_MANGITLE'] ='حالات عروض الاسعار';
                $lang['APP_CONFIG_UNITS_MANGITLE'] ='وحدات القياس';  
                $lang['APP_CONFIG_CONTRCT_TYPE_MANGITLE'] ='فئات العقود';
                $lang['APP_CONFIG_YEAR_MANGITLE'] ='إدارة الاعوام';
               $lang['APP_CONFIG_CITIES_MANGITLE'] ='إدارة المُدن';
                $lang['APP_CONFIG_ZONES_MANGITLE'] ='إدارة المناطق';
                 $lang['APP_CONFIG_LOCATIONSTATUS_MANGITLE'] ='حالات المواقع';
                 $lang['APP_CONFIG_LOCATIONTYPES_MANGITLE'] ='تصنيفات المواقع';
                        //Menu Translation
                $lang['DEPTMENU_ROOT'] ='إدارة الاقسام';
                 $lang['DEPTMENU_LIST'] ='قائمة الاقسام';
                $lang['DEPTMENU_ADD'] ='اضافة قسم';
                $lang['DEPTMENU_EDIT'] ='تعديل قسم';
                $lang['DEPTMENU_DELETE'] ='حذف قسم';
                
                 // City Menu & Page Tranlation                  
                 $lang['City_PAGE_RPRTTITLE'] ='Cities List Reports';
                 $lang['City_PAGE_CityID'] ='الـرقم.';
                $lang['City_PAGE_CityNMAR'] ='التسمية - عربي';
                $lang['City_PAGE_CityNMEN'] ='التسمية-انجليزي';
                $lang['City_PAGE_CityNOTS'] ='تفاصيل اكثر';
                $lang['City_PAGE_CityNONOTS'] ='لايوجد تفاصيل ';
                $lang['City_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['City_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['City_PAGE_SHOWONMAP'] ='العرض على الخرائط';
                $lang['City_PAGE_Gps_X'] ='Gps-X';
                $lang['City_PAGE_Gps_Y'] ='Gps-Y';                                
                $lang['City_PAGE_EDTDATE'] ='اخر تعديل';

                
                   // Zones Menu & Page Tranlation                  
                 $lang['ZONE_PAGE_RPRTTITLE'] ='Zones List Reports';
                 $lang['ZONE_PAGE_ZONEID'] ='الــرقم';
                 $lang['ZONE_PAGE_ZONECITYNM'] ='المدينة';
                $lang['ZONE_PAGE_ZONENMAR'] ='التسمية - عربي';
                $lang['ZONE_PAGE_ZONENMEN'] ='التسمية-انجليزي';
                $lang['ZONE_PAGE_ZONECODE'] ='اسم مختصر';
                $lang['ZONE_PAGE_ZONEGPSBTN'] ='Get-GPS';
                $lang['ZONE_PAGE_ZONENOTS'] ='تفاصيل اكثر';
                $lang['ZONE_PAGE_ZONENONOTS'] ='لايوجد تفاصيل';
                $lang['ZONE_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['ZONE_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['ZONE_PAGE_Gps_X'] ='Gps-X';
                $lang['ZONE_PAGE_Gps_Y'] ='Gps-Y';                                
                $lang['ZONE_PAGE_EDTDATE'] ='اخر تعديل';
                
                   // Locations Status Menu & Page Tranlation                  
                 $lang['LOCTION_STATUS_PAGE_RPRTTITLE'] ='Locations Status Reports';
                 $lang['LOCTION_STATUS_PAGE_STATUSID'] ='الرقم';
                $lang['LOCTION_STATUS_PAGE_LOCTION_NMAR'] ='التسمية-عربي';
                $lang['LOCTION_STATUS_PAGE_LOCTION_NMEN'] ='التسمية-انجليزي';
                $lang['LOCTION_STATUS_PAGE_STUTSCOLOR'] ='لون الحالة';
                $lang['LOCTION_STATUS_PAGE_NOTS'] ='تفاصيل اكثر ';
                $lang['LOCTION_STATUS_PAGE_NONOTS'] ='لايوجد تفاصيل';
                $lang['LOCTION_STATUS_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['LOCTION_STATUS_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['LOCTION_STATUS_PAGE_EDTDATE'] ='اخر تعديل';
             
                // Locations Types Menu & Page Tranlation                  
                 $lang['LOCTION_TYPES_PAGE_RPRTTITLE'] ='Locations Status Reports';
                 $lang['LOCTION_TYPES_PAGE_TYPEID'] ='الرقم';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYP_NMAR'] ='التسمية-عربي';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYP_NMEN'] ='التسمية-انجليزي';
                $lang['LOCTION_TYPES_PAGE_LOCTIONTYPPATH1'] ='Status Color';
                $lang['LOCTION_TYPES_PAGE_TYPENOTS'] ='تفاصيل اكثر ';
                $lang['LOCTION_TYPES_PAGE_TYPNONOTS'] ='لايوجد تفاصيل';
                $lang['LOCTION_TYPES_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['LOCTION_TYPES_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['LOCTION_TYPES_PAGE_EDTDATE'] ='اخر تعديل';
             
                //YEARS Menu Translation
                $lang['YEARMENU_ROOT'] ='ادارةالسنوات';
                $lang['YEARMENU_LIST'] ='قائمة السنوات';
                $lang['YEARMENU_ADD'] ='اضافة سنه';
                $lang['YEARMENU_EDIT'] ='تعديل سنه';
                $lang['YEARMENU_DELETE'] ='حذف سنه';
                 $lang['YEAR_PAGE_YEARID'] ='الرقم';
                $lang['YEAR_PAGE_YEAR_NO'] ='العــــام';
                $lang['YEAR_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['YEAR_PAGE_ENBLSTTUS'] ='مفتوح/مغلق';
                $lang['YEAR_PAGE_EDTDATE'] ='اخر تعديل';
                

                  //Jobs Menu Translation
                $lang['JOBSMENU_ROOT'] ='المسميات الوظيفية';
                $lang['JOBSMENU_LIST'] ='قائمة الوظائف ';
                $lang['JOBSMENU_ADD'] ='اضافة وظيفة';
                $lang['JOBSMENU_EDIT'] ='تعديل الوظائف';
                $lang['JOBSMENU_DELETE'] ='حذف الوظائف';
                 $lang['JOB_PAGE_RPRTTITLE'] ='Job List Reports';
                 $lang['JOB_PAGE_JOBID'] ='الـــرقم';
                $lang['JOB_PAGE_JOBNMAR'] ='التسمية - عربي';
                $lang['JOB_PAGE_JOBNMEN'] ='التسمية-انجليزي';
                $lang['JOB_PAGE_JOBNOTS'] ='تفاصيل اكثر';
                $lang['JOB_PAGE_JOBNONOTS'] ='لايوجد تفاصيل ';
                $lang['JOB_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['JOB_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['JOB_PAGE_EDTDATE'] ='اخر تعديل';
                
                 //Units Menu Translation
                $lang['UNITMENU_ROOT'] ='وحدات القياس';
                $lang['UNITMENU_LIST'] ='قائمة الوحدات';
                $lang['UNITMENU_ADD'] ='اضافة وحدة';
                $lang['UNITMENU_EDIT'] ='تعديل الوحدات';
                $lang['UNITMENU_DELETE'] ='حذف الوحدات';
                 $lang['UNIT_PAGE_RPRTTITLE'] ='Units List Reports';
                 $lang['UNIT_PAGE_UNITID'] ='الـــرقم';
                $lang['UNIT_PAGE_UNITNMAR'] ='التسمية - عربي';
                $lang['UNIT_PAGE_UNITNMEN'] ='التسمية-انجليزي';
                 $lang['UNIT_PAGE_UNIT_SHURT_NMAR'] ='اسم مختصر-عربي';
                $lang['UNIT_PAGE_UNIT_SHURT_NMEN'] ='اسم مختصر-انجليزي';
                $lang['UNIT_PAGE_UNITNOTS'] ='تفاصيل اكثر';
                $lang['UNIT_PAGE_UNITNONOTS'] ='لايوجد تفاصيل ';
                $lang['UNIT_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['UNIT_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['UNIT_PAGE_EDTDATE'] ='اخر تعديل';
                
                    
                //Dertment page Tranlate
                
                $lang['DEPT_PAGE_ADDTITLE'] ='اضافة الاقسام ';
                 $lang['DEPT_PAGE_EDTTITLE'] ='تعديل بيانات الاقسام';
                 $lang['DEPT_PAGE_LSTTITLE'] ='قائمة الاقسام';
                 $lang['DEPT_PAGE_DELTTITLE'] ='حذف قسم';
                $lang['DEPT_PAGE_RPRTTITLE'] ='Departments List Reports';
                $lang['DEPT_PAGE_DEPTNO'] ='الرقم';
                $lang['DEPT_PAGE_DEPTNMAR'] ='التسمية - عربي';
                $lang['DEPT_PAGE_DEPTNMEN'] ='التسمية-انجليزي';
                $lang['DEPT_PAGE_DEPTMNGR'] ='مدير القسم';
                $lang['DEPT_PAGE_DEPTNOTS'] ='تفاصيل اكثر';
                $lang['DEPT_PAGE_DEPTNONOTS'] ='لايوجد تفاصيل ';
                $lang['DEPT_PAGE_DEPTPHON'] ='رقم الهاتف.';
                 $lang['DEPT_PAGE_DEPTPHEXT'] ='التحويلة';
                $lang['DEPT_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['DEPT_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['DEPT_PAGE_BLOCKSTTUS'] ='مفتوح/مقفل';
                $lang['DEPT_PAGE_EDTDATE'] ='اخر تعديل';
                
                
                //Proposal catogries Menu Translation
                $lang['PRPSLCATMENU_ROOT'] ='فئات عروض الاسعار';
                $lang['PRPSLCATMENU_LIST'] ='قائمة ف.العروض';
                $lang['PRPSLCATMENU_ADD'] ='اضافة الفئات';
                $lang['PRPSLCATMENU_EDIT'] ='تعديل الفئات';
                $lang['PRPSLCATMENU_DELETE'] ='حذف الفئات';
                $lang['PRPSLCAT_PAGE_RPRTTITLE'] ='Proposal Types List Reports';
                $lang['PRPSLCAT_PAGE_TYPCODE'] ='الرقم';
                $lang['PRPSLCAT_PAGE_PRPSLCATNMAR'] ='التسمية - عربي';
                $lang['PRPSLCAT_PAGE_PRPSLCATNMEN'] ='التسمية-انجليزي';
                $lang['PRPSLCAT_PAGE_PRPSLCATNOTS'] ='تفاصيل اكثر';
                $lang['PRPSLCAT_PAGE_PRPSLCATNONOTS'] ='لايوجد تفاصيل ';
                $lang['PRPSLCAT_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['PRPSLCAT_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['PRPSLCAT_PAGE_EDTDATE'] ='اخر تعديل';
                
                  //Proposal catogries Menu Translation
                $lang['CARDSCATMENU_ROOT'] ='فئات  البطائق';
                $lang['CARDCATMENU_LIST'] ='قائمة ف.البطائق';
                $lang['CARDCATMENU_ADD'] ='اضافة الفئات';
                $lang['CARDCATMENU_EDIT'] ='تعديل الفئات';
                $lang['CARDCATMENU_DELETE'] ='حذف الفئات';
                $lang['CARDCAT_PAGE_RPRTTITLE'] ='Cards Types List Reports';
                $lang['CARDCAT_PAGE_TYPCODE'] ='الرقم';
                $lang['CARDCAT_PAGE_CARDCATNMAR'] ='التسمية - عربي';
                $lang['CARDCAT_PAGE_CARDCATNMEN'] ='التسمية-انجليزي';
                $lang['CARDCAT_PAGE_CARDCATNOTS'] ='تفاصيل اكثر';
                $lang['CARDCAT_PAGE_CARDCATNONOTS'] ='لايوجد تفاصيل ';
                $lang['CARDCAT_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['CARDCAT_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['CARDCAT_PAGE_EDTDATE'] ='اخر تعديل';
                
                 //Proposal catogries Menu Translation
                $lang['PRPSLSTUSMENU_ROOT'] ='حالات عرض السعر';
                $lang['PRPSLSTUSMENU_LIST'] ='قائمة الحالات';
                $lang['PRPSLSTUSMENU_ADD'] ='اضافة حالة';
                $lang['PRPSLSTUSMENU_EDIT'] ='تعديل الحالات';
                $lang['PRPSLSTUSNU_DELETE'] ='حذف الحالات';
                 $lang['PRPSLSTUT_PAGE_RPRTTITLE'] ='Proposal Status List Reports';
                $lang['PRPSLSTUT_PAGE_TYPCODE'] ='الرقم';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNMAR'] ='التسمية - عربي';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNMEN'] ='التسمية-انجليزي';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNOTS'] ='تفاصيل اكثر';
                $lang['PRPSLSTUT_PAGE_PRPSLSTUTNONOTS'] ='لايوجد تفاصيل ';
                $lang['PRPSLSTUT_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['PRPSLSTUT_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['PRPSLSTUT_PAGE_EDTDATE'] ='اخر تعديل';
              
              
                //CONTRACTS catogries Menu Translation
                $lang['CONTRACTMENU_ROOT'] ='فئات العقود ';
                $lang['CONTRACTMENU_LIST'] ='قائمة ف.القعود';
                $lang['CONTRACTMENU_ADD'] ='اضافة الفئات';
                $lang['CONTRACTMENU_EDIT'] ='تعديل الفئات';
                $lang['CONTRACTENU_DELETE'] ='حذف الفئات';
                $lang['CONTRCT_TYP_PAGE_RPRTTITLE'] ='Contract Types Reports';
                $lang['CONTRCT_TYP_PAGE_CONTRCTYPID'] ='الرقم';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNMAR'] ='التسمية - عربي';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNMEN'] ='التسمية-انجليزي';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPPRFX'] ='Type Prfix';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNOTS'] ='تفاصيل اكثر';
                $lang['CONTRCT_TYP_PAGE_CNTRCT_TYPNONOTS'] ='لايوجد تفاصيل ';
                $lang['CONTRCT_TYP_PAGE_ADDATE'] ='تاريخ الاضافة';
                $lang['CONTRCT_TYP_PAGE_ENBLSTTUS'] ='حالة التفعيل';
                $lang['CONTRCT_TYP_PAGE_EDTDATE'] ='اخر تعديل';
                
                                
                 //MATERIALS Menu Translation
                $lang['MATERIALSMENU_ROOT'] ='إدارة الخامات';
                $lang['MATERIALSMENU_LIST'] ='قائمة الخامات';
                $lang['MATERIALSMENU_ADD'] ='اضافة خامه';
                $lang['MATERIALSMENU_EDIT'] ='تعديل الخامات';
                $lang['MATERIALSMENU_DELETE'] ='حذف خامة';
                
                
                
              
                
                //Contract_Tempaltes Menu Translation
                $lang['CONTACTEMPTMENU_ROOT'] ='نماذج العقود';
                $lang['CONTACTEMPTMENU_LIST'] ='قائمة النماذج';
                $lang['CONTACTEMPTMENU_ADD'] ='اضافة نموذج';
                $lang['CONTACTEMPTMENU_EDIT'] ='تعديل النماذج';
                $lang['CONTACTEMPTMENU_DELETE'] ='حذف النماذج';
                
                
                
                
           //   Valdation Translate 
            $lang['Validation_Required_Msg'] = 'يجب ادخال بيانات هذا الحقل';
            $lang['Validation_Remote_Msg'] = 'يرجى تصحيح هذا  الخطاء للمتابعة';
            $lang['Validation_Email_Msg'] = 'رجاء إدخال عنوان بريد إلكتروني صحيح';
            $lang['Validation_Url_Msg'] = 'رجاء إدخال عنوان موقع إلكتروني صحيح';
            $lang['Validation_Date_Msg'] = 'رجاء إدخال تاريخ صحيح';
            $lang['Validation_dateISO_Msg'] = 'رجاء إدخال تاريخ صحيح (ISO)';
            $lang['Validation_Number_Msg'] = 'عفواً يسمح بادخال الاعداد فقط';
            $lang['Validation_Creditcard_Msg'] = 'رجاء إدخال رقم بطاقة ائتمان صحيح';
            $lang['Validation_equalTo_Msg'] = 'كلمات المرور التي ادخلتها غير متطابقة';
            $lang['Validation_extension_Msg'] = 'لايمسح بالملفات الاخرى يسمح فقط اختيار ملفات الصور';
              $lang['Validation_maxlength_Msg'] = 'الحد الأقصى لعدد الحروف هو {0}';
              $lang['Validation_minlength_Msg'] = 'الحد الأدنى لعدد الحروف هو {0}';
              $lang['Validation_rangelength_Msg'] = 'عدد الحروف يجب أن يكون بين {0} و {1}';
              $lang['Validation_range_Msg'] = 'رجاء إدخال عدد قيمته بين {0} و {1}';
              $lang['Validation_max_Msg'] = 'رجاء إدخال عدد أقل من أو يساوي (0}';
              $lang['Validation_min_Msg'] = 'رجاء إدخال عدد أكبر من أو يساوي (0}';
              $lang['Validation_RequiredUN_Msg'] = 'يجب ادخال اسم المستخدم';
              $lang['Validation_lettersonly_Msg'] = 'يجب ان يكون اسم المستخدم مكون من الاحرف فقط';
                // Menu
                
                
                

                $lang['MENU_LOGIN'] = 'Login';
                $lang['MENU_SIGNUP'] = 'Sign up';
                $lang['MENU_FIND_RIDE'] = 'Find Ride';
                $lang['MENU_ADD_RIDE'] = 'Add Ride';
                $lang['MENU_LOGOUT'] = 'Logout';
                $UserLangDir='rtl';
                return $lang;
                break;

                /*
                ------------------
                Default Language
                ------------------
                */
                default:
                $lang['PAGE_TITLE'] = 'My website page title';
                $lang['HEADER_TITLE'] = 'My website header title';
                $lang['SITE_NAME'] = 'My Website';
                $lang['SLOGAN'] = 'My slogan here';
                $lang['HEADING'] = 'Heading';

                // Menu

                $lang['MENU_LOGIN'] = 'Login';
                $lang['MENU_SIGNUP'] = 'Sign up';
                $lang['MENU_FIND_RIDE'] = 'Find Ride';
                $lang['MENU_ADD_RIDE'] = 'Add Ride';
                $lang['MENU_LOGOUT'] = 'Logout';

                return $lang;
                break;

        }
    }
}

/**
 * <?php 
 * $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);//Detecting Default Browser language
 * $language = New Language($lang);
 * $langArray = array();
 * $langArray =  $language->userLanguage();
 * ?>
 *  <li> class="active"><a href="/login"><?php echo $langArray['MENU_LOGIN']?></a></li>  
 * 
 */
 

?>