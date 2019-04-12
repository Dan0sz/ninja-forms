/**
 * Changes collection view.
 *
 * @package Ninja Forms builder
 * @subpackage App
 * @copyright (c) 2015 WP Ninjas
 * @since 3.0
 */
define( ['views/app/drawer/itemSetting'], function( itemSettingView) {
	var view = Marionette.LayoutView.extend( {
		tagName: 'div',
        template: '#tmpl-nf-drawer-content-public-link',
        
		regions: {
			enablePublicLink: '.enable-public-link',
			copyPublicLink: '.copy-public-link',
		},

		onRender: function() {
			var addSubmitSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'allow_public_link' );
			var dataModel = nfRadio.channel( 'settings' ).request( 'get:settings' );
			this.enablePublicLink.show( new itemSettingView( { model: addSubmitSettingModel, dataModel: dataModel } ) );
		},
	} );

	return view;
} );
