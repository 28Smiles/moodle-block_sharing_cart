<?php

// @codeCoverageIgnoreStart
defined('MOODLE_INTERNAL') || die();
// @codeCoverageIgnoreEnd

$functions = [
    'block_sharing_cart_backup_course_module_into_sharing_cart' => [
        'classname' => \block_sharing_cart\external\backup\course_module_into_sharing_cart::class,
        'methodname' => 'execute',
        'description' => 'Takes a course module id and creates a sharing cart backup. Returns the item placeholder sharing cart item',
        'type' => 'write',
        'ajax' => true,
        'capabilities' => ''
    ],
    'block_sharing_cart_backup_section_into_sharing_cart' => [
        'classname' => \block_sharing_cart\external\backup\section_into_sharing_cart::class,
        'methodname' => 'execute',
        'description' => 'Takes a section id and creates a sharing cart backup. Returns the item placeholder sharing cart item',
        'type' => 'write',
        'ajax' => true,
        'capabilities' => ''
    ],
    'block_sharing_cart_backup_course_into_sharing_cart' => [
        'classname' => \block_sharing_cart\external\backup\course_into_sharing_cart::class,
        'methodname' => 'execute',
        'description' => 'Takes a course id and creates a sharing cart backup. Returns the item placeholder sharing cart item',
        'type' => 'write',
        'ajax' => true,
        'capabilities' => ''
    ],
];
