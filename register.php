<?php
// Si l'utilisateur a fait submit

if (isset($_POST['confinsc'])) {

	// Extraire les informations personelles
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ddn = $_POST['ddn'];
    $ldn = $_POST['ldn'];
    $lres = $_POST['lres'];
    $bresi = $_POST['bresi'];
    $telm = $_POST['telm'];
    $email = $_POST['email'];
    $nsco = $_POST['nsco'];
    $pwd = $_POST['pwd'];
    $confpwd = $_POST['confpwd'];
    
	// Extraire les informations relatives à la formation
    $certif = $_POST['certif'];
    $speciality = $_POST['speciality'];

    // traiter le fichier
    $preuvecert_tmp_name = $_FILES['preuvecert']['tmp_name'];
    $preuvecert_name = $_FILES['preuvecert']['name'];
    $preuvecert_type = $_FILES['preuvecert']['type'];

    // lire le contenu du fichier
    $preuvecert_content = file_get_contents($preuvecert_tmp_name);

    $data = array(
        'fname' => $fname,
        'lname' => $lname,
        'ddn' => $ddn,
        'ldn' => $ldn,
        'lres' => $lres,
        'bresi' => $bresi,
        'telm' => $telm,
        'email' => $email,
        'nsco' => $nsco,
        'pwd' => $pwd,
        'confpwd' => $confpwd,
        'certif' => $certif,
        'speciality' => $speciality,
        'preuvecert_name' => $preuvecert_name,
        'preuvecert_type' => $preuvecert_type,
        'preuvecert_content' => base64_encode($preuvecert_content) // Convert file content to base64
    );
	

	
		$json_data = json_encode($data);
		
		// Require Soap
		require_once('lib/nusoap.php');
		$client = new SoapClient("http://192.168.100.32:8080/wsIPEFBIS/inscriptionWS?WSDL");
		// specific service call
		$result = $client->__call('loginWS',array("q","q","q") );

		// result set returned
			//echo "<script>alert('" . json_encode($result) . "');</script>";
			echo "<script>alert('" . json_encode($result) . "');</script>";
		//echo <print "<pre>";print_r($result);
	
	
}
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>التسجيل</title>
		</style>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
	<?php include 'header.php'; ?>	
	<div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">  التسجيل </h3></div>
                                    <div class="card-body">
                                        <form action="#" method="post" enctype="multipart/form-data">
										
										<div class=""><h3 >المعلومات السخصية </h3></div>
										
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="fname"  type="text" placeholder="أدخل الإسم "  />
                                                        <label for="fname">الإسم </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="lname" type="text" placeholder="أدخل اللقب"  />
                                                        <label for="lname">اللقب</label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row mb-3">
												<div class="col-md-6">
													<div class="form-floating mb-3">
														<input class="form-control" name="ddn" type="date" placeholder="أدخل تاريخ الإزدياد"   />
														<label for="ddn">تاريخ الإزدياد </label>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-floating mb-3">
														<input class="form-control" name="ldn" type="text" placeholder="أدخل مكان الإزدياد "   />
														<label for="ldn">مكان الإزدياد  </label>
													</div>
												</div>
												
											</div>
											
											
											
											<div class="row mb-3">
												<div class="col-md-6">
													<div class="form-floating mb-3">
													<select class="form-select" name="lres" aria-label="اختر الولاية" >
														<option value="" selected disabled>اختر الولاية</option>
														<option value="01- أدرار">01- أدرار</option>
														<option value="02- الشلف">02- الشلف</option>
														<option value="03- الأغواط">03- الأغواط</option>
														<option value="04- أم البواقي">04- أم البواقي</option>
														<option value="05- باتنة">05- باتنة</option>
														<option value="06- بجاية">06- بجاية</option>
														<option value="07- بسكرة">07- بسكرة</option>
														<option value="08- بشار">08- بشار</option>
														<option value="09- البليدة">09- البليدة</option>
														<option value="10- البويرة">10- البويرة</option>
														<option value="11- تمنراست">11- تمنراست</option>
														<option value="12- تبسة">12- تبسة</option>
														<option value="13- تلمسان">13- تلمسان</option>
														<option value="14- تيارت">14- تيارت</option>
														<option value="15- تيزي وزو">15- تيزي وزو</option>
														<option value="16- الجزائر">16- الجزائر</option>
														<option value="17- الجلفة">17- الجلفة</option>
														<option value="18- جيجل">18- جيجل</option>
														<option value="19- سطيف">19- سطيف</option>
														<option value="20- سعيدة">20- سعيدة</option>
														<option value="21- سكيكدة">21- سكيكدة</option>
														<option value="22- سيدي بلعباس">22- سيدي بلعباس</option>
														<option value="23- عنابة">23- عنابة</option>
														<option value="24- قالمة">24- قالمة</option>
														<option value="25- قسنطينة">25- قسنطينة</option>
														<option value="26- المدية">26- المدية</option>
														<option value="27- مستغانم">27- مستغانم</option>
														<option value="28- المسيلة">28- المسيلة</option>
														<option value="29- معسكر">29- معسكر</option>
														<option value="30- ورقلة">30- ورقلة</option>
														<option value="31- وهران">31- وهران</option>
														<option value="32- البيض">32- البيض</option>
														<option value="33- الإيليزي">33- الإيليزي</option>
														<option value="34- برج بوعريريج">34- برج بوعريريج</option>
														<option value="35- بومرداس">35- بومرداس</option>
														<option value="36- الطارف">36- الطارف</option>
														<option value="37- تندوف">37- تندوف</option>
														<option value="38- تسمسيلت">38- تسمسيلت</option>
														<option value="39- الوادي">39- الوادي</option>
														<option value="40- خنشلة">40- خنشلة</option>
														<option value="41- سوق أهراس">41- سوق أهراس</option>
														<option value="42- تيبازة">42- تيبازة</option>
														<option value="43- ميلة">43- ميلة</option>
														<option value="44- عين دفلى">44- عين دفلى</option>
														<option value="45- النعامة">45- النعامة</option>
														<option value="46- عين تموشنت">46- عين تموشنت</option>
														<option value="47- غرداية">47- غرداية</option>
														<option value="48- الريليزان">48- الريليزان</option>
														<option value="49- المغير">49- المغير</option>
														<option value="50- المنيعة">50- المنيعة</option>
														<option value="51- أولاد جلال">51- أولاد جلال</option>
														<option value="52- برج باجي مختار">52- برج باجي مختار</option>
														<option value="53- بني عباس">53- بني عباس</option>
														<option value="54- تيميمون">54- تيميمون</option>
														<option value="55- تندوف">55- تندوف</option>
														<option value="56- جانت">56- جانت</option>
														<option value="57- إن صالح">57- إن صالح</option>
														<option value="58- إن قزام">58- إن قزام</option>
													</select>
													<label for="ldn">مقر الإقامة (الولاية)</label>


													
											
													</div>
												</div>
												<div class="col-md-6">
														<div class="form-floating mb-3">
															<input class="form-control" name="bresi" type="text" placeholder="أكتب بلدية الإقامة"  />
															<label for="bresi">البلدية</label>
														</div>
												</div>
											</div>
											
											
											 <div class="form-floating mb-3">
                                                <input class="form-control" name="telm" type="phone" placeholder="name@example.com"  />
                                                <label for="telm">الهاتف </label>
                                            </div>
											
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" type="email" placeholder="name@example.com"  />
                                                <label for="email">البريد الإلكتروني </label>
                                            </div>
											 
											        <div class="form-floating mb-3">
														<select class="form-control" name="nsco" aria-label="إختر المستوى" >
														<option value="" selected disabled>إختر المستوى</option>
														<option value="مستوى إبتدائي">مستوى إبتدائي</option>
														<option value="سنة أولى متوسط">سنة أولى متوسط</option>
														<option value="سنة ثانية متوسط">سنة ثانية متوسط</option>
														<option value="سنة ثالثة متوسط"> سنة ثالثة متوسط</option>												
														<option value="سنة رابعة متوسط"> سنة رابعة متوسط</option>												
														<option value="سنة أولى ثانوي">سنة أولى ثانوي </option>												
														<option value="سنة ثانية ثانوي"> سنة ثانية ثانوي</option>												
														<option value="سنة ثالثة ثانوي">سنة ثالثة ثانوي </option>												
														</select>
														<label for="ْnsco">المستوى التعليمي </label>
													</div>
                                        
											
											
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="pwd" type="password" placeholder="كلمة السر"  />
                                                        <label for="pwd">كلمة السر </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="confpwd" type="password" placeholder="تأكيد كلمة السر"   />
                                                        <label for="confpwd">تأكيد كلمة السر </label>
                                                    </div>
                                                </div>
                                            </div>
											<div class=""><h3 >التسجيل في دورات التكوين </h3></div>
											
											  <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
													<select class="form-control" name="certif"  aria-label="إختر الشهادة" >
														<option value="" selected disabled>إختر الشهادة</option>
														<option value="ِCFPS"> ِCFPS </option>
														<option value="CMP">CMP</option>
														<option value="BP">BP</option>
														<option value="تقني"> تقني</option>												
														<option value="تقني سامي"> تقني سامي</option>												
														<option value="CMTS">CMTS</option>												
														<option value="CED">CED</option>												
																									
														</select>
														<label for="certif">الشهادة </label>
                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
												<div class="">
													<label  for="preuvecert">تحميل الوثيقة التى تثبت مستوى التأهيل (صيغ الملفات المقبولة: .pdf, .jpg .jpeg .png)</label>													
													<input class="form-control" name="preuvecert" type="file" accept=".pdf, .jpg, .jpeg, .png"  />
												</div>
                                     
                                                </div>
                                            </div>
											 <div class="form-floating mb-3">
                                                <select class="form-select" name="speciality" aria-label="إختر التخصص" >
													<option value="" selected disabled>إختر التخصص</option>
													<option value="علام آلي - تخصص مُستغل المعلوماتية">علام آلي - تخصص مُستغل المعلوماتية</option>
													<option value="إعلام آلي - تخصص عامل في الميكرو معلوماتية">إعلام آلي - تخصص عامل في الميكرو معلوماتية</option>
													<option value="إعلام آلي - تخصص عون ادراج المعلومات">إعلام آلي - تخصص عون ادراج المعلومات</option>
													<option value="إعلام آلي - تخصص معلوماتية التسيير">إعلام آلي - تخصص معلوماتية التسيير</option>
													<option value="إعلام آلي - تخصص قاعدة المعطيات">إعلام آلي - تخصص قاعدة المعطيات</option>
													<option value="إعلام آلي - تخصص صيانة الأنظمة المعلوماتية">إعلام آلي - تخصص صيانة الأنظمة المعلوماتية</option>
													<option value="تقنيات الإدارة و التسيير - تخصص أمين مخزن">تقنيات الإدارة و التسيير - تخصص أمين مخزن</option>
													<option value="تقنيات الإدارة و التسيير - مساعد تقني متخصص في المكتبات">تقنيات الإدارة و التسيير - مساعد تقني متخصص في المكتبات</option>
													<option value="تقنيات الإدارة و التسيير - مساعد تقني متخصص في التوثيق والأرشيف">تقنيات الإدارة و التسيير - مساعد تقني متخصص في التوثيق والأرشيف</option>
													<option value="تقنيات الإدارة و التسيير - تخصص المحاسبة والتسيير">تقنيات الإدارة و التسيير - تخصص المحاسبة والتسيير</option>
													<option value="تقنيات الإدارة و التسيير - تخصص البنوك">تقنيات الإدارة و التسيير - تخصص البنوك</option>
													<option value="تقنيات الإدارة و التسيير - تخصص التأمينات">تقنيات الإدارة و التسيير - تخصص التأمينات</option>
													<option value="تقنيات الإدارة و التسيير - تخصص الأمانة">تقنيات الإدارة و التسيير - تخصص الأمانة</option>
													<option value="تقنيات الإدارة و التسيير - تخصص تسيير المخزونات">تقنيات الإدارة و التسيير - تخصص تسيير المخزونات</option>
													<option value="تقنيات الإدارة و التسيير - تخصص التجارة الدولية">تقنيات الإدارة و التسيير - تخصص التجارة الدولية</option>
													<option value="تقنيات الإدارة و التسيير - تخصص التسويق">تقنيات الإدارة و التسيير - تخصص التسويق</option>
													<option value="تقنيات الإدارة و التسيير - تخصص تسيير الموارد البشرية">تقنيات الإدارة و التسيير - تخصص تسيير الموارد البشرية</option>
													<option value="شهادة تأهيلية - تعلم اللغة العربية">شهادة تأهيلية - تعلم اللغة العربية</option>
													<option value="شهادة تأهيلية - تعلم اللغة الفرنسية">شهادة تأهيلية - تعلم اللغة الفرنسية</option>
													<option value="شهادة تأهيلية - تعلم اللغة الإنجليزية">شهادة تأهيلية - تعلم اللغة الإنجليزية</option>
													<option value="مهن الخدمات - تخصص النسج والحياكة">مهن الخدمات - تخصص النسج والحياكة</option>
													<option value="مهن الخدمات - تخصص حلاقة الرجال">مهن الخدمات - تخصص حلاقة الرجال</option>
													<option value="مهن الخدمات - تخصص حِلاقة نساء">مهن الخدمات - تخصص حِلاقة نساء</option>
													<option value="مهن الخدمات - تخصص مُربية الطفولة الأولى">مهن الخدمات - تخصص مُربية الطفولة الأولى</option>
													<option value="مهن الخدمات - تخصص صناعة الحلي التقليدي">مهن الخدمات - تخصص صناعة الحلي التقليدي</option>
													<option value="مهن الخدمات - تخصص الطرز">مهن الخدمات - تخصص الطرز</option>
													<option value="مهن الخدمات - تخصص صناعة الحلويات">مهن الخدمات - تخصص صناعة الحلويات</option>
													<option value="مهن الخدمات - تخصص طبخ الجماعي">مهن الخدمات - تخصص طبخ الجماعي</option>
													<option value="مهن الخدمات - خدمات فندقية">مهن الخدمات - خدمات فندقية</option>
													<option value="مهن الخدمات - الاستقبال">مهن الخدمات - الاستقبال</option>
													<option value="مهن الخدمات - الخدمة الطاولة">مهن الخدمات - الخدمة الطاولة</option>
													<option value="تكوين حسب الطلب">تكوين حسب الطلب</option>
												</select>
												<label for="speciality">الشهادة </label>

                                            </div>
											
				
											
											
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input name="confinsc" class="btn btn-primary btn-block" value="تأكيد التسجيل" type="submit" >  </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">لديك حساب ؟  الذهاب لتسجيل الدخول </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

            
			
			
			
	<?php include 'footer.php'; ?>	

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>		
</body>
</html>
