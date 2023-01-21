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

    ]
];
