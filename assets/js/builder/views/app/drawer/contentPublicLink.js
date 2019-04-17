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
			var allowPublicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'allow_public_link' );
			var formSettingsDataModel = nfRadio.channel( 'settings' ).request( 'get:settings' );
            this.enablePublicLink.show( new itemSettingView( { model: allowPublicLinkSettingModel, dataModel: formSettingsDataModel } ) );

            var publicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'public_link' );
            this.copyPublicLink.show(new itemSettingView( { model: publicLinkSettingModel, dataModel: formSettingsDataModel } ));
        },
        

		events: {
			'click .js-copy-public-link': 'copyPublicLinkHandler'
		},

		copyPublicLinkHandler: function( e ) {
            // Make a helper element to hold the form link's string value
            const { value } = document.getElementById('public_link');
            const el = document.createElement('textarea');
            el.value = value;

            // Hide the helper element
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-10000px';

            // Put the helper element on document, and copy its text content
            document.body.appendChild(el);
            el.select();

           // Copy selected text to the clipboard and remove helper element
           document.execCommand('copy');
           document.body.removeChild(el);
		}
	} );

	return view;
} );
