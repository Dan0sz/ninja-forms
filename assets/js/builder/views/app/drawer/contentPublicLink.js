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
            
            var public_link_key = formSettingsDataModel.get('public_link_key');
            if (!public_link_key) return;

            var publicLink = formSettingsDataModel.get('public_link');
            publicLink = publicLink.replace('[FORM_ID]', public_link_key);
            formSettingsDataModel.set('public_link', publicLink);
            
			var allowPublicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'allow_public_link' );
            this.enablePublicLink.show( new itemSettingView( { model: allowPublicLinkSettingModel, dataModel: formSettingsDataModel } ) );

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
