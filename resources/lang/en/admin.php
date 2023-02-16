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

    'workflow' => [
        'title' => 'Workflows',

        'actions' => [
            'index' => 'Workflows',
            'create' => 'New Workflow',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'workflow-state' => [
        'title' => 'Workflow States',

        'actions' => [
            'index' => 'Workflow States',
            'create' => 'New Workflow State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'workflow_id' => 'Workflow',
            'isactive' => 'Isactive',
            
        ],
    ],

    'task' => [
        'title' => 'Tasks',

        'actions' => [
            'index' => 'Tasks',
            'create' => 'New Task',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'NroExpS' => 'NroExpS',
            'name' => 'Name',
            'last_name' => 'Last name',
            'government_id' => 'Government',
            'state_id' => 'State',
            'city_id' => 'City',
            'farm' => 'Farm',
            'account' => 'Account',
            'amount' => 'Amount',
            'workflow_state_id' => 'Workflow state',
            
        ],
    ],

    'workflow-navigation' => [
        'title' => 'Workflow Navigation',

        'actions' => [
            'index' => 'Workflow Navigation',
            'create' => 'New Workflow Navigation',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'workflow_state_id' => 'Workflow state',
            'next_workflow_state_id' => 'Next workflow state',
            
        ],
    ],

    'application-status' => [
        'title' => 'Application Statuses',

        'actions' => [
            'index' => 'Application Statuses',
            'create' => 'New Application Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'task_id' => 'Task',
            'status_id' => 'Status',
            'user' => 'User',
            'description' => 'Description',
            
        ],
    ],

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

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'percentage' => 'Percentage',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];