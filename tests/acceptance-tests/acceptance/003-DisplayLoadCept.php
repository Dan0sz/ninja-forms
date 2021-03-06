<?php
$I = new AcceptanceTester( $scenario );

$I->wantTo( 'confirm that form display loads properly' );
// Login to wp-admin
$I->loginAsAdmin();

$I->amOnPage( '/?nf_preview_form=1' );
$I->waitForElementVisible( '.nf-form-content', 30 );
$I->waitForElementVisible( '#nf-field-1', 30 );
$I->waitForElementVisible( '#nf-field-2', 30 );
$I->waitForElementVisible( '#nf-field-3', 30 );
$I->waitForElementVisible( '#nf-field-4', 30 );