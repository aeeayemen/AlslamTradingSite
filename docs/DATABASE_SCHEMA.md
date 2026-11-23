# توثيق هيكل قاعدة البيانات الكامل لمشروع TechCMS
## Complete Database Schema & Tables Documentation

> **ملاحظة دائمة للمساعد الذكي والمطورين:** هذا الملف يمثل المرجع الشامل والدائم لكافة جداول وحقول وعلاقات قاعدة بيانات نظام TechCMS في هذا المشروع. عند العمل على أي استعلام أو فحص أو تعديل لاحق، اقرأ من هذا الملف مباشرة لتفادي فحص الملفات المكرر.

- **إجمالي الجداول المعتمدة في النظام:** 33 جدولاً رئيسياً ومساهماً.
- **محرك التخزين والترميز:** `InnoDB` - `utf8mb4_unicode_ci` لدعم اللغة العربية والرموز التعبيرية بالكامل.
- **خادم قاعدة البيانات النشط:** Clever Cloud MySQL 8.0.

---

## فهرس الجداول الموثقة (Table Index)

1. [`about_all`](#about_all) - المعلومات المشتركة للقطاعات والأنشطة (About Sectors & Activities)
2. [`activity`](#activity) - الأنشطة والشركات التابعة (Activities & Subsidiaries)
3. [`app_pages`](#app_pages) - صفحات النظام ولوحة التحكم (Application Pages)
4. [`app_pages_categories`](#app_pages_categories) - تصنيفات قوائم لوحة التحكم (Admin Menu Categories)
5. [`banners`](#banners) - إدارة بنرات الصفحات (Page Banners)
6. [`boardsmanager`](#boardsmanager) - الإدارة العليا والمشرفون (Higher Management / Board)
7. [`category`](#category) - تصنيفات المنتجات والأنشطة (Product Categories)
8. [`clients`](#clients) - إدارة العملاء (Clients)
9. [`companyes`](#companyes) - بيانات المؤسسة والشركات (Companies Profile)
10. [`counter`](#counter) - عدادات الإحصائيات (Stat Counters)
11. [`employees_users`](#employees_users) - إدارة الموظفين ومستخدمي النظام (Users / Staff)
12. [`features`](#features) - مميزات الخدمات (Features)
13. [`image_gellary`](#image_gellary) - معرض الصور (Photo Gallery)
14. [`languagedictionary`](#languagedictionary) - قاموس ترجمة نصوص الموقع (Language Dictionary)
15. [`languages`](#languages) - إدارة لغات الموقع (Languages)
16. [`login_history`](#login_history) - سجل عمليات الدخول للنظام (Admin Login History)
17. [`our_values`](#our_values) - قيم وأهداف المؤسسة (Our Values)
18. [`partenrs`](#partenrs) - إدارة الشركاء والوكلاء (Partners)
19. [`posts`](#posts) - الأخبار والمقالات (News & Posts)
20. [`privilege_groups`](#privilege_groups) - مجموعات الصلاحيات (Roles / Privilege Groups)
21. [`privilegs`](#privilegs) - قائمة الصلاحيات والعمليات (Privileges List)
22. [`project`](#project) - المشاريع والمنتجات (Projects & Products)
23. [`sector`](#sector) - قطاعات الأعمال (Business Sectors)
24. [`seowebsite`](#seowebsite) - إعدادات السيو والكلمات المفتاحية (SEO Configuration)
25. [`services`](#services) - خدمات المؤسسة (Services)
26. [`sliders_items`](#sliders_items) - سلايدر العرض الرئيسي (Home Sliders)
27. [`stattracker`](#stattracker) - سجل تتبع وزوار الموقع (Visitor Tracker)
28. [`subscribusers`](#subscribusers) - مشتركو القائمة البريدية (Newsletter Subscribers)
29. [`testimonial`](#testimonial) - آراء وتوصيات العملاء (Testimonials)
30. [`uin_info`](#uin_info) - معلومات إضافية عن الشركة (About / Extended Info)
31. [`users_group_privilegs_config`](#users_group_privilegs_config) - صلاحيات المجموعات على الصفحات (Group Privileges Mapping)
32. [`vedio_gellary`](#vedio_gellary) - معرض الفيديو (Video Gallery)
33. [`why_us`](#why_us) - لماذا تختارنا (Why Choose Us)

---

### <a id="about_all"></a> الجدول: `about_all`
**الوصف:** محتوى تعريفي مخصص مرتبط بقطاع أو نشاط أو مشروع محدد.

- **المفتاح الأساسي (Primary Key):** `aboutall_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\about_sector_activityContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `aboutall_id` | `INT` | رقم السجل |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | القطاع المرتبط |
| `activity_id` | `INT` | النشاط المرتبط |
| `category_id` | `INT` | التصنيف المرتبط |
| `project_id` | `INT` | المشروع المرتبط |
| `aboutall_Postion` | `VARCHAR(50)` | موقع العرض |
| `aboutall_title` | `VARCHAR(255)` | عنوان المحتوى |
| `aboutall_content` | `LONGTEXT` | النص التفصيلي |
| `aboutall_img` | `VARCHAR(255)` | الصورة المرافقة |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |


### <a id="activity"></a> الجدول: `activity`
**الوصف:** أنشطة كل قطاع أو الشركات التابعة المندرجة تحت القطاعات.

- **المفتاح الأساسي (Primary Key):** `activity_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Counter-Managments.php, techcms\admin\Pages\Parteners-ManagmentsContent.php` (+7 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `activity_id` | `INT` | رقم النشاط |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | رقم القطاع الأب التابع له في sector |
| `activity_name` | `VARCHAR(255)` | اسم النشاط أو الشركة التابعة |
| `address` | `VARCHAR(255)` | عنوان النشاط |
| `email` | `VARCHAR(150)` | البريد الإلكتروني للنشاط |
| `mobile` | `VARCHAR(50)` | رقم الجوال |
| `facebook` | `VARCHAR(255)` | رابط فيسبوك |
| `twitter` | `VARCHAR(255)` | رابط تويتر |
| `youtube` | `VARCHAR(255)` | رابط يوتيوب |
| `activity_short_desc` | `TEXT` | نبذة مختصرة عن النشاط |
| `visoin` | `TEXT` | رؤية النشاط |
| `mission` | `TEXT` | رسالة النشاط |
| `objective` | `TEXT` | أهداف النشاط |
| `activity_content` | `LONGTEXT` | تفاصيل محتوى النشاط الكامل |
| `activity_img` | `VARCHAR(255)` | صورة النشاط |
| `activity_baner` | `VARCHAR(255)` | بنر النشاط |
| `order_id` | `INT` | ترتيب العرض |
| `is_featured` | `VARCHAR(10)` | مميز في الواجهة |
| `keyword` | `TEXT` | كلمات السيو |
| `seo_description` | `TEXT` | وصف السيو |
| `Is_visible` | `VARCHAR(10)` | ظاهر |
| `Is_Actieved` | `VARCHAR(10)` | مفعل |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `User_id` | `INT` | المستخدم |


### <a id="app_pages"></a> الجدول: `app_pages`
**الوصف:** سجل صفحات النظام ومسارات ملفاتها المرتبطة بالقوائم والصلاحيات.

- **المفتاح الأساسي (Primary Key):** `Page_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Classes\DB.php, techcms\Models\App_Classes\Logins.php` (+11 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Page_id` | `INT AUTO_INCREMENT` | المفتاح الأساسي لرقم الصفحة |
| `Cat_id` | `INT` | رقم تصنيف القائمة التابعة له |
| `Page_filename` | `VARCHAR(150)` | اسم ملف الصفحة في techcms/admin/Pages بدون .php |
| `Page_name_ar` | `VARCHAR(150)` | اسم الصفحة بالعربية |
| `Page_name_en` | `VARCHAR(150)` | اسم الصفحة بالإنجليزية |
| `Page_Descrption_ar` | `TEXT` | وصف الصفحة بالعربية |
| `Page_Descrption_en` | `TEXT` | وصف الصفحة بالإنجليزية |
| `menu_icon` | `VARCHAR(100)` | أيقونة الصفحة في القائمة الجانبية |
| `Menu_order` | `INT` | ترتيب الصفحة داخل القسم |
| `page_type` | `VARCHAR(50)` | نوع الصفحة (Admin, User) |
| `is_active` | `VARCHAR(10)` | حالة تفعيل الصفحة |


### <a id="app_pages_categories"></a> الجدول: `app_pages_categories`
**الوصف:** أقسام القائمة الجانبية في لوحة التحكم (إعدادات، محتوى، وسائط، مستخدمين).

- **المفتاح الأساسي (Primary Key):** `Cat_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Parts\Admins\Menu-Builder.php, techcms\admin\Pages\Catagoryes-pages.php, techcms\admin\Pages\Page_Managemts.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Cat_id` | `INT AUTO_INCREMENT` | رقم تصنيف القائمة |
| `Cat_title_ar` | `VARCHAR(150)` | عنوان التصنيف بالعربية |
| `Cat_title_en` | `VARCHAR(150)` | عنوان التصنيف بالإنجليزية |
| `Cat_details` | `TEXT` | تفاصيل التصنيف |
| `menu_icon` | `VARCHAR(100)` | أيقونة القسم من FontAwesome |
| `Is_Enabled` | `VARCHAR(10)` | مفعل في النظام |
| `Is_adminpage` | `VARCHAR(10)` | خاص بصفحات الإدارة |
| `Is_visible` | `VARCHAR(10)` | ظاهر في القائمة |
| `Is_Parent_Menu` | `VARCHAR(10)` | هل هو قائمة رئيسية |
| `Parent_id` | `INT` | معرف القائمة الأب في حال التفريع |
| `Menu_order` | `INT` | ترتيب القسم في القائمة الجانبية |
| `Menu_level` | `INT` | مستوى القائمة |
| `adding_date` | `DATETIME` | تاريخ الإضافة |
| `Modify_date` | `DATETIME` | تاريخ التعديل |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="banners"></a> الجدول: `banners`
**الوصف:** بنرات الترويسة لكل صفحة من صفحات الموقع.

- **المفتاح الأساسي (Primary Key):** `banner_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Bannners-Managment.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `banner_id` | `INT` | رقم البنر |
| `lang_id` | `INT` | رقم اللغة |
| `Titlebanner` | `VARCHAR(255)` | عنوان البنر |
| `bannr_key` | `VARCHAR(100)` | مفتاح الصفحة (home_banner, about_banner) |
| `image` | `VARCHAR(255)` | مسار صورة البنر |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `User_id` | `INT` | المستخدم |


### <a id="boardsmanager"></a> الجدول: `boardsmanager`
**الوصف:** أعضاء مجلس الإدارة وفريق القيادة العليا وخبراتهم.

- **المفتاح الأساسي (Primary Key):** `boardm_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Higher_managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `boardm_id` | `INT` | رقم العضو |
| `lang_id` | `INT` | رقم اللغة |
| `catboard_id` | `INT` | تصنيف العضو في cat_boards |
| `Name_manager` | `VARCHAR(255)` | اسم المسؤول / العضو |
| `short_desc` | `TEXT` | نبذة مختصرة |
| `Speciality` | `VARCHAR(255)` | التخصص المهني |
| `Degrees` | `VARCHAR(255)` | المؤهلات العلمية |
| `Experience` | `TEXT` | الخبرات العملية |
| `logo` | `VARCHAR(255)` | صورة المسؤول الشخصية |
| `Facebook` | `VARCHAR(255)` | حساب فيسبوك |
| `Twitter` | `VARCHAR(255)` | حساب تويتر |
| `Youtube` | `VARCHAR(255)` | حساب يوتيوب |
| `googleplus` | `VARCHAR(255)` | حساب إضافي |
| `order_id` | `INT` | ترتيب العرض |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="category"></a> الجدول: `category`
**الوصف:** تصنيفات المنتجات أو الخدمات التابعة لكل نشاط تجاري.

- **المفتاح الأساسي (Primary Key):** `category_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Parts\Home-Stats.php, techcms\admin\Pages\about_sector_activityContent.php` (+1 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `category_id` | `INT` | رقم التصنيف |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | رقم القطاع التابع له |
| `activity_id` | `INT` | رقم النشاط التابع له |
| `category_name` | `VARCHAR(255)` | اسم التصنيف |
| `category_short_desc` | `TEXT` | وصف مختصر |
| `category_content` | `LONGTEXT` | محتوى تفصيلي للتصنيف |
| `category_img` | `VARCHAR(255)` | الصورة الرئيسية |
| `category_imgs` | `TEXT` | معرض صور التصنيف |
| `order_id` | `INT` | ترتيب التصنيف |
| `is_featured` | `VARCHAR(10)` | مميز |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `User_id` | `INT` | المستخدم |


### <a id="clients"></a> الجدول: `clients`
**الوصف:** سجل عملاء المؤسسة وشعاراتهم وروابطهم.

- **المفتاح الأساسي (Primary Key):** `Client_Id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Check-Funcations.php, techcms\admin\Pages\Check-Funcations.php` (+1 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Client_Id` | `INT AUTO_INCREMENT` | رقم العميل |
| `Name_Client` | `VARCHAR(255)` | اسم العميل أو الجهة |
| `logo` | `VARCHAR(255)` | مسار شعار العميل |
| `url` | `VARCHAR(255)` | رابط موقع العميل |
| `order_id` | `INT` | ترتيب العرض |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="companyes"></a> الجدول: `companyes`
**الوصف:** ملف تعريف المؤسسة والشركات التابعة، الهوية، وسائل التواصل، وبيانات الاتصال.

- **المفتاح الأساسي (Primary Key):** `company_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Companyes-Managments.php, techcms\admin\Pages\Companyes-Managments.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `company_id` | `INT` | رقم الشركة أو المؤسسة |
| `lang_id` | `INT` | رقم اللغة (1 للغة العربية, 2 للإنجليزية) |
| `is_parent` | `VARCHAR(10)` | هل هي المؤسسة الأم ('Yes' / 'No') |
| `cname` | `VARCHAR(255)` | اسم الشركة المختصر |
| `Name` | `VARCHAR(255)` | اسم الشركة الكامل الرسمي |
| `comp_shcut` | `VARCHAR(100)` | المعرف المختصر (مثل: alsalam) |
| `Address` | `VARCHAR(255)` | العنوان والمقر الرئيسي |
| `Phone` | `VARCHAR(50)` | الهاتف الثابت 1 |
| `Phone1` | `VARCHAR(50)` | الهاتف الثابت 2 |
| `Mobile` | `VARCHAR(50)` | رقم الجوال |
| `Fax` | `VARCHAR(50)` | رقم الفاكس |
| `Email` | `VARCHAR(150)` | البريد الإلكتروني الأساسي |
| `Email2` | `VARCHAR(150)` | البريد الإلكتروني الثانوي |
| `URL` | `VARCHAR(255)` | رابط موقع الويب الرسمي |
| `Facebook` | `VARCHAR(255)` | رابط حساب فيسبوك |
| `Twitter` | `VARCHAR(255)` | رابط حساب منصة X / تويتر |
| `Youtube` | `VARCHAR(255)` | رابط قناة يوتيوب |
| `instagram` | `VARCHAR(255)` | رابط حساب انستغرام |
| `short_desc` | `TEXT` | نبذة تعريفية مختصرة |
| `content` | `LONGTEXT` | تفاصيل من نحن والمحتوى التعريفي الكامل |
| `logo` | `VARCHAR(255)` | مسار الشعار الأساسي |
| `smalllogo` | `VARCHAR(255)` | مسار الشعار المصغر |
| `Image_banner` | `VARCHAR(255)` | مسار بنر الترويسة |
| `banner1` | `VARCHAR(255)` | مسار خلفية البنر 1 |
| `order_id` | `INT` | ترتيب العرض |
| `keyword` | `TEXT` | الكلمات المفتاحية للسيو |
| `seo_description` | `TEXT` | وصف الموقع لمحركات البحث |
| `dirctorName` | `VARCHAR(150)` | اسم المدير العام |
| `MessageDirctor` | `TEXT` | رسالة الإدارة العليا / كلمة المدير |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `job_active` | `VARCHAR(10)` | تفعيل التوظيف |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `Modify_date` | `DATETIME` | تاريخ آخر تعديل |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="counter"></a> الجدول: `counter`
**الوصف:** عدادات الأرقام التفاعلية في الموقع (عملاء راضون، مشاريع منجزة، سنوات خبرة).

- **المفتاح الأساسي (Primary Key):** `count_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Counter-Managments.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `count_id` | `INT` | رقم العداد |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | القطاع المرتبط |
| `activity_id` | `INT` | النشاط المرتبط |
| `titleCount` | `VARCHAR(255)` | عنوان العداد المعروض |
| `number` | `INT` | الرقم الإحصائي المستهدف |
| `order_id` | `INT` | ترتيب العرض |
| `font_icon_id` | `VARCHAR(100)` | أيقونة العداد |


### <a id="employees_users"></a> الجدول: `employees_users`
**الوصف:** جدول المستخدمين ومدراء النظام المسؤول عن المصادقة وتسجيل الدخول والصلاحيات الإدارية.

- **المفتاح الأساسي (Primary Key):** `User_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Parts\Sidebare-Funcations.php, techcms\admin\Check-Funcations.php` (+27 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `User_id` | `INT AUTO_INCREMENT` | المفتاح الأساسي لرقم المستخدم |
| `Username` | `VARCHAR(100)` | اسم المستخدم للدخول (Unique) |
| `APassword` | `VARCHAR(255)` | كلمة المرور المشفرة بتنسيق MD5 |
| `User_Key` | `VARCHAR(100)` | مفتاح جلسة الدخول العشوائي للمستخدم |
| `User_type` | `VARCHAR(50)` | نوع المستخدم (Admin, Editor) |
| `userlevel` | `INT` | مستوى الصلاحية (9 للمدير العام) |
| `grup_id` | `INT` | رقم مجموعة الصلاحيات المرتبط بها في privilege_groups |
| `Emp_no` | `INT` | الرقم الوظيفي للموظف |
| `Shown_Name` | `VARCHAR(150)` | الاسم الظاهر في الترويسة وشاشات النظام |
| `Primary_Email` | `VARCHAR(150)` | البريد الإلكتروني الأساسي |
| `Moblile_No` | `VARCHAR(50)` | رقم الجوال |
| `Logopaht` | `VARCHAR(255)` | مسار الصورة الشخصية للمستخدم |
| `RelatedKey` | `VARCHAR(100)` | مفتاح الربط الداخلي |
| `Is_suberadmin` | `INT` | هل هو مدير فائق (1 = نعم, 0 = لا) |
| `Is_Blocked` | `INT` | حالة الحظر (0 = نشط, 1 = محظور) |
| `Is_Actived` | `VARCHAR(10)` | حالة التفعيل ('Yes' / 'No') |
| `adding_date` | `DATETIME` | تاريخ ووقت إضافة المستخدم |
| `User_Note` | `TEXT` | ملاحظات إضافية حول المستخدم |


### <a id="features"></a> الجدول: `features`
**الوصف:** المميزات التشغيلية والخدمية المقدمة للعملاء.

- **المفتاح الأساسي (Primary Key):** `Features_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\featuresContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Features_id` | `INT` | رقم الميزة |
| `lang_id` | `INT` | رقم اللغة |
| `Features_title` | `VARCHAR(255)` | عنوان الميزة |
| `Features_content` | `TEXT` | نص شرح الميزة |
| `Features_img` | `VARCHAR(255)` | أيقونة أو صورة الميزة |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="image_gellary"></a> الجدول: `image_gellary`
**الوصف:** ألبومات ومعارض الصور الخاصة بالمؤسسة وأنشطتها.

- **المفتاح الأساسي (Primary Key):** `Image_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Photo-Managments.php, techcms\admin\Pages\photoes-managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Image_id` | `INT` | رقم المعرض |
| `lang_id` | `INT` | رقم اللغة |
| `titles` | `VARCHAR(255)` | عنوان الألبوم أو الصورة |
| `futuer_Image` | `VARCHAR(255)` | الصورة الرئيسية البارزة |
| `Gellary` | `TEXT` | الصور التابعة للألبوم |
| `Is_Actived` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="languagedictionary"></a> الجدول: `languagedictionary`
**الوصف:** يحوي مفاتيح الترجمة والمصطلحات الثابتة للواجهة الأمامية حسب كل لغة.

- **المفتاح الأساسي (Primary Key):** `dict_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Language-Managements.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `dict_id` | `INT AUTO_INCREMENT` | المعرف الأساسي للمصطلح |
| `lang_id` | `INT` | رقم اللغة التابع لها المصطلح |
| `shortcode` | `VARCHAR(150)` | المفتاح البرمجي (مثل: home, about, readmore) |
| `content` | `TEXT` | النص المترجم المعروض |
| `cat_id` | `INT` | تصنيف المصطلح |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |


### <a id="languages"></a> الجدول: `languages`
**الوصف:** اللغات المدعومة في النظام (العربية، الإنجليزية وغيرها) واتجاهاتها.

- **المفتاح الأساسي (Primary Key):** `lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\About-Managment.php, techcms\admin\Pages\Bannners-Managment.php` (+22 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `lang_id` | `INT AUTO_INCREMENT` | رقم اللغة (1: العربية, 2: الإنجليزية) |
| `lang_title` | `VARCHAR(100)` | اسم اللغة (العربية / English) |
| `lang_name` | `VARCHAR(50)` | اسم اللغة المحلي |
| `class_name` | `VARCHAR(10)` | رمز اللغة البرمجي (ar, en) |
| `dirction` | `VARCHAR(10)` | اتجاه الكتابة (rtl, ltr) |
| `Modify_date` | `DATETIME` | تاريخ آخر تعديل |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `Is_defults` | `VARCHAR(10)` | اللغة الافتراضية |
| `Cat_Notes` | `TEXT` | ملاحظات حول اللغة |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="login_history"></a> الجدول: `login_history`
**الوصف:** سجل أمني يوثق كل عملية تسجيل دخول للمدراء والموظفين وعناوين IP.

- **المفتاح الأساسي (Primary Key):** `History_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\DB.php, techcms\Models\App_Classes\Logins.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `History_id` | `INT AUTO_INCREMENT` | رقم السجل |
| `User_id` | `INT` | معرف المستخدم في employees_users |
| `Login_id` | `INT` | تسلسل الدخول |
| `User_name` | `VARCHAR(100)` | اسم المستخدم الذي سجل الدخول |
| `Login_sessionid` | `VARCHAR(255)` | معرف جلسة الدخول |
| `Login_ipaddress` | `VARCHAR(50)` | عنوان IP للمستخدم أثناء الدخول |
| `Login_time` | `VARCHAR(100)` | وقت وتاريخ الدخول |
| `Is_sission_active` | `VARCHAR(10)` | هل الجلسة نشطة (1 / 0) |


### <a id="our_values"></a> الجدول: `our_values`
**الوصف:** قيم المؤسسة الأساسية (الجودة، الالتزام، الابتكار).

- **المفتاح الأساسي (Primary Key):** `value_id`
- **ملفات السورس المرتبطة:** `techcms\admin\Pages\Values-Managments.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `value_id` | `INT AUTO_INCREMENT` | رقم القيمة |
| `value_title` | `VARCHAR(255)` | عنوان القيمة |
| `order_id` | `INT` | ترتيب العرض |
| `Image` | `VARCHAR(255)` | الصورة أو الأيقونة المرافقة |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="partenrs"></a> الجدول: `partenrs`
**الوصف:** شركاء النجاح والوكالات والشركات المتحالفة.

- **المفتاح الأساسي (Primary Key):** `Partenr_Id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Parts\Home-Stats.php, techcms\admin\Pages\Parteners-ManagmentsContent.php` (+1 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Partenr_Id` | `INT` | رقم الشريك |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | رقم القطاع المرتبط |
| `activity_id` | `INT` | رقم النشاط المرتبط |
| `Name_Partenr` | `VARCHAR(255)` | اسم الشريك |
| `logo` | `VARCHAR(255)` | شعار الشريك |
| `url` | `VARCHAR(255)` | رابط موقع الشريك |
| `order_id` | `INT` | ترتيب العرض |
| `Partenr_type` | `VARCHAR(50)` | نوع الشريك ('partenrs' أو 'clients') |
| `Is_visible` | `VARCHAR(10)` | ظاهر |
| `Is_Actieved` | `VARCHAR(10)` | مفعل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="posts"></a> الجدول: `posts`
**الوصف:** الأخبار والمقالات والفعاليات الصحفية للمؤسسة.

- **المفتاح الأساسي (Primary Key):** `post_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\posts-managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `post_id` | `INT` | رقم المقال أو الخبر |
| `lang_id` | `INT` | رقم اللغة |
| `catpost_id` | `INT` | رقم تصنيف الخبر في cateagory_post |
| `title` | `VARCHAR(255)` | عنوان المقال أو الخبر |
| `small_descrption` | `TEXT` | ملخص أو مقتطف من الخبر |
| `content` | `LONGTEXT` | نص الخبر الكامل وتفاصيله |
| `fatured_image` | `VARCHAR(255)` | صورة الخبر البارزة |
| `facebook` | `VARCHAR(255)` | رابط المشاركة على فيسبوك |
| `twitter` | `VARCHAR(255)` | رابط المشاركة على تويتر |
| `instgram` | `VARCHAR(255)` | رابط انستغرام |
| `Is_Actieved` | `VARCHAR(10)` | حالة تفعيل الخبر |
| `creating_date` | `DATETIME` | تاريخ النشر |
| `User_id` | `INT` | الكاتب / الموظف الناشر |


### <a id="privilege_groups"></a> الجدول: `privilege_groups`
**الوصف:** يحدد أدوار ومجموعات المستخدمين (مثل: مدير عام، محرر محتوى).

- **المفتاح الأساسي (Primary Key):** `grup_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Classes\Logins.php, techcms\admin\Pages\Privilege_Groups.php` (+4 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `grup_id` | `INT AUTO_INCREMENT` | المفتاح الأساسي للمجموعة |
| `grup_title_ar` | `VARCHAR(150)` | اسم المجموعة بالعربية |
| `grup_title_en` | `VARCHAR(150)` | اسم المجموعة بالإنجليزية |
| `GroupKey` | `VARCHAR(100)` | المفتاح البرمجي للمجموعة (admins, editors) |
| `add_date` | `DATETIME` | تاريخ الإضافة |
| `Actived_To_Date` | `DATETIME` | تاريخ انتهاء التفعيل |
| `Last_Modify` | `DATETIME` | تاريخ آخر تعديل |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `can_login_anytime` | `VARCHAR(10)` | إمكانية الدخول في أي وقت |
| `Group_Notes` | `TEXT` | ملاحظات المجموعة |


### <a id="privilegs"></a> الجدول: `privilegs`
**الوصف:** قائمة الإجراءات المتاحة في النظام (إضافة، تعديل، حذف، تصدير، طباعة، إلخ).

- **المفتاح الأساسي (Primary Key):** `Privilege_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Parts\Sidebare-Funcations.php, techcms\admin\Check-Funcations.php, techcms\admin\Pages\Check-Funcations.php` (+6 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Privilege_id` | `INT AUTO_INCREMENT` | رقم الصلاحية (1=insert, 2=edit, 3=delete, ...) |
| `Privilege_title_ar` | `VARCHAR(150)` | عنوان الصلاحية بالعربية |
| `Privilege_title_en` | `VARCHAR(150)` | عنوان الصلاحية بالإنجليزية |
| `Privilege_key` | `VARCHAR(100)` | مفتاح الصلاحية (can_insert, can_edit, ...) |
| `Privilege_descrption_ar` | `TEXT` | وصف تفصيلي بالعربية |
| `Privilege_descrption_en` | `TEXT` | وصف تفصيلي بالإنجليزية |
| `order_id` | `INT` | ترتيب العرض |


### <a id="project"></a> الجدول: `project`
**الوصف:** قائمة المشاريع المنجزة أو منتجات المؤسسة المعروضة للعملاء.

- **المفتاح الأساسي (Primary Key):** `project_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\about_sector_activityContent.php, techcms\admin\Pages\projectContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `project_id` | `INT` | رقم المشروع أو المنتج |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | رقم القطاع |
| `activity_id` | `INT` | رقم النشاط |
| `project_name` | `VARCHAR(255)` | اسم المشروع أو المنتج |
| `project_short_desc` | `TEXT` | وصف مختصر |
| `project_content` | `LONGTEXT` | المحتوى التفصيلي والمواصفات |
| `project_img` | `VARCHAR(255)` | صورة المشروع الأساسية |
| `project_baner` | `VARCHAR(255)` | بنر المشروع |
| `project_imgs` | `TEXT` | صور إضافية للمشروع |
| `order_id` | `INT` | ترتيب العرض |
| `is_featured` | `VARCHAR(10)` | مشروع مميز |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `User_id` | `INT` | المستخدم |


### <a id="sector"></a> الجدول: `sector`
**الوصف:** قطاعات الأعمال الكبرى للمؤسسة (مثل قطاع التجارة، الخدمات، المقاولات).

- **المفتاح الأساسي (Primary Key):** `sector_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Parts\Home-Stats.php, techcms\admin\Pages\Counter-Managments.php` (+9 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `sector_id` | `INT` | رقم القطاع |
| `lang_id` | `INT` | رقم اللغة |
| `sector_name` | `VARCHAR(255)` | اسم القطاع |
| `sector_img` | `VARCHAR(255)` | صورة القطاع |
| `sector_baner` | `VARCHAR(255)` | بنر القطاع |
| `order_id` | `INT` | ترتيب القطاع |
| `keyword` | `TEXT` | كلمات السيو المفتاحية |
| `seo_description` | `TEXT` | وصف السيو لمحركات البحث |
| `Is_visible` | `VARCHAR(10)` | ظاهر في القوائم والواجهة |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإنشاء |
| `Modify_date` | `DATETIME` | تاريخ التعديل |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="seowebsite"></a> الجدول: `seowebsite`
**الوصف:** إعدادات عناوين الصفحات، أوصاف محركات البحث، وصور المشاركة الاجتماعية.

- **المفتاح الأساسي (Primary Key):** `Seo_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\SeoWebsiteContent.php, techcms\admin\Pages\seo-managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Seo_id` | `INT` | رقم سجل السيو |
| `lang_id` | `INT` | رقم اللغة |
| `SeoTitle` | `VARCHAR(255)` | عنوان الصفحة لمحرك البحث (Page Title) |
| `SeoPage` | `VARCHAR(150)` | اسم ملف الصفحة (index, about, contact) |
| `Seo_keyword` | `TEXT` | الكلمات المفتاحية (Meta Keywords) |
| `seo_description` | `TEXT` | وصف الصفحة لمحرك البحث (Meta Description) |
| `SeoImage` | `VARCHAR(255)` | صورة المعاينة في وسائل التواصل (OG Image) |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |


### <a id="services"></a> الجدول: `services`
**الوصف:** الخدمات التي تقدمها المؤسسة مع تفاصيل كل خدمة ومميزاتها.

- **المفتاح الأساسي (Primary Key):** `service_id`
- **ملفات السورس المرتبطة:** `techcms\admin\Pages\Services-Managments.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `service_id` | `INT AUTO_INCREMENT` | رقم الخدمة |
| `service_title` | `VARCHAR(255)` | عنوان الخدمة |
| `short_desc` | `TEXT` | وصف مختصر للخدمة |
| `content` | `LONGTEXT` | المحتوى الكامل والشرح |
| `order_id` | `INT` | ترتيب الخدمة |
| `Image` | `VARCHAR(255)` | صورة الخدمة |
| `keyword` | `TEXT` | كلمات السيو المفتاحية |
| `seo_description` | `TEXT` | وصف السيو |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="sliders_items"></a> الجدول: `sliders_items`
**الوصف:** شرائح العرض الرئيسية التفاعلية في واجهة الموقع مع النصوص والأزرار والصور.

- **المفتاح الأساسي (Primary Key):** `Sitem_ID, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\Slider-Managements.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Sitem_ID` | `INT` | رقم شريحة السلايدر |
| `lang_id` | `INT` | رقم اللغة |
| `titles` | `VARCHAR(255)` | عنوان الشريحة الرئيسي |
| `image` | `VARCHAR(255)` | صورة الشريحة الخلفية |
| `text1` | `TEXT` | النص الوصفي الأول |
| `text2` | `TEXT` | النص الوصفي الثاني |
| `text3` | `TEXT` | نص الزر الأول |
| `text4` | `TEXT` | نص الزر الثاني |
| `img1` | `VARCHAR(255)` | صورة إضافية 1 |
| `img2` | `VARCHAR(255)` | صورة إضافية 2 |
| `Modals` | `VARCHAR(100)` | نموذج العرض |
| `sorder_id` | `INT` | ترتيب ظهور الشريحة |
| `Is_Actived` | `VARCHAR(10)` | حالة تفعيل الشريحة |
| `Modify_date` | `DATETIME` | تاريخ آخر تعديل |
| `User_id` | `INT` | المستخدم المنشئ |


### <a id="stattracker"></a> الجدول: `stattracker`
**الوصف:** سجل زيارات صفحات الموقع وعناوين IP والمتصفحات لتحليل الأداء.

- **المفتاح الأساسي (Primary Key):** `id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\StattrackerContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `id` | `INT AUTO_INCREMENT` | رقم السجل |
| `browser` | `VARCHAR(255)` | متصفح ونظام تشغيل الزائر |
| `ip` | `VARCHAR(50)` | عنوان IP للزائر |
| `date_visited` | `DATETIME` | تاريخ ووقت الزيارة |
| `page` | `VARCHAR(255)` | الصفحة التي تمت زيارتها |
| `from_page` | `VARCHAR(255)` | صفحة الإحالة (Referrer) |


### <a id="subscribusers"></a> الجدول: `subscribusers`
**الوصف:** عناوين البريد الإلكتروني للمشتركين في النشرة الإخبارية.

- **المفتاح الأساسي (Primary Key):** `id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Classes\subscribadd.php, techcms\Models\App_Classes\unsubscribe.php` (+1 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `id` | `INT AUTO_INCREMENT` | رقم المشترك |
| `email` | `VARCHAR(150)` | البريد الإلكتروني (Unique) |
| `hash` | `VARCHAR(255)` | رمز التفعيل أو إلغاء الاشتراك |
| `subscribDate` | `DATETIME` | تاريخ الاشتراك |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |


### <a id="testimonial"></a> الجدول: `testimonial`
**الوصف:** شهادات وتجارب العملاء المعروضة على الصفحة الرئيسية.

- **المفتاح الأساسي (Primary Key):** `Testimonial_id, lang_id`
- **ملفات السورس المرتبطة:** `Modals\app_view\testimonial.php, techcms\admin\Pages\TestimonialContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `Testimonial_id` | `INT` | رقم التوصية |
| `lang_id` | `INT` | رقم اللغة |
| `TestimonialName` | `VARCHAR(255)` | اسم العميل أو صاحب التوصية |
| `TestimonialImage` | `VARCHAR(255)` | صورة صاحب التوصية |
| `TestimonialContnet` | `TEXT` | نص الرأي أو الشهادة |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="uin_info"></a> الجدول: `uin_info`
**الوصف:** فقرات إضافية لمعلومات المؤسسة في صفحات من نحن ومواقع الفروع.

- **المفتاح الأساسي (Primary Key):** `uininfo_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\About-Managment.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `uininfo_id` | `INT` | رقم السجل |
| `lang_id` | `INT` | رقم اللغة |
| `PostionAbout` | `VARCHAR(50)` | موقع الظهور (Postion1, Postion2, ...) |
| `TypeAbout` | `VARCHAR(50)` | نوع المحتوى (uininfo, about) |
| `Title` | `VARCHAR(255)` | العنوان الرئيسي |
| `short_desc` | `TEXT` | وصف مختصر |
| `content` | `LONGTEXT` | المحتوى الكامل |
| `location` | `VARCHAR(255)` | الموقع الجغرافي |
| `uploadvedio` | `VARCHAR(255)` | فيديو مرفق |
| `links` | `VARCHAR(255)` | روابط إضافية |
| `Image` | `VARCHAR(255)` | صورة مرفقة |
| `PdfFile` | `VARCHAR(255)` | ملف PDF مرفق |
| `order_id` | `INT` | ترتيب العرض |
| `Is_visible` | `VARCHAR(10)` | ظاهر |
| `Is_Actieved` | `VARCHAR(10)` | مفعل |


### <a id="users_group_privilegs_config"></a> الجدول: `users_group_privilegs_config`
**الوصف:** ربط كل مجموعة بمستوى الصلاحيات لكل صفحة من صفحات النظام.

- **المفتاح الأساسي (Primary Key):** `id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\Models\App_Classes\DB.php, techcms\Models\App_Classes\Logins.php` (+7 ملفات)

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `id` | `INT AUTO_INCREMENT` | المعرف الأساسي للربط |
| `grup_id` | `INT` | معرف المجموعة في privilege_groups |
| `Page_id` | `INT` | معرف الصفحة في app_pages |
| `Privilege_id` | `INT` | معرف الصلاحية (1-11) |
| `is_granted` | `VARCHAR(10)` | هل الصلاحية ممنوحة (1 = نعم, 0 = لا) |


### <a id="vedio_gellary"></a> الجدول: `vedio_gellary`
**الوصف:** مقاطع الفيديو الترويجية أو التوثيقية لأعمال المؤسسة.

- **المفتاح الأساسي (Primary Key):** `vedio_id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\videos-managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `vedio_id` | `INT` | رقم مقطع الفيديو |
| `lang_id` | `INT` | رقم اللغة |
| `titles` | `VARCHAR(255)` | عنوان الفيديو |
| `location` | `VARCHAR(255)` | مكان التصوير أو المناسبة |
| `uploadvedio` | `VARCHAR(255)` | مسار ملف الفيديو المرفوع محلياً |
| `url` | `VARCHAR(255)` | رابط فيديو يوتيوب أو المنصة الخارجية |
| `Is_Actived` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |


### <a id="why_us"></a> الجدول: `why_us`
**الوصف:** نقاط التميز التنافسية وأسباب اختيار العملاء للمؤسسة.

- **المفتاح الأساسي (Primary Key):** `why_us_Id, lang_id`
- **ملفات السورس المرتبطة:** `techcms\Models\App_Classes\App_Funcations.php, techcms\admin\Pages\why_us_managementContent.php`

| اسم الحقل (Column) | النوع (Data Type) | الوصف والدور البرمجي |
| :--- | :--- | :--- |
| `why_us_Id` | `INT` | رقم السجل |
| `lang_id` | `INT` | رقم اللغة |
| `sector_id` | `INT` | رقم القطاع |
| `activity_id` | `INT` | رقم النشاط |
| `Name_Partenr` | `VARCHAR(255)` | عنوان الفقرة الرئيسي |
| `point1` | `VARCHAR(255)` | الميزة الأولى |
| `point2` | `VARCHAR(255)` | الميزة الثانية |
| `point3` | `VARCHAR(255)` | الميزة الثالثة |
| `point4` | `VARCHAR(255)` | الميزة الرابعة |
| `point5` | `VARCHAR(255)` | الميزة الخامسة |
| `logo` | `VARCHAR(255)` | الصورة المرافقة |
| `url` | `VARCHAR(255)` | رابط المزيد |
| `order_id` | `INT` | ترتيب العرض |
| `Is_Actieved` | `VARCHAR(10)` | حالة التفعيل |
| `creating_date` | `DATETIME` | تاريخ الإضافة |
| `User_id` | `INT` | المستخدم |

