/**
 * Renders an application menu item from a domain model.
 *
 * @package Ninja Forms builder
 * @subpackage App
 * @copyright (c) 2015 WP Ninjas
 * @since 3.0
 */
define( [], function() {
	var view = Marionette.ItemView.extend({
		tagName: 'div',
		template: '#tmpl-nf-field-input',

		initialize: function() {
			this.template = '#tmpl-nf-field-' + this.model.get('type');
			
			console.log( '<REALISTIC FIELD VIEW INIT>' );
			console.log( this );
			console.log( this.model );
			console.log( this.model.get('type') );
			console.log( this.template );
			console.log( '</REALISTIC FIELD VIEW INIT>' );
		},

		onRender: function() {
			// ...
		},

		events: {
			'mouseover .nf-realistic-field': 'onMouseover'
		},

		onMouseover: function( e ) {
			console.log(this.model);
        },
        
		templateHelpers: function () {
	    	return {
	    		renderClasses: function() {
	    			// ...
                },
                renderPlaceholder: function() {
                    if('undefined' == typeof this.placeholder) return;
					return 'placeholder="' + jQuery.trim( this.placeholder ) + '"';
                },
                maybeDisabled: function() {
                    if('undefined' == typeof this.disable_input) return;
                    if(!this.disable_input) return;
                    return 'disabled="disabled"';
                },
                maybeRequired: function() {
					// ...
				},
				maybeInputLimit: function() {
					// ...
				},
				maybeDisableAutocomplete: function() {
					// ..
				}
            }
        }

	});

	return view;
} );