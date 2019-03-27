define( [], function() {
	var view = Marionette.ItemView.extend({
		tagName: 'div',
		template: '#tmpl-nf-field-label',

		initialize: function() {
			// ...
		},

		onRender: function() {
			// Prevent label/input interaction by disassociating the label from the input.
			jQuery(this.$el.find('label')).removeAttr('for');
			return this;
		},
        
		templateHelpers: function () {
	    	return {
	    		renderLabelClasses: function() {
                    // ...
                },
                maybeRenderHelp: function() {
                    // ...
                }
            }
        }

	});

	return view;
} );