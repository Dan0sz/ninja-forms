<?php
$I = new AcceptanceTester( $scenario );

// Login to wp-admin
$I->loginAsAdmin();

$I->wantTo( 'see the Dev Mode notice in Advanced Settings' );
$I->amOnPage( '/wp-admin/admin.php?page=ninja-forms&form_id=1' );
$I->waitForText( 'Advanced' );
$I->click( 'Advanced' );

$I->waitForText( 'Display Settings' );
$I->waitForText( 'Restrictions' );
try{
    $I->waitForText( 'Calculations' );
}catch(Exception $e){
    $I->waitForText( 'For more technical features, enable Developer Mode.' );
}

