<?php
return [
    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is not found.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values is present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute already exists .',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',

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
            'regex' => 'Password must contain at least one number , one uppercase , one lowercase letters and one special character, without any whitspaces'
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
        'mobile' => 'Mobile start with 5',
        'salary' => 'Salary',
        'type_ads' => 'advertisement duration',
        'user_bank_id' => 'user account',
        'latitude' => 'map',
        'sub_category' => 'sub category',
        'category_id' => 'category',
        'subSub_section' => 'sub category',
        'sub_section' => 'sub category',
        'register_confirm' => 'agree to the terms and conditions',
        'amount' => 'amount',
        'images' => 'images',
        'ads_id' => 'advertisement number',
        'reference_number' => 'reference number',
        'bank_name' => 'bank name',
        'old_password' => 'old password',
        'delivery_type' => ' Delivery type ',
        'user_id' => 'user id',
        'offer' => 'package',
        'subscription_offer' => 'package',
        'special_offer' => 'package',
        'ads_type' => 'ads pay type',
        'ads_user' => 'ads user',
        'comment' => 'comment',
        'rate' => 'rate',
        'ad_id' => 'ad id',
        "g-recaptcha-response" => "captcha",
        'login_code' => 'Login code',
        'ar_title' => 'Arabic title',
        'en_title' => 'English title',
        'ar_content' => 'Arabic content',
        'en_content' => 'English content',
        'max_loan' => 'Maximum loan',
        'min_loan' => 'Minimun loan',
        'active_reason' => 'Reason',

        'usernme' => 'Username',
        'password' => 'Password',
        'media_type' => 'Media type',
        'media_file' => 'Media',
        'ad_title' => 'Ad title',
        'short_description' => 'Short description',
        'ad_content' => 'Ad content',
        'budget_in_sar' => 'Budget in SAR',
        'age' => 'Age',
        'targeted_audiences' => 'Targeted audience',
        'language' => 'Language',
        'media' => 'Media',
        'whatsapp_thumbnail' => 'Whatsapp thumbnail',
        'button_text' => 'Button text',
        'link' => 'Link',
        'campagin_id' => 'Campaign',
        'start_date' => 'Start date',
        'ad_languages' => 'Languages',
        'country_id' => 'Country',
        'ad_targeted_audiences' => 'Targeted audience',
        'ad_genders' => 'Gender',
        'budget' => 'Budget',
        'content' => 'Content',
        'title' => 'Title',
        'ad_ages' => 'Ages',
        'camp_id' => 'Campaign',
        'username' => 'Username',
        'payment_method' => 'Payment method',
        'payment_number' => 'Payment number',
        'email' => 'Email',
        'sender_email' => 'Sender email',
        'sender_name' => 'Sender name',
        'password_confirmation' => 'Password confirmation',
        'targeted_audience' => 'Targeted audience',
        'gender' => 'Gender',
        'type' => 'Type',
        'line1_ar' => 'First line in Arabic',
        'line1_en' => 'First line in English',
        'line2_ar' => 'Second line in Arabic',
        'line2_en' => 'Second line in English',
        'line3_ar' => 'Third line in Arabic',
        'line3_en' => 'Third line in English',
        'picture' => 'Picture',
        'button_text_ar' => 'Button text in Arabic',
        'button_text_en' => 'Button text in English',
        'button_link_ar' => 'Button link in Arabic',
        'button_link_en' => 'Button link in English',
        'publisher_video' => 'Home publisher video',
        'advertiser_video' => 'Home advertiser video',
        'google_play' => 'Google Play ',
        'lat' => 'Location latitude',
        'lng' => 'Location longitude',
        'ad_min_budget' => 'Ad Min Budget',
        'soldier_ad_click_price' => 'Visit Price',
        'ad_click_price' => 'Soldier ad visit Price',
        'ad_click_price_currency' => 'Visit Price Currency',
        'min_ad_view_duration' => 'minimum duration for visit - in seconds',
        'solider_ad_max_profit' => 'Solider ad maximum profit',
        'solider_ad_max_profit_currency' => 'Solider Ad Maximum Profit Currency',
        'ad_countries' => 'Targeted countries',
        'ad_cities' => 'Cities',
        'name_ar' => 'Name in Arabic',
        'name_en' => 'Name in English',

        'description' => 'Description',
        'video_thumbnail' => 'Thumbnail',
        'content_ar' => 'Content in Arabic',
        'content_en' => 'Content in English',
        'image' => 'Image',
        'desc_ar' => 'Description in Arabic',
        'desc_en' => 'Description in English',

        'title_ar' => 'Title in Arabic',
        'title_en' => 'Title in English',
        'transaction_id' => 'Transaction ID',
        'minimum_payback_amount' => 'Minimum payback amount',
        'instagram' => 'Instagram',
        'start_time' => 'Start time',
        'mission_ar' => 'Mission in Arabic',
        'mission_en' => 'Mission in English',
        'vision_ar' => 'Vision in Arabic',
        'vision_en' => 'Vision in English',
        'new_password_confirmation' => 'New password confirmation',
        'new_password' => 'New password',
        'media_files' => 'Media files',
        'user_type' => 'User type',
        'verify_code' => 'Verification code',
        'number_of_days_will_send_notification_to_solider' => 'After how many days will send notification to solider to notify him not enough data ',
        'address' => 'Address',
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'app_store' => 'App store',
        'discount_code' => 'Discount code',
        'number_of_times' => 'Number of times',
        'discount_value' => 'Discount value',
        'discount_type' => 'Discount Type',
        'expire_at' =>'Expire at',
        'discount_percentage' => 'Percentage',
        'value' => 'Value',
        'start_at' => 'Start at',
        'selectedRoles'=> 'roles',
        'permissions' => 'Permissions',
        'name' => 'Name',
        'library_visit_price' => 'Library visit price',
        'library_max_profit' => 'Library max profit',
        'website_link' => 'Website link',
        'task' => 'Task',
        'mobile_number' => 'Mobile',
        'solider_whats_app_file' => 'The file that will be send to solider in whats app',
        'solider_whats_app_message' => 'The message that will be send to solider in whats app',
        'advertiser_whats_app_message'=> 'The message that will be send to advertiser',
        'advertiser_whats_app_file' => 'The file that will be send to advertiser',
        'created_at' => 'Created at',
        'description_ar' => 'Description in arabic',
        'description_en' => 'Description in english',
        'phone' => 'Phone',
        'roles' => 'Roles',
        'car_brand_id' => 'Car brand',
        'car_module_id' => 'Car module',
        'engine_type' => 'Engine type',
        'number_of_kilos_of_oil' => 'Number of kilos of oil',
        'oil_brand_id' => 'Oil brand',
        'opinion' => 'Opinion',
        'manufacturing_year' => 'Manufacturing year',
        'number_of_engine_valves' => 'Number of engine valves',
        'plat_number' => 'Plate numbers',
        'plat_char'  => 'Plate chars',
        'fuel_type' => 'Plate char',
        'color' => 'Car color',
        'oil_id'=> 'Oil',
        'car_id' => 'Car',
        'payment_type'=> 'Payment type',
        'appointment' => 'Appointment',
        'brief_ar' => "Brief in arabic",
        'brief_en' => 'Brief in english',
        'customer_service_number' => 'Customer service number',
        'video_url' => 'Video url'
    ],

];
