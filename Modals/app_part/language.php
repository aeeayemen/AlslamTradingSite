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
             
             $lang['alhadarygroup'] = 'ALHADARY GROUP';
              $lang['alhadarygroup_trad'] = 'Trading (Electronics & Pharmaceuticals)';
                $lang['navig_li_home'] = 'Home';
                $lang['navig_li_aboutg'] = 'About Us';
                $lang['navig_li_product'] = 'Our Product';  
                $lang['navig_li_medi_soci'] = ' Media Center';
                $lang['navig_li_news'] = 'News';
                 $lang['navig_li_photg'] = 'Photo Gallery';
                $lang['navig_li_vediog'] = 'Video Gallery';
                $lang['navig_li_contact_us'] = 'Contact Us';
                $lang['navig_li_search'] = 'Search';

                  $lang['navig_li_about'] = 'About Us';
                $lang['navig_li_portfolio'] = 'Products';
                $lang['navig_li_services'] = 'Hospital services';
                $lang['navig_li_partners'] = 'Partenrs';
                $lang['navig_li_client'] = 'Clients';
                $lang['navig_li_contact'] = 'Contact Us';
                  $lang['oursections'] = 'Our Sections';
                 $lang['ourBranches'] = 'Our Branches';
                  $lang['ourDoctors'] = 'Our Doctors';
                  $lang['PatientCare'] = 'Patient Care';
                     $lang['BookAppointment'] = 'Book Appointment';
                  $lang['Finddoctor'] = 'Find your doctor';
             
                //body index
                $lang['bod_about_groub'] =' About the Group';
                $lang['readmore'] ='Read More';
                 $lang['ourcompany'] ='Our Companies';
                 $lang['ourpartenrs'] ='Our Partenrs';

                 $lang['ourclient'] ='Our Clients';
                 $lang['datacontact'] ='Communication data';
                 $lang['geograplocation'] ='Geographical location';
                   $lang['videolibrary'] ='Video library';
                   $lang['ourfacebookpage'] ='facebook Stream';
                   $lang['lasttweet'] ='LATEST TWEETS';

                 $lang['sendmessage'] ='Send us a message';
               $lang['copyright'] ='CopyRight';
               $lang['allrightres']='All Rights Reserved ';
               $lang['designby']='Design By ';
              $lang['specialpolicy'] =' Special Policy';
              $lang['termsconditions'] ='Terms And Conditions';
                $lang['prphone'] ='Tel:';
                $lang['prphone1'] ='Mobile:';
                $lang['prefax'] ='fax:';
                $lang['preemail'] ='Email:';
                $lang['republicemen'] ='Republic of Yemen';
                $lang['backtohome'] = 'Back Home page';
                 $lang['team'] = 'Our Team';

                 $lang['informatof'] = 'Informations of';

                $lang['sendmfname'] ='Name:';
                $lang['sendmfsubject'] ='Subject:';
                $lang['sendmfemail'] ='Email:';
                $lang['sendmfmessage'] ='Message';
                $lang['sendmfbutton'] ='Send';
                $lang['sendmfcancel'] ='Cancel';  


                 $lang['sharethis'] ='Share By';
                 $lang['categories'] ='Categories';
                 $lang['lastnews'] ='Latest News';
                 $lang['newsandartical'] ='News and Articles';

                 $lang['bodyphotog'] = 'Photo Gallery';
                $lang['bodyvediog'] = 'Video Gallery';

                $lang['availability'] = 'Availability';
                $lang['availabilityyes'] = 'Yes';
                $lang['availabilityno'] = 'No available';
                $lang['aboutcompany'] = 'The Company';
                 $lang['comments'] = 'Comments';
                  $lang['writecommment'] = 'Write Comments ';

              $lang['aothoproduct'] = 'Related Products';
                $lang['fristpage'] = 'frist';
                $lang['lastpage'] = 'last';
                 $lang['prevpage'] = 'prev';
                  $lang['nextpage'] = 'next';
                   $lang['newrelease'] = 'NEWS RELEASE';
               $lang['allgalare'] = 'All';
                $lang['rate'] = 'Rating';
                  $lang['LastProducts'] = 'Last Products';
                
                      $lang['fillrequerd'] = 'Fill required';
                     $lang['frestname'] = 'First Name';
                       $lang['fullName'] = 'Full Name';
                     $lang['lastname'] = 'Last Name';
                     $lang['emailj'] = 'Email';
                     $lang['phonenumbersj'] = 'Phone Number';

                      $lang['jobes'] = 'Career';
                     $lang['cityes'] = 'City';
                     $lang['nationality'] = 'Nationality';
                     $lang['gender'] = 'Gender';
                     $lang['genderwamen'] = 'Female';
                      $lang['genderman'] = 'Male';
                     $lang['certivicatecv'] = 'Upload CV';
                     $lang['subject'] = 'Subject';
                      $lang['comments'] = 'Comments';

                        $lang['Youtube'] = 'Youtube';
                          $lang['instagram'] = 'instagram';
                        
                        $lang['Google+'] = 'Google+';
                          $lang['Twitter'] = 'Twitter'; 
                           $lang['Facebook'] = 'Facebook';
                      $lang['BrandNames'] ='Our Brand';
                         $lang['homepage'] ='Home Page';
                        $lang['textclient']='We Have several clients using its array of products. Our team members have the distinguished experience and association with different national and international organizations in different sectors. A partial list of these clients includes:';
                        $lang['contactD']='Contact Details';
                         $lang['contactinfo']=' We Have internationally renowned as exclusive agents for the global companies such ';
                         $lang['contactform']='Contact Form';
                         $lang['headoffce']='Head office';
                          $lang['box']='P.O Box ';
                           $lang['messagcontactform']='Contact us through the following form <b> - Fields marked </ b>';

                               $lang['CorporateProfile']='Corporate Profile';
                               $lang['DiscoverourInfo']='Discover our Info !';
                                $lang['OrganizationChart']='Organization Chart';
                                $lang['chelect'] = 'Electronics';
                                $lang['chelectph'] = 'Pharmaceuticals';
                                 $lang['Options'] = 'Options';
                                  $lang['SelectCatagory'] = 'Select Section';
   $lang['currentlyjobs'] ='There are currently no recruitment jobs';
     
          $lang['Validation_Required_Msg'] = ' This Field is Required';
            $lang['Validation_Remote_Msg'] = 'Please Check The Error ';
            $lang['Validation_Email_Msg'] = 'Please enter a valid email address';
             $lang['Validation_Number_Msg'] = 'Please enter a valid number';

 
               $lang['NameDoctor'] = 'Name of Doctor'; 
                $lang['Specialization'] = 'Specialization';
                 $lang['Presshere'] = 'Click Here';
                 $lang['hospitaltoday'] = 'The hospital today ';

                $lang['subscribtitle'] = 'Mailing List';
                 $lang['subscribdescrp'] = ' Subscribe to Get Latest News';

                $lang['emailsubscrib'] = 'Enter e-mail';
                $lang['subscripwithus'] = 'Subscribe';

                $lang['MedicalAdvice'] = 'Medical Advice';
                  $lang['GETINTOUCH'] = 'GET IN TOUCH';


                $lang['Speciality'] = 'Speciality';
                $lang['Degrees'] = 'Degrees';
                $lang['Experience'] = 'Experience';
                  $lang['Training'] = 'Training';
                    $lang['Workdays'] = 'Work days';
                     $lang['NameSection'] = 'Section';

                       $lang['date'] = 'Date';
                       $lang['time'] = 'Time';

                     $lang['Messagetitlecareer'] = 'Please enter the required data.';

                $lang['appointmentsvisits'] = 'Clinic appointments and visits.';
                  $lang['MorningClinics'] = 'Morning Clinics';
                    $lang['EveningClinics'] = 'Evening Clinics';
                     $lang['Emergency'] = 'Emergency';
                     $lang['ElectronicClinic'] = 'Electronic Clinic';
                     $lang['ElectronicBooking'] = 'Electronic Booking';


                     $lang['ElectronicClinicDisc'] = 'Dear visitor, you can provide health symptoms and you will be answered soon.';
                     $lang['ElectronicBookingDisc'] = 'From here ... Dear visitor, you can book your appointment with any doctor. Please fill in your details and your reservation will be confirmed';
                $UserLangDir='ltr';
                return $lang;
                break;

                /*
                ------------------
                Language: Italian
                ------------------
                */

            case "ar":
              
               // Menu home top
         $lang['alhadarygroup'] = 'مجموعة الحيدري';
         $lang['alhadarygroup_trad'] = 'للتجارة (الكترونيات & أدوية)';
                $lang['navig_li_home'] = 'الرئيسية';
                $lang['navig_li_aboutg'] = 'من  نحن';
                $lang['navig_li_product'] = 'منتجاتنا'; 
                $lang['navig_li_soci_res'] = 'المسؤولية الاجتماعية';
                $lang['navig_li_medi_soci'] = ' المركز الاعلامي';
                $lang['navig_li_news'] = 'الاخبار';
                 $lang['navig_li_photg'] = 'معرض الصور';
                $lang['navig_li_vediog'] = 'معرض الفيديو';
                $lang['navig_li_contact_us'] = 'التواصل معنا';
                $lang['navig_li_search'] = 'بحث';

              $lang['navig_li_about'] = 'من نحن';
              $lang['navig_li_portfolio'] = 'منتجاتنا';
              $lang['navig_li_services'] = 'خدمات المستشفى';
              $lang['navig_li_partners'] = 'شركاؤنا';
              $lang['navig_li_client'] = 'عملاؤنا';
              $lang['navig_li_contact'] = 'التواصل معنا';

                   $lang['team'] = 'فريقنا';
             $lang['oursections'] = 'أقسام المستشفى';
              $lang['ourBranches'] = 'فروعنا ';
               $lang['ourDoctors'] = 'أطبائنا';
                $lang['PatientCare'] = ' خدمات المريض';
                 //body index
                 $lang['BookAppointment'] = ' احجز موعد';
                 $lang['Finddoctor'] = 'إبحث عن طبيبك';
               $lang['backtohome'] = 'مجموة  نماء  سجماء';
                $lang['informatof'] = 'معلومات عن  ';
                $lang['bod_about_groub'] =' نبذة عن المجموعة';
                $lang['readmore'] ='إقراء المزيد';
                $lang['ourcompany'] ='شركاتنا';
                $lang['ourpartenrs'] ='شركاؤنا';
                $lang['ourclient'] ='قائمة بعملائنا';
                $lang['datacontact'] ='بيانات التواصل';
                 $lang['geograplocation'] ='الموقع الجعرافي';
                 $lang['videolibrary'] =' مكتبة الفيديو  ';
                 $lang['ourfacebookpage'] ='صفحتنا على الفيسبوك';
                  $lang['lasttweet'] ='اخر التغريدات';
                $lang['sendmessage'] ='ارسل لنا رسالة'; 

               $lang['copyright'] ='CopyRight';
               $lang['allrightres']='جميع الحقوق محفوظة لدى';
               $lang['designby']='تصميم';
                $lang['specialpolicy'] =' السياسة الخاصة';
                 $lang['termsconditions'] ='الاحكام والشروط';
                 
                 $lang['prphone'] ='ت:';
                 $lang['prphone1'] ='ت:';
                 $lang['prefax'] ='فاكس';
                 $lang['preemail'] ='البريد الاكتروني';
                 $lang['republicemen'] ='الجمهورية اليمنية';  

                 $lang['sendmfname'] ='الاسم:';
                 $lang['sendmfsubject'] ='الموضوع:';
                 $lang['sendmfemail'] ='البريد الاكتروني:';
                 $lang['sendmfmessage'] ='نص الرسالة';
                 $lang['sendmfbutton'] ='ارسال';
                $lang['sendmfcancel'] ='الغاء';             
 
        
              
                 $lang['sharethis'] ='شارك الموضوع';
                 $lang['categories'] ='التصنيفات';
                 $lang['lastnews'] ='اخر الاخبار';
 
                $lang['newsandartical'] ='الاخبار والمقالات';

                 $lang['bodyphotog'] = 'معرض الصور';
                $lang['bodyvediog'] = 'معرض الفيديو';
                

                $lang['availability'] = 'متوفر في الشركة';
                $lang['availabilityyes'] = 'نعم';
                $lang['availabilityno'] = 'غير متوفر';
                $lang['aboutcompany'] = 'عن الشركة';
                 $lang['comments'] = 'التعليقات';
                $lang['writecommment'] = 'اكتب تعليقك هنا';

            
                $lang['fristpage'] = 'الاول';
                $lang['lastpage'] = 'الاخير';
                 $lang['prevpage'] = 'السابق';
                  $lang['nextpage'] = 'اللاحق';

                   $lang['allgalare'] = 'الكل';
                   $lang['newrelease'] = 'اخر الاخبار';
                    $lang['aothoproduct'] = 'منتجات اخرى';

                     $lang['fillrequerd'] = 'مطلوب تعبئة';
                     $lang['frestname'] = 'الاسم الاول';
                      $lang['fullName'] = 'الاسم كامل';
                     $lang['lastname'] = 'اللقب';
                     $lang['emailj'] = 'البريد الاكتوني';
                     $lang['phonenumbersj'] = 'رقم الجوال';

                     $lang['jobes'] = 'وظائف';
                     $lang['cityes'] = 'المدينة';
                     $lang['nationality'] = 'الجنسية';
                     $lang['gender'] = 'الجنس';
                     $lang['genderwamen'] = 'أنثى';
                      $lang['genderman'] = 'ذكر';
                     $lang['certivicatecv'] = 'تحميل السيرة الذاتية';
                     $lang['subject'] = 'الموضوع';
                      $lang['comments'] = 'التعليقات';
                      $lang['LastProducts'] = 'آخر المنتجات';
                       $lang['BrandNames'] ='العلامات التجارية ';
                       $lang['textclient']='لدينا العديد من العملاء الذين يستخدمون مجموعة منتجاته. يتمتع أعضاء فريقنا بالخبرة المتميزة والارتباط مع مختلف المنظمات الوطنية والدولية في مختلف القطاعات. قائمة جزئية من هؤلاء العملاء تشمل:';
                            $lang['contactD']="بيانات التواصل";
                            $lang['contactinfo']='لدينا شهرة دولية كاوكيل حصري  للشركات العالمية مثل';
                             $lang['contactform']='ارسل لنا رسالة';
                             $lang['headoffce']='المكتب الرئيسي';
                              $lang['box']='صندوق بريد';
                              $lang['rate'] = 'تقييم';
                                  $lang['CorporateProfile']='عن الشركة';
                                    $lang['DiscoverourInfo']='اكتشف معلوماتنا!';
                                     $lang['OrganizationChart']='الهيكل التنظيمي';
                                      $lang['chelect'] = 'الكترونيات';
                                      $lang['chelectph'] = 'ادوية';
                                       $lang['Options'] = 'عمليات';
                                        $lang['SelectCatagory'] = 'اختر   القسم';

                                         $lang['messagcontactform']='  عبر الإتصال بنا من خلال النموذج التالي  <b>– الحقول المشارة  </b>';
 $lang['currentlyjobs'] ='عفوأ لايوجد توظيف حاليا';

            $lang['Validation_Required_Msg'] = 'يجب ادخال بيانات هذا الحقل';
            $lang['Validation_Remote_Msg'] = 'يرجى تصحيح هذا  الخطاء للمتابعة';
            $lang['Validation_Email_Msg'] = 'رجاء إدخال عنوان بريد إلكتروني صحيح';
             $lang['Validation_Number_Msg'] = 'عفواً يسمح بادخال الاعداد فقط';



                        $lang['Youtube'] = 'يوتيوب';
                          $lang['instagram'] = 'انستقرام';
                        
                        $lang['Google+'] = 'قوقل بلص';
                          $lang['Twitter'] = 'تويتر'; 
                           $lang['Facebook'] = 'فيسبوك';


               $lang['NameDoctor'] = 'اسم الطبيب'; 
                $lang['Specialization'] = 'التخصص';
                $lang['Presshere'] = '  اضغط هنا';
                $lang['hospitaltoday'] = 'مستشفى ازال اليوم';
                $lang['subscribtitle'] = 'القائمة البريدية';
                 $lang['subscribdescrp'] = 'أدخل بريدك ، لتصلك آخر الأخبار';



                $lang['emailsubscrib'] = 'ادخل البريد الاكترونية';
                $lang['subscripwithus'] = 'إشترك ';
                 $lang['MedicalAdvice'] = 'نصائح طبية';
                   $lang['MedicalAdvice'] = 'نصائح طبية';
                     $lang['GETINTOUCH'] = 'ابقى على تواصل';


                $lang['Speciality'] = 'التخصص';
                $lang['Degrees'] = 'الدرجة العلمية';
                $lang['Experience'] = 'الخبرات';
                  $lang['Training'] = 'التدريب';
                    $lang['Workdays'] = 'أيام العمل';
                      $lang['NameSection'] = 'اسم  القسم  ';
                       $lang['date'] = 'التاريخ';
                       $lang['time'] = 'الوقت';
                     $lang['Messagetitlecareer'] = 'يرجى إدخال البيانات المطلوبة.';

                $lang['appointmentsvisits'] = 'مواعيد العيادات والزيارة.';
                  $lang['MorningClinics'] = 'دوام العيادات الصباحي';
                    $lang['EveningClinics'] = 'دوام العيادات المسائي';
                     $lang['Emergency'] = 'الطوارئ';

                     $lang['ElectronicClinic'] = 'العيادة الالكتروني';
                     $lang['ElectronicBooking'] = 'الحجز الالكتروني';

                         $lang['ElectronicClinicDisc'] = 'يمكنك عزيزي الزائر من تقديم الاعراض الصحية التي تعاني منها وسوف يتم الرد عليك قريباً.';

                      $lang['ElectronicBookingDisc'] = ' من هنا ... يمكنك عزيزي الزائر حجز موعدك مع أي طبيب ما عليك إلا تعبئة بياناتك وسوف يتم تاكيد حجزك';



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