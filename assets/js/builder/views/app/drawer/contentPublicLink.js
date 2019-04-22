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
            var formModel = Backbone.Radio.channel('app').request('get:formModel');
            var formSettingsDataModel = nfRadio.channel( 'settings' ).request( 'get:settings' );

            var allowPublicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'allow_public_link' );
            this.enablePublicLink.show( new itemSettingView( { model: allowPublicLinkSettingModel, dataModel: formSettingsDataModel } ) );
            
            var public_link_key = formSettingsDataModel.get('public_link_key');
            
            /**
             * Generate a public link key which is follows the format:
             * Form Id + 4 consecutive base 36 numbers
             */
            if (!public_link_key) {
                var public_link_key = formModel.get('id');
                for (var i = 0; i < 4; i++) {
                    var char = Math.random().toString(36).slice(-1);
                    public_link_key += char;
                };
                // Apply the public link key to form settings
                formSettingsDataModel.set('public_link_key', public_link_key);
            }

            // apply public link url to settings (ending with key)
            var publicLink = formSettingsDataModel.get('public_link');
            publicLink = publicLink.replace('[FORM_ID]', public_link_key);
            formSettingsDataModel.set('public_link', publicLink);
            
            // Display public link
            var publicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'public_link' );
            this.copyPublicLink.show(new itemSettingView( { model: publicLinkSettingModel, dataModel: formSettingsDataModel } ));
        },

		events: {
			'click .js-copy-public-link': 'copyPublicLinkHandler'
		},

		copyPublicLinkHandler: function( e ) {

            document.getElementById('public_link').select();
            document.execCommand('copy');

            e.target.innerHTML = 'Copied!';
		}
	} );

	return view;
} );
