<?php

function nf_get_settings(){
  $settings = apply_filters( "ninja_forms_settings", get_option( "ninja_forms_settings" ) );

  $settings['date_format'] = isset ( $settings['date_format'] ) ? $settings['date_format'] : 'd/m/Y';
  $settings['currency_symbol'] = isset ( $settings['currency_symbol'] ) ? $settings['currency_symbol'] : '$';
  $settings['req_div_label'] = isset ( $settings['req_div_label'] ) ? $settings['req_div_label'] : __( 'Fields marked with a * are required', 'ninja-forms' );
  $settings['req_field_symbol'] = isset ( $settings['req_field_symbol'] ) ? $settings['req_field_symbol'] : '<strong>*</strong>';
  $settings['req_error_label'] = isset ( $settings['req_error_label'] ) ? $settings['req_error_label'] : __( 'Please ensure all required fields are completed.', 'ninja-forms' );
  $settings['req_field_error'] = isset ( $settings['req_field_error'] ) ? $settings['req_field_error'] : __( 'This is a required field', 'ninja-forms' );
  $settings['spam_error'] = isset ( $settings['spam_error'] ) ? $settings['spam_error'] : __( 'Please answer the anti-spam question correctly.', 'ninja-forms' );
  $settings['honeypot_error'] = isset ( $settings['honeypot_error'] ) ? $settings['honeypot_error'] : __( 'Please leave the spam field blank.', 'ninja-forms' );
  $settings['timed_submit_error'] = isset ( $settings['timed_submit_error'] ) ? $settings['timed_submit_error'] : __( 'Please wait to submit the form.', 'ninja-forms' );
  $settings['javascript_error'] = isset ( $settings['javascript_error'] ) ? $settings['javascript_error'] : __( 'You cannot submit the form without Javascript enabled.', 'ninja-forms' );
  $settings['invalid_email'] = isset ( $settings['invalid_email'] ) ? $settings['invalid_email'] : __( 'Please enter a valid email address.', 'ninja-forms' );
  $settings['process_label'] = isset ( $settings['process_label'] ) ? $settings['process_label'] : __( 'Processing', 'ninja-forms' );
  $settings['login_link'] = isset ( $settings['login_link'] ) ? $settings['login_link'] : '';
  $settings['username_label'] = isset ( $settings['username_label'] ) ? $settings['username_label'] : '';
  $settings['reset_password'] = isset ( $settings['reset_password'] ) ? $settings['reset_password'] : '';
  $settings['password_label'] = isset ( $settings['password_label'] ) ? $settings['password_label'] : '';
  $settings['repassword_label'] = isset ( $settings['repassword_label'] ) ? $settings['repassword_label'] : '';
  $settings['password_mismatch'] = isset ( $settings['password_mismatch'] ) ? $settings['password_mismatch'] : '';
  $settings['login_button_label'] = isset ( $settings['login_button_label'] ) ? $settings['login_button_label'] : '';
  $settings['cancel_button_label'] = isset ( $settings['cancel_button_label'] ) ? $settings['cancel_button_label'] : '';
  $settings['login_error'] = isset ( $settings['login_error'] ) ? $settings['login_error'] : '';
  $settings['register_link'] = isset ( $settings['register_link'] ) ? $settings['register_link'] : '';
  $settings['email_label'] = isset ( $settings['email_label'] ) ? $settings['email_label'] : '';
  $settings['register_button_label'] = isset ( $settings['register_button_label'] ) ? $settings['register_button_label'] : '';
  $settings['register_error'] = isset ( $settings['register_error'] ) ? $settings['register_error'] : '';
  $settings['register_spam_q'] = isset ( $settings['register_spam_q'] ) ? $settings['register_spam_q'] : '';
  $settings['register_spam_a'] = isset ( $settings['register_spam_a'] ) ? $settings['register_spam_a'] : '';
  $settings['register_spam_error'] = isset ( $settings['register_spam_error'] ) ? $settings['register_spam_error'] : '';


  $settings['date_format']           = apply_filters( 'ninja_forms_labels/date_format'           , $settings['date_format'] );
  $settings['currency_symbol']       = apply_filters( 'ninja_forms_labels/currency_symbol'       , $settings['currency_symbol'] );
  $settings['req_div_label']         = apply_filters( 'ninja_forms_labels/req_div_label'         , $settings['req_div_label'] );
  $settings['req_field_symbol']      = apply_filters( 'ninja_forms_labels/req_field_symbol'      , $settings['req_field_symbol'] );
  $settings['req_error_label']       = apply_filters( 'ninja_forms_labels/req_error_label'       , $settings['req_error_label'] );
  $settings['req_field_error']       = apply_filters( 'ninja_forms_labels/req_field_error'       , $settings['req_field_error'] );
  $settings['spam_error']            = apply_filters( 'ninja_forms_labels/spam_error'            , $settings['spam_error'] );
  $settings['honeypot_error']        = apply_filters( 'ninja_forms_labels/honeypot_error'        , $settings['honeypot_error'] );
  $settings['timed_submit_error']    = apply_filters( 'ninja_forms_labels/timed_submit_error'    , $settings['timed_submit_error'] );
  $settings['javascript_error']      = apply_filters( 'ninja_forms_labels/javascript_error'      , $settings['javascript_error'] );
  $settings['invalid_email']         = apply_filters( 'ninja_forms_labels/invalid_email'         , $settings['invalid_email'] );
  $settings['process_label']         = apply_filters( 'ninja_forms_labels/process_label'         , $settings['process_label'] );
  $settings['login_link']            = apply_filters( 'ninja_forms_labels/login_link'            , $settings['login_link'] );
  $settings['username_label']        = apply_filters( 'ninja_forms_labels/username_label'        , $settings['username_label'] );
  $settings['reset_password']        = apply_filters( 'ninja_forms_labels/reset_password'        , $settings['reset_password'] );
  $settings['password_label']        = apply_filters( 'ninja_forms_labels/password_label'        , $settings['password_label'] );
  $settings['repassword_label']      = apply_filters( 'ninja_forms_labels/repassword_label'      , $settings['repassword_label'] );
  $settings['password_mismatch']     = apply_filters( 'ninja_forms_labels/password_mismatch'     , $settings['password_mismatch'] );
  $settings['login_button_label']    = apply_filters( 'ninja_forms_labels/login_button_label'    , $settings['login_button_label'] );
  $settings['cancel_button_label']   = apply_filters( 'ninja_forms_labels/cancel_button_label'   , $settings['cancel_button_label'] );
  $settings['login_error']           = apply_filters( 'ninja_forms_labels/login_error'           , $settings['login_error'] );
  $settings['register_link']         = apply_filters( 'ninja_forms_labels/register_link'         , $settings['register_link'] );
  $settings['email_label']           = apply_filters( 'ninja_forms_labels/email_label'           , $settings['email_label'] );
  $settings['register_button_label'] = apply_filters( 'ninja_forms_labels/register_button_label' , $settings['register_button_label'] );
  $settings['register_error']        = apply_filters( 'ninja_forms_labels/register_error'        , $settings['register_error'] );
  $settings['register_spam_q']       = apply_filters( 'ninja_forms_labels/register_spam_q'       , $settings['register_spam_q'] );
  $settings['register_spam_a']       = apply_filters( 'ninja_forms_labels/register_spam_a'       , $settings['register_spam_a'] );
  $settings['register_spam_error']   = apply_filters( 'ninja_forms_labels/register_spam_error'   , $settings['register_spam_error'] );

  return $settings;
} // nf_get_settings