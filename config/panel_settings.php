<?php
return [
    'template' => [

        'general' => [
            'title' => 'General',
            'descriptions' => 'Application general settings.', // (optional)
            'icon' => 'icon-settings', // (optional)
            'class' => 'vs-row flex',
            'children' => [
                [
                    'name' => 'site_name', // unique key for setting
                    'component' => 'vs-input',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Website name', // label for input
                    // optional properties
                    'placeholder' => '', // placeholder for input
                    'wrapper_class' => 'vs-lg-3', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 600, // any default value
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'session_expire_time', // unique key for setting
                    'component' => 'vs-input',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Session expire time (seconds)', // label for input
                    // optional properties
                    'placeholder' => '', // placeholder for input
                    'wrapper_class' => 'vs-lg-3', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 600, // any default value
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'logo', // unique key for setting
                    'component' => 'filepond',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Logo', // label for input
                    // optional properties
                    'placeholder' => '600', // placeholder for input
                    'wrapper_class' => 'vs-lg-3', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 600, // any default value
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'favicon', // unique key for setting
                    'component' => 'filepond',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Favicon', // label for input
                    // optional properties
                    'placeholder' => '600', // placeholder for input
                    'wrapper_class' => 'vs-lg-3', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 600, // any default value
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'copyright_text', // unique key for setting
                    'component' => 'vs-input',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Copyright text', // label for input
                    // optional properties
                    'placeholder' => '', // placeholder for input
                    'wrapper_class' => 'vs-lg-3', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 600, // any default value
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
            ],
        ],
        'vcathlab' => [
            'title' => 'VCathlab',
            'descriptions' => 'Application general settings.', // (optional)
            'icon' => 'icon-settings', // (optional)
            'class' => 'vs-row flex',
            'children' => [
                [
                    'name' => 'intro_video', // unique key for setting
                    'component' => 'filepond',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Intro Video', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],

            ],
        ],
        'about_us' => [
            'title' => 'About Us',
            'descriptions' => 'Application general settings.', // (optional)
            'icon' => 'icon-settings', // (optional)
            'class' => 'vs-row flex',
            'children' => [
                [
                    'name' => 'about_us_content', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Content', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],

            ],
        ],
        'collaboration' => [
            'title' => 'Collaboration',
            'descriptions' => 'Application general settings.', // (optional)
            'icon' => 'icon-settings', // (optional)
            'class' => 'vs-row flex',
            'children' => [
                [
                    'name' => 'collaboration_content', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Content', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],

            ],
        ],
        'products' => [
            'title' => 'Products',
            'descriptions' => 'Application general settings.', // (optional)
            'icon' => 'icon-settings', // (optional)
            'class' => 'vs-row flex',
            'children' => [
                [
                    'name' => 'products_niffr', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Non-invasive FFR', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'products_ctffr', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'CT - FFR', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'products_wallshearstress', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Wall Shear Stress', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'products_imr', // unique key for setting
                    'component' => 'quill-editor',
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Microvascular (IMR)', // label for input
                    'wrapper_class' => 'vs-lg-12', // override global input_wrapper_class
                    'input_class' => '',
                    'label_class' => '',
                    'style' => '', // any inline styles
                    // 'rules' => 'required|min:2|max:20', // validation rules for this input
                    // 'hint' => 'You can set the app name here' // help block text for input
                ],
            ],
        ],
    ]
];
