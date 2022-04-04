<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'author' => [
        'title'          => 'Author',
        'title_singular' => 'Author',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'email'                 => 'Email',
            'email_helper'          => ' ',
            'desc'                  => 'Desc',
            'desc_helper'           => ' ',
            'pass'                  => 'Pass',
            'pass_helper'           => ' ',
            'yesno'                 => 'Yesno',
            'yesno_helper'          => ' ',
            'multiplechoice'        => 'Multiplechoice',
            'multiplechoice_helper' => ' ',
            'switch'                => 'Switch',
            'switch_helper'         => ' ',
            'counter'               => 'Counter',
            'counter_helper'        => ' ',
            'bignum'                => 'Bignum',
            'bignum_helper'         => ' ',
            'budget'                => 'Budget',
            'budget_helper'         => ' ',
            'birthday'              => 'Birthday',
            'birthday_helper'       => ' ',
            'birthtime'             => 'Birthtime',
            'birthtime_helper'      => ' ',
            'alarm'                 => 'Alarm',
            'alarm_helper'          => ' ',
            'simplefile'            => 'Simplefile',
            'simplefile_helper'     => ' ',
            'profilepic'            => 'Profilepic',
            'profilepic_helper'     => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'book' => [
        'title'          => 'Book',
        'title_singular' => 'Book',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'author'            => 'Author',
            'author_helper'     => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];