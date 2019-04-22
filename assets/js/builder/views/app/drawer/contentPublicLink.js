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
            embedForm: '.embed-form',
			enablePublicLink: '.enable-public-link',
            copyPublicLink: '.copy-public-link',
        },

		onRender: function() {
            var formModel = Backbone.Radio.channel('app').request('get:formModel');
            var formSettingsDataModel = nfRadio.channel( 'settings' ).request( 'get:settings' );
            
            console.log(formModel);
            console.log(formModel.get('id'));
            var embedForm = "[ninja-forms id='{FORM_ID}']".replace('{FORM_ID}', formModel.get('id'));
            console.log(embedForm);
            formSettingsDataModel.set('embed_form', embedForm);

            var embedFormSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'embed_form' );
            console.log(embedFormSettingModel);
            console.log(formSettingsDataModel);
            this.embedForm.show( new itemSettingView( { model: embedFormSettingModel, dataModel: formSettingsDataModel } ) );

            var public_link_key = formSettingsDataModel.get('public_link_key');
            if (!public_link_key) return;

            var publicLink = nfAdmin.publicLinkStructure.replace('[FORM_ID]', public_link_key);
            formSettingsDataModel.set('public_link', publicLink);
            
			var allowPublicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'allow_public_link' );
            this.enablePublicLink.show( new itemSettingView( { model: allowPublicLinkSettingModel, dataModel: formSettingsDataModel } ) );

            var publicLinkSettingModel = nfRadio.channel( 'settings' ).request( 'get:settingModel', 'public_link' );
            this.copyPublicLink.show(new itemSettingView( { model: publicLinkSettingModel, dataModel: formSettingsDataModel } ));
        },
        

		events: {
			'click #embed_form + .js-click-copytext': 'copyFormEmbedHandler',
			'click #public_link + .js-click-copytext': 'copyPublicLinkHandler'
		},

		copyFormEmbedHandler: function( e ) {

            document.getElementById('embed_form').select();
            document.execCommand('copy');

            e.target.innerHTML = 'Copied!';
		},

		copyPublicLinkHandler: function( e ) {

            document.getElementById('public_link').select();
            document.execCommand('copy');

            e.target.innerHTML = 'Copied!';
		}
	} );

	return view;
} );
