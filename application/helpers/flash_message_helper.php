<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package   CodeIgniter
 * @author    ExpressionEngine Dev Team
 * @copyright Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license   http://codeigniter.com/user_guide/license.html
 * @link      http://codeigniter.com
 * @since     Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------
/**
 * CodeIgniter FlashMessage Helpers
 *
 * Provide helper functions for common flash message operations.
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      wahyu kurniawan (https://github.com/babycodes)
 */
/**
 * Display formatted flash message.
 *
 * @access public
 */
if (!function_exists('getFlashMessage')) {
    function getFlashMessage()
    {
        $CI = get_instance();
        $success  = $CI->session->flashdata('success');
        $error    = $CI->session->flashdata('error');
        if ($success) {
            $notif = $success;
            return $notif;
        } else if ($error) {
            $notif = $error;
            return $notif;
        } else {
            $notif = false;
            return $notif;
        }
    }
}

if (!function_exists('setFlashMessage')) {
    function setFlashMessage($name, $message, $type = 'secondary')
    {
        $CI = get_instance();
        $message = "
		<div class='alert alert-" . $type . "'>
		<button type='button' class='close' data-dismiss='alert'>×</button> <span class='text-capitalize'>" . $message . "</span></div>";
        return $CI->session->set_flashdata($name, $message);
    }
}

