<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'contact-method' => [
        'title' => 'Contact Methods',

        'actions' => [
            'index' => 'Contact Methods',
            'create' => 'New Contact Method',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'disability' => [
        'title' => 'Disabilities',

        'actions' => [
            'index' => 'Disabilities',
            'create' => 'New Disability',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'company' => [
        'title' => 'Companies',

        'actions' => [
            'index' => 'Companies',
            'create' => 'New Company',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'acronym' => 'Acronym',
            
        ],
    ],

    'language' => [
        'title' => 'Languages',

        'actions' => [
            'index' => 'Languages',
            'create' => 'New Language',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'acronym' => 'Acronym',
            
        ],
    ],

    'education-level' => [
        'title' => 'Education Levels',

        'actions' => [
            'index' => 'Education Levels',
            'create' => 'New Education Level',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'call-type' => [
        'title' => 'Call Types',

        'actions' => [
            'index' => 'Call Types',
            'create' => 'New Call Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'position' => [
        'title' => 'Position',

        'actions' => [
            'index' => 'Position',
            'create' => 'New Position',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'acronym' => 'Acronym',
            
        ],
    ],

    'call-table' => [
        'title' => 'Call Table',

        'actions' => [
            'index' => 'Call Table',
            'create' => 'New Call Table',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'call' => [
        'title' => 'Calls',

        'actions' => [
            'index' => 'Calls',
            'create' => 'New Call',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'call_type_id' => 'Call type',
            'position_id' => 'Position',
            'company_id' => 'Company',
            'start' => 'Start',
            'end' => 'End',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];