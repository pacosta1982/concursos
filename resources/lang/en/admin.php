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

    'disengagement-reason' => [
        'title' => 'Disengagement Reasons',

        'actions' => [
            'index' => 'Disengagement Reasons',
            'create' => 'New Disengagement Reason',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'language-level' => [
        'title' => 'Language Levels',

        'actions' => [
            'index' => 'Language Levels',
            'create' => 'New Language Level',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'ethnic-group' => [
        'title' => 'Ethnic Groups',

        'actions' => [
            'index' => 'Ethnic Groups',
            'create' => 'New Ethnic Group',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'requirement-type' => [
        'title' => 'Requirement Types',

        'actions' => [
            'index' => 'Requirement Types',
            'create' => 'New Requirement Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'requirement' => [
        'title' => 'Requirements',

        'actions' => [
            'index' => 'Requirements',
            'create' => 'New Requirement',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'position_id' => 'Position',
            'requirement_type_id' => 'Requirement type',
            'education_level_id' => 'Education level',
            'name' => 'Name',
            
        ],
    ],

    'resume' => [
        'title' => 'Resumes',

        'actions' => [
            'index' => 'Resumes',
            'create' => 'New Resume',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'names' => 'Names',
            'last_names' => 'Last names',
            'government_id' => 'Government',
            'birthdate' => 'Birthdate',
            'gender' => 'Gender',
            'nationality' => 'Nationality',
            'address' => 'Address',
            'neighborhood' => 'Neighborhood',
            'phone' => 'Phone',
            'email' => 'Email',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];