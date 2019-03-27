const Intl = require('intl');

class nfLocaleConverter {

    constructor(newLocale = 'en-US', thousands_sep, decimal_sep) {
        if (0 < newLocale.length) {
            this.locale = newLocale.replace('_','-');
        } else {
            this.locale = 'en-US';
        }

        this.thousands_sep = thousands_sep || ',';
        this.decimal_sep = decimal_sep || '.';
    }

    uniqueElememts( value, index, self ) {
        return self.indexOf(value) === index;
    }

    numberDecoder(num) {
        // let thousands_sep = ',';
        let formatted = '';

        // Account for negative numbers.
        let negative = false;
        
        if ( '-' === num.charAt(0)) {
            negative = true;
            num = num.replace( '-', '');
        }
        
        // Account for a space as the thousands separator.
        let nbsp_regex = new RegExp('&nbsp;', 'g');
        num = num.replace( nbsp_regex, ' ');

        // Determine what our existing separators are.
        let myArr = num.split('');
        let separators = myArr.filter(function(el) {
            return el.match(/^((?![0-9]).)*$/s);
          });
          
        let final_separators = separators.filter(this.uniqueElememts);
        
        switch( final_separators.length ) {
            case 0:
                formatted = num;
                break;
            case 1:
                let replacer = '';
                let re = new RegExp(final_separators[0], 'g');

                if('.' === final_separators[0]) {
                    re = new RegExp('[.]','g');
                }
                if ( 1 == separators.length ) {
                    if ( this.thousands_sep != separators[0] && '&nbsp;' !== this.thousands_sep ) {
                        replacer = '.';
                        re = new RegExp('[.]', 'g');
                    }
                }
               
                formatted = num.replace(re, replacer);
                break;
            case 2:
                let find_one = final_separators[0];
                var re_one;
                if('.' === find_one) {
                    re_one = new RegExp('[.]', 'g');
                } else {
                    re_one = new RegExp(find_one, 'g');
                }
                formatted = num.replace(re_one, '');
                
                let find_two = final_separators[1];
                
                var re_two;
                if('.' === find_two) {
                    re_two = new RegExp('[.]', 'g');
                } else {
                    re_two = new RegExp(find_two, 'g');
                }
                formatted = formatted.replace(re_two, '.' );
                break;
            default:
            return 'NaN';
        }

        if ( negative ) {
            formatted = '-' + formatted;
        }

        return formatted;
    }

    numberEncoder(num) {
        num = this.numberDecoder(num);
        
        return Intl.NumberFormat(this.locale).format(num);
    }
}


module.exports = nfLocaleConverter;