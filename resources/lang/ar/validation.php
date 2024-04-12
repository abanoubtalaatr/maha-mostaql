<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted' => 'يجب قبول :attribute',
    'active_url' => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute على مسافة.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون :attribute ًمصفوفة',
    'before' => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date' => ':attribute ليس تاريخًا صحيحًا',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي :attribute على :digits أرقام',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقما ',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists' => ':attribute غير مسجل',
    'file' => 'الـ :attribute يجب أن يكون ملفا.',
    'filled' => ':attribute إجباري',
    'image' => 'يجب أن يكون :attribute صورةً',
    'in' => ':attribute غير صحيح',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'max' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر لـ :max.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروف',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون :attribute أقل من او يساوي :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'gt' => [
        'numeric' => 'يجب أن يكون :attribute اكبر من :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون :attribute اكبر من او يساوي :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل   لـ :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروف',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in' => ':attribute غير صحيح',
    'numeric' => 'يجب على :attribute أن يكون رقمًا',
    'present' => 'يجب تقديم :attribute',
    'regex' => 'صيغة :attribute .غير صحيحة',
    'required' => ' برجاء ادخال :attribute',
    'required_if' => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all' => ':attribute مطلوب إذا توفّر :values.',
    'required_without' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'string' => 'يجب أن يكون :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => ' :attribute موجود من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'url' => 'صيغة الرابط :attribute غير صحيحة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'custom' => array(
        'password' => array(
            'regex' => '  يجب أن تحتوي كلمة المرور على الاقل رقم واحد وحرف ابجدي صغير واحد و حرف ابجدي كبير واحد ورقم واحد وحرف خاص واحد ولا يحتوي على مسافة '
        )
    ),
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'max_loan' => 'الحد الأقصى للقرض',
        'min_loan' => 'الحد الأدنى للقرض',
        'fax' => 'الفاكس',
        'website' => 'لينك الموقع',
        'facebook' => 'فيس بوك',
        'linkedin' => 'لينكدان',
        'twitter' => 'تويتر',
        'instgram' => 'انستجرام',
        'whatsapp' => 'واتساب لينك',
        'youtube' => 'يوتيوب',
        'subject' => 'العنوان',
        'referral_code' => 'كود الاحالة',
        'service_fees' => 'رسوم الخدمة',
        'payment_method' => 'طريقة الدفع',
        'user_bank_id' => 'الحساب البنكي',
        'min_age' => 'الحد الأدنى للعمر',
        'max_age' => 'الحد الأقصى للعمر',
        'min_monthly_salary' => 'الحد الأدنى للراتب',
        'ar_content' => 'المحتوي العربي',
        'en_content' => 'المحتوي الانجليزي',
        'ar_title' => 'العنوان العربي',
        'en_title' => 'العنوان الانجليزي',
        'id_number' => 'رقم الهوية',
        'mobile_number' => 'رقم الجوال',
        'date_of_birth' => 'تاريخ الميلاد',
        'name' => 'الاسم',
        'employee' => 'موظف',
        'work_entity_name' => 'إسم جهة العمل ',
        'total_monthly_expenses' => 'إجمالىي المصاريف الشهرية',
        'total_monthly_obligations' => ' التزاماتك الشهرية',
        'home' => 'حالة المنزل',
        'marital_status' => 'حالتك الاجتماعية',
        'bank_id' => 'البنك',
        'number_of_children' => 'عدد أطفالك ',
        'number_of_domestic_workers' => 'عدد العمالة المنزلية',
        'username' => 'اسم المُستخدم',
        'close_time' => 'وقت القفل',
        'open_time' => 'وقت البدء',
        'username2' => 'اسم المُستخدم',
        'username3' => 'اسم المُستخدم',
        'email' => 'البريد الإلكتروني',
        'category_id' => 'القسم',
        'country_code' => 'كود الدولة',
        'size' => 'الحجم',
        'detials' => 'تفاصيل',
        'arrival_time' => 'وقت الوصول',
        'arrival_date' => 'تاريخ الوصول',
        'travel_time' => 'وقت الاقلاع',
        'travel_date' => 'تاريخ الاقلاع',
        'travel_address' => 'عنوان الاقلاع',
        'arrival_address' => 'عنوان الوصول',
        'ar_name' => 'الاسم بالعربي',
        'en_name' => 'الاسم بالانجليزي',
        'hi_name' => 'الاسم بالهندي',
        'firstname' => 'الاسم',
        'order_range' => 'نطاق بحث الطلبات',
        'provider_range' => 'نطاق بحث المتاجر',
        'pull_limit' => 'الاحد الأدنى للسحب',
        'charge_limit' => 'الاحد الأدنى للشحن',
        'order_duration' => 'مدة الغاء الطلب الجديد',
        'cancel_duration' => 'مدة الغاء الطلب النشط',
        'commission_value' => 'العمولة',
        'commission_count' => 'عدد العمولات ',
        'welcome_text' => 'عبارة الترحيب',
        'birth_date' => 'تاريخ الميلاد',
        'job' => 'الوظيفة',
        'identityType_id' => 'نوع الهوية',
        'carType_id' => 'نوع السيارة',
        'idNumber' => 'رقم الهوية',
        'cash' => 'قيمة الرصيد ',
        'last_name' => 'اسم الاخير',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city' => 'المدينة',
        'driver_availability' => 'متاح',
        'no_cities' => 'لا توجد مدن',
        'place_name' => 'اسم المكان',
        'order_details' => 'تفاصيل الطلب',
        'longitude_from' => 'موقع الخدمة',
        'longitude_to' => 'موقع الاستلام',
        'latitude_from' => 'موقع الخدمة',
        'latitude_to' => 'موقع الاستلام',
        'cancel_details' => 'تفاصيل الالغاء',
        'service_category_id' => 'قسم الخدمة',
        'cancel_reason_client' => 'سبب الالغاء ',
        'cancel_reason_driver' => 'سبب الالغاء ',
        'longitude' => ' الخريطة',
        'delivery_type' => ' نوع التوصيل',
        'country' => 'الدولة',
        'country_id' => 'الدولة',
        'truckle' => 'الشاحنة',
        'truckle_id' => 'الشاحنة',
        'identity' => 'هوية شخصية',
        'license' => 'رخصة القيادة',
        'car_form' => 'استمارة السيارة',
        'transportation_card' => ' صورة السيارة من الامام',
        'insurance' => 'صورة السيارة من الخلف',
        'address' => 'العنوان',
        'phone_number' => 'الهاتف',
        'mobile' => 'الجوال ',
        'age' => 'العمر',
        'sex' => 'الجنس',
        'gender' => 'النوع',
        'day' => 'اليوم',
        'month' => 'الشهر',
        'year' => 'السنة',
        'hour' => 'ساعة',
        'minute' => 'دقيقة',
        'second' => 'ثانية',
        'title' => 'العنوان',
        'content' => 'المُحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المُلخص',
        'date' => 'التاريخ',
        'date2' => 'التاريخ',
        'date3' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'مُتاح',
        'size' => 'الحجم',
        'privacyConditions' => 'شروط الخصوصية',
        'register-country' => 'الدولة',
        'register-grade' => 'المرحلة الدراسية ',
        'message' => 'الرسالة ',
        'commission' => 'العمولة ',
        'name.ar' => 'اسم الموقع ',
        'name.en' => 'اسم الموقع  ',
        'name_social.ar' => 'الاسم',
        'name_social.en' => 'الاسم ',
        'fav_icon' => 'أيقونة ',
        'logo_header' => 'لوجو أعلى الصفحة',
        'logo_footer' => 'لوجو أسفل الصفحة ',
        'type' => 'النوع ',

        'icon' => 'أيقونة ',
        'name_bank.ar' => 'اسم البنك',
        'name_bank.en' => 'اسم البنك ',
        'account_number' => 'رقم الحساب ',
        'account_number2' => 'رقم الحساب ',
        'account_number3' => 'رقم الحساب ',
        'account_id' => 'الايبان ',
        'username.ar' => 'اسم المستخدم ',
        'username.en' => 'اسم المستخدم ',
        'image' => 'الصورة',
        'image2' => 'الصورة',
        'image3' => 'الصورة',
        'text.ar' => 'المحتوي',
        'text.en' => 'المحتوي',
        'page_name.ar' => 'اسم الصفحة',
        'page_name.en' => 'اسم الصفحة',
        'order' => 'ترتيب العرض',
        'order_id' => 'رقم الطلب',
        'order_count' => 'عدد الطلبات',
        'ar_message' => 'المحتوي',
        'offer.ar' => 'الاسم',
        'offer.en' => 'الاسم',
        'place' => 'المكان',
        'duration' => 'المدة',
        'duration_type' => 'نوع المدة',
        'rating' => 'التقييم',
        'price' => 'السعر',
        'details_driver' => 'التفاصيل',
        'products_attributes.*.ar' => 'المواصفات',
        'products_attributes.*.en' => 'المواصفات',
        'attributes_type' => 'حقل المواصفات',
        'main_section.ar' => 'القسم الرئيسي',
        'main_section.en' => 'القسم الرئيسي',
        'main_section' => 'القسم الرئيسي',
        'sub_section.ar' => 'القسم الفرعي',
        'sub_section.en' => 'القسم الفرعي',
        'desc.en' => 'الوصف',
        'desc.ar' => 'الوصف',
        'keywords.en' => 'كلمات دلالية',
        'keywords.ar' => 'كلمات دلالية',
        'sub_section' => 'القسم الفرعي',
        'subSub_section' => 'القسم الفرعي',
        'category_attributes' => 'المواصفات',
        'blacklist' => 'الحظر',
        'active' => 'التفعيل',
        'images.*' => 'الصور',
        'images' => 'الصور',
        'video' => 'الفيديو',
        'subscription_type' => 'نوع الاعلان',
        'ads_name' => 'اسم الاعلان',
        'end_duration' => 'تاريخ الانتهاء',
        'all_attributes.*' => 'المواصفات',
        'attributes_required' => 'المواصفات',
        'end_special' => 'تاريخ الانتهاء',
        'phone' => 'رقم الهاتف',
        'photo' => ' الصورة',
        'role' => 'المجموعة',
        'code' => 'رمز التفعيل',
        'code1' => 'الكود',
        'code2' => 'الكود',
        'subscription' => 'مدة الاعلان',
        'category' => 'القسم',
        'type_ads' => 'نوع الاعلان',
        'latitude' => 'العنوان',
        'sub_category' => 'القسم الفرعي',
        'register_confirm' => 'الموافقة على الشروط',
        'amount' => 'المبلغ',
        'ads_id' => 'رقم الاعلان',
        'ads_id2' => 'رقم الاعلان',
        'ads_id3' => 'رقم الاعلان',
        'reference_number' => 'الرقم المرجعي',
        'reference_number2' => 'الرقم المرجعي',
        'reference_number3' => 'الرقم المرجعي',
        'bank_name' => 'البنك',
        'carTypeId' => 'رقم نوع السيارة',
        'identityTypeId' => ' رقم نوع الهوية',
        'nationalityId' => 'رقم الجنسية',
        'nameAr' => 'الاسم',
        'department_id' => 'القسم',
        'percentage' => 'النسبة',
        'bank_name2' => 'البنك',
        'bank_name3' => 'البنك',
        'bank_account' => 'رقم الحساب',
        'old_password' => 'كلمة المرور القديمة',
        'user_id' => 'رقم المستخدم',
        'paid' => 'طريقة الدفع',
        'user_id2' => 'رقم المستخدم',
        'user_id3' => 'رقم المستخدم',
        'offer' => 'الباقات',
        'offer2' => 'الباقات',
        'subscription_offer' => 'الباقات',
        'special_offer' => 'الباقات',
        'ads_type' => 'نوع الدفع',
        'ads_user' => 'صاحب الاعلان',
        'comment' => 'التعليق',
        'rate' => 'التقييم',
        'ad_id' => 'رقم الاعلان',
        'sender' => 'اسم المرسل',
        'url' => 'المسار',
        "attribute_name" => "الاسم",

        "ads_width" => "العرض",
        "ads_height" => "الطول",
        "section_width" => "العرض",
        "section_height" => "الطول",
        "home_width" => "العرض",
        "home_height" => "الطول",
        "main_image" => "الصورة الرئيسية",
        "g-recaptcha-response" => "حقل التحقق",
        "region" => "المنطقة",
        "user_type" => "نوع الحساب",
        "company_name" => "اسم الشركة",
        "commercial_number" => "رقم السجل التجاري",
        "commercial_end_date" => "تاريخ انتهاء السجل التجاري",
        "source.name" => "اسم المستفيد",
        "source.number" => "رقم الحساب",
        "source.month" => "رقم الشهر",
        "source.year" => "السنة الحالية",
        "source.username" => "اسم المستفيد",
        "ads_image_number" => "عدد صور الداخلية للاعلان",
        "mazad_time" => "المدة الزمنية للمزاد",
        "mazad_number" => "عدد مرات المزايدة في اليوم الواحد",
        "static_price_time" => "المدة الزمنية للسعر الثابت",
        "pulling_out_numbers" => "عدد مرات الانسحاب",
        "offer_time_for_saler" => "المدة الزمنية لتقديم عرض",
        "days_num_to_receive" => "عدد الايام لاستلام المنتج من المعرض",
        "deposit_type" => "نوع العربون",
        "deposit_price" => "سعر العربون بناء على اختيارك لنوع العربون",
        "packages_status" => "حالة الباقة لحساب شركة",
        "packages_percentage" => "نسبة العمولة لحساب الشركة",
        "file_upload" => "الملف",
        "tax_region_id" => "اسم المنطقة الجغرافية",
        "region_id" => "اسم المنطقة الجغرافية",
        "tax_price_id" => "سعر الضريبة",
        "country_id" => "الدولة",
        "city_id" => "المدينة",

        "sale_type" => "نوع الاعلان",
        "main_pic" => "الصورة الرئيسية",
        "check_center_status" => "فحص المنتج",
        "deposit_price_status" => "دفع عربون",
        "conversation_status" => "تقبل التفاوض",
        "offer_price_status" => "تقبل عرض سعر",
        "retrieval_type" => "خيارات الاسترجاع",
        "retrieval_duration" => "يجب على المشتري الاتصال بك في غضون",
        "shipping_method" => "إعادة الشحن",
        "shipping_methods" => "طرق الشحن",
        "tax_country_id" => "ضريبة المبيعات",
        "tax_price" => "قيمة الضريبة",
        "check" => "الموافقة على الشروط والاحكام",
        "end_order_information" => "تعليمات انهاء الطلب",
        "pics" => "الصور",
        "payment" => "طريقة الدفع",
        "offer_amount" => "قيمة العرض للمنتج الواحد",
        "offer_number" => "الكمية",
        "mazad_price" => "سعر المزاد",
        "package_check_center_id" => "باقات مراكز الفحص",
        "status" => "الحالة",
        "start_date" => "تاريخ البداية",
        "end_date" => "تاريخ الانتهاء",
        "post_number" => "الرقم البريدي",
        "default_address" => "العنوان الافتراضى",
        "balance" => "المبلغ",
        "bank" => "اسم البنك",
        "iban" => "رقم الايبان",
        "moyasar_Key‬" => "Publishable Key",
        "whatsapp" => "واتس اب",

        'center_name' => 'اسم المركز',

        'commercial_image1' => 'صورة السجل',
        'owner_name' => 'اسم المالك',
        'owner_number' => 'رقم الجوال',
        'responsible_center' => 'المسؤول عن المركز',// 1مالك 2 غيره
        'responsible_name' => 'اسم المسؤول',// owner or other
        'responsible_number' => 'رقم جوال المسؤول',// owner or other
        'responsible_image1' => 'صورة من اثبات المسؤول',// owner or other
        'tafwed_type' => 'نزع التفويض',// 1 وكالة 2 مكتب عمل 3 مالك
        'email_confirmation' => 'تأكيد البريد الإلكتروني',

        'center_image1' => 'صورة المركز',
        'center_number_bank' => 'رقم الحساب البنكي للمركز',
        'commercial_number_confirmation' => 'تأكيد رقم السجل التجاري',
        'service' => 'الخدمة الرئيسية',
        'subService' => 'الخدمات',
        'details' => 'التفاصيل',
        'current_password' => 'كلمة المرور القديمة',
        'new_password' => 'كلمة المرور الجديدة',

        'car_image' => 'صورة السيارة',

        'device_token' => 'توكن الجهاز',
        'device_type' => 'نوع التوكن', // 1 for android 2 for ios

        'multi_place' => 'اكثر من موقع', // 0 for no 1 for yes
        'places' => 'الحي',
        'university_drive' => 'توصيل جامعات', // 0 for no 1 for yes
        'employees_drive' => 'توصيل موظفات', // 0 for no 1 for yes
        'driver_id' => 'السائق',
        'nationality_id' => 'الجنسية',
        'age_id' => 'العمر',
        'company_id' => 'الشركة المصنعة',
        'car_model_id' => 'الموديل',
        'city_mode_id' => 'سنةالموديل',
        'passenger_id' => 'عدد الركاب',
        'order_type' => ' نوع الطلب',
        'from_city_id' => ' من مدينة',
        'from_region_id' => ' من حي',
        'deliver_time' => ' نوع التوصيل',
        'from_time' => ' ميعاد الذهاب',
        'to_time' => ' ميعاد العودة',
        'to_school' => 'الى الجامعة',
        'to_region_id' => 'الى الحي',
        'salary' => 'الراتب الشهري',
        'login_code' => 'كود الدخول',
        'ticket_category_id' => 'قسم الدعم',
        'referred_by' => 'كود الاحالة',
        'title_ar' => 'الإسم بالعربية',
        'title_en' => 'الإسم بالانجليزية',
        'avatar' => 'الصورة الشخصية',
        'max_loan' => 'الحد الأقصى للقرض',
        'min_loan' => 'الحد الأدنى للقرض',
        'tax_percent' => 'ضريبة المبيعات',
        'notes' => 'الملاحظات',
        'bank_transfer_file' => 'التحويل البنكي',
        'reply' => 'الرد',
        'active_reason' => 'السبب',
        'user_id_number' => 'رقم الهوية',
        'users' => 'المستخدمين',
        'send_date' => 'تاريخ الإرسال',


        'usernme' => 'إسم المستخدم',
        'password' => 'كلمة المرور',
        'media_type' => 'نوع الوسائط',
        'media_file' => 'ملف الوسائط',
        'ad_title' => 'عنوان الإعلان',
        'short_description' => 'الوصف المختصر',
        'ad_content' => 'محتوى الإعلان',
        'budget_in_sar' => 'الميزانية بالريال',
        'age' => 'العمر',
        'targeted_audiences' => 'الاهتمامات',
        'language' => 'اللغة',
        'media' => 'الوسائط',
        'whatsapp_thumbnail' => 'صورة واتساب',
        'button_text' => 'نص زر النداء التحفيزي',
        'link' => 'الرابط ',
        'campagin_id' => 'الحملة',
        'start_date' => 'تاريخ البداية',
        'gender' => 'النوع',

        'ad_languages' => 'اللغة',
        'country_id' => 'الدولة',
        'ad_targeted_audiences' => 'الاهتمامات',
        'ad_genders' => 'النوع',
        'budget' => 'الميزانية',
        'content' => 'المحتوى',
        'title' => 'العنوان',
        'ad_ages' => 'الفئات العمرية',
        'camp_id' => 'الحملة',
        'payment_method' => 'وسيلة الدفع',
        'payment_number' => 'رقم الدفع',
        'email' => 'البريد الإلكتروني',
        'sender_email' => 'البريد الإلكتروني',
        'sender_name' => 'الإسم بالكامل',
        'password_confirmation ' => 'تأكيد كلمة المرور',
        'type' => 'النوع',
        'line1_ar' => 'السطر الأول بالعربية',
        'line1_en' => 'السطر الأول بالإنجليزية',
        'line2_ar' => 'السطر الثاني بالعربية',
        'line2_en' => 'السطر الثاني بالإنجليزية',
        'line3_ar' => 'السطر الثالث بالعربية',
        'line3_en' => 'السطر الثالث بالإنجليزية',
        'picture' => 'الصورة',
        'button_text_ar' => 'نص الزر بالعربية',
        'button_text_en' => 'نص الزر بالإنجليزية',
        'button_link_ar' => 'رابط الزر بالعربية',
        'button_link_en' => 'رابط الزر بالإنجليزية',
        'publisher_video' => 'فيديو الناشر -الرئيسية',
        'advertiser_video' => 'فيديو المعلن - الرئيسية',
        'google_play' => 'Google Play ',
        'lat' => 'Location latitude',
        'lng' => 'Location longitude',
        'ad_min_budget' => 'أقل ميزانية للإعلان',
        'soldier_ad_click_price' => 'سعر الزيارة للجندي',
        'ad_click_price' => 'سعر الزيارة',
        'ad_click_price_currency' => 'عملة سعر الزيارة',
        'min_ad_view_duration' => 'أقل زمن لإحتساب الزيارة - بالثواني',
        'solider_ad_max_profit' => 'أقصى مكسب للجندي من الإعلان',
        'solider_ad_max_profit_currency' => 'عملة أقصى مكسب للجندي من الإعلان',
        'ad_countries' => 'الدول المستهدفة',
        'ad_cities' => 'المدن',

        'name_ar' => 'الإسم باللغة العربية',
        'name_en' => 'الإسم باللغة الإنجليزية',

        'content_ar' => 'المحتوى بالعربية',
        'content_en' => 'المحتوى بالإنجليزية',
        'image' => 'الصورة',
        'desc_ar' => 'الوصف بالعربية',
        'desc_en' => 'الوصف بالإنجليزية',
        'title_ar' => 'العنوان بالعربية',
        'title_en' => 'العنوان بالإنجليزية',
        'transaction_id' => 'رقم التحويل',
        'minimum_payback_amount' => 'الحد الأدنى لطلب التحويل',
        'instagram' => 'إنستاجرام',
        'start_time' => 'وقت بداية الإعلان',
        'mission_ar' => 'الرسالة بالعربية',
        'mission_en' => 'الرسالة بالإنجليزية',
        'vision_ar' => 'الرؤية بالعربية',
        'vision_en' => 'الرؤية بالإنجليزية',
        'new_password_confirmation' => 'تأكيد كلمة المرور الجديدة',
        'new_password' => 'كلمة المرور الجديدة',
        'user_type' => 'نوع المستخدم',
        'media_files' => 'الوسائط',
        'verification_code' => 'كود التفعيل',
        'number_of_days_will_send_notification_to_solider' => 'كل كام يوم سوف يتم ارسال اشعار للسولجر الذي ليس له بيانات كافية',
        'discount_code' => 'كود الخصم',
        'number_of_times' => 'عدد المرات المتاحة للاستخدام',
        'discount_value' => 'قيمة الخصم',
        'discount_type' => 'نوع الخصم',
        'expire_at' => 'سوف ينتهي في',
        'value' => 'قيمة',
        'discount_percentage' => 'نسبة مئوية',
        'start_at ' => 'تبداء في',
        'selectedRoles' => 'الادوار',
        'permissions' => 'الصلاحيات',
        'name' => 'الاسم',
        'library_visit_price' => 'سعر الزيارة من المكتبة',
        'library_max_profit' => 'اقصي مبلغ يمكن الاستفاده من مشاركة الاعلانات من المكتبة',
        'website_link' => 'رابط الموقع',
        'task' => 'المهمة',
        'solider_whats_app_file' => 'الملف الذي سيرسل الي الجندي',
        'solider_whats_app_message' => 'الرسالة التي سترسل الي الجندي',
        'advertiser_whats_app_message'=> 'الرسالة التي سترسل الي المعلن',
        'advertiser_whats_app_file' => 'الملف الذي سيرسل الي المعلن',
        'created_at' => 'تم التسجيل في',
        'tasks' => 'المهام',
        'description_ar' => 'الوصف باللغة العربية',
        'description_en' => 'الوصف باللغة الانجليزية',
        'phone' => 'رقم الجوال',
        'roles' => 'الادوار',
        'car_brand_id' => 'ماركة السيارة',
        'car_module_id' => 'موديل السيارة',
        'engine_type' => 'نوع المحرك',
        'number_of_kilos_of_oil' => 'عدد كيلوات الزيت',
        'oil_brand_id' => 'ماركة الزيت',
        'opinion' => 'الرأي',
        'manufacturing_year' => 'سنة الصنع',
        'number_of_engine_valves' => 'عدد صممات المحرك',
        'plat_number' => 'أرقام اللوحة',
        'plat_char' => 'حروف اللوحة',
        'fuel_type' => 'نوع الوقود',
        'color' => 'لون السيارة',
        'oil_id'=> 'نوع الزيت',
        'car_id' => 'السيارة',
        'payment_type'=> 'نوع الدفع',
        'appointment' => 'الميعاد',
        'brief_ar' => "الوصف المختصر باللغة العربية",
        'brief_en' => 'الوصف المختصر باللغة الانجليزية',
        'customer_service_number' => 'رقم خدمة العملاء',
        'video_url' => 'رابط الفيديو',
        "first_name" => "الاسم الاول",
        'confirmation_password' => 'تآكيد كلمة المرور',
        "specialty_id" => "التخصص",
        "job_title"=> 'المسمي الوظيفي',
        'about'  => 'نبذه عن',
        "invoke_date" => 'تاريخ اكمال المشروع',
        'period' => 'المدة',
        'withdraw_type' => 'نوع السحب ( بنك ، بيبال ) ',
        "paypal_email" => "ايميل بيبال",
        'bank_name' => "اسم البنك",
        "bank_account"=> "رقم الحساب البنكي",
        "card_name" => "اسم البطاقة",
        "charge_type" => 'نوع الشحن',
        "charge_amount" => 'مبلغ الشحن'
    ],
];
