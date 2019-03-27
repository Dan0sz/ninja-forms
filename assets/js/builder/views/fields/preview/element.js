define( [], function() {
	var view = Marionette.ItemView.extend({
		tagName: 'div',
		template: '#tmpl-nf-field-input',

		initialize: function() {

			var type = this.model.get('type');

			if('phone' == type) type = 'tel';
			if('spam' == type) type = 'input';
			if('confirm' == type) type = 'input';
			if('quantity' == type) type = 'number';
			if('liststate' == type) type = 'listselect';
			if('listcountry' == type) type = 'listselect';
			if('listmultiselect' == type) type = 'listselect';

			this.template = '#tmpl-nf-field-' + type;
		},

		onRender: function() {
			// ...
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
				},
				maybeChecked: function() {
					// ...
				},
				renderOptions: function() {
					// ...
				},
				renderOtherAttributes: function() {
					// ...
				},
				renderProduct: function() {
					// ...
				},
				renderNumberDefault: function() {
					// ...
				},
				renderCurrencyFormatting: function() {
					// ...
				},
				renderRatings: function() {
					// ...
				}
            }
        }

	});

	return view;
} );