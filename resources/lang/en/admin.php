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

    'academic-state' => [
        'title' => 'Academic States',

        'actions' => [
            'index' => 'Academic States',
            'create' => 'New Academic State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'academic-training' => [
        'title' => 'Academic Training',

        'actions' => [
            'index' => 'Academic Training',
            'create' => 'New Academic Training',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'resume_id' => 'Resume',
            'education_level_id' => 'Education level',
            'academic_state_id' => 'Academic state',
            'name' => 'Name',
            'institution' => 'Institution',
            'registered' => 'Registered',
            
        ],
    ],

    'language-level-resume' => [
        'title' => 'Language Level Resumes',

        'actions' => [
            'index' => 'Language Level Resumes',
            'create' => 'New Language Level Resume',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'resume_id' => 'Resume',
            'language_id' => 'Language',
            'language_level_id' => 'Language level',
            'certificate' => 'Certificate',
            
        ],
    ],

    'end-reason' => [
        'title' => 'End Reason',

        'actions' => [
            'index' => 'End Reason',
            'create' => 'New End Reason',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'work-experience' => [
        'title' => 'Work Experience',

        'actions' => [
            'index' => 'Work Experience',
            'create' => 'New Work Experience',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'resume_id' => 'Resume',
            'company' => 'Company',
            'position' => 'Position',
            'tasks' => 'Tasks',
            'start' => 'Start',
            'end' => 'End',
            'end_reason_id' => 'End reason',
            'contact' => 'Contact',
            
        ],
    ],

    'application' => [
        'title' => 'Applications',

        'actions' => [
            'index' => 'Applications',
            'create' => 'New Application',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'call_id' => 'Call',
            'resume_id' => 'Resume',
            'data' => 'Data',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];