// const Intl = require('intl');

// class nfLocaleConverter {
var nfLocaleConverter = function(newLocale, thousands_sep, decimal_sep) {

    // constructor(newLocale = 'en-US', thousands_sep, decimal_sep) {
        if ('undefined' !== typeof newLocale && 0 < newLocale.length) {
            this.locale = newLocale.replace('_','-');
        } else {
            this.locale = 'en-US';
        }

        this.thousands_sep = thousands_sep || ',';
        this.decimal_sep = decimal_sep || '.';
    // }

    this.uniqueElememts = function( value, index, self ) {
        return self.indexOf(value) === index;
    }

    this.numberDecoder = function(num) {
        // let thousands_sep = ',';
        var formatted = '';

        // Account for negative numbers.
        var negative = false;
        
        if ( '-' === num.charAt(0)) {
            negative = true;
            num = num.replace( '-', '');
        }
        
        // Account for a space as the thousands separator.
        var nbsp_regex = new RegExp('&nbsp;', 'g');
        num = num.replace( nbsp_regex, ' ');

        // Determine what our existing separators are.
        var myArr = num.split('');
        var separators = myArr.filter(function(el) {
            return el.match(/^((?![0-9]).)*$/s);
          });
          
        var final_separators = separators.filter(this.uniqueElememts);
        
        switch( final_separators.length ) {
            case 0:
                formatted = num;
                break;
            case 1:
                var replacer = '';
                var re = new RegExp(final_separators[0], 'g');

                if('.' === final_separators[0]) {
                    re = new RegExp('[.]','g');
                }
                if ( 1 == separators.length ) {
                    if ( this.thousands_sep != separators[0] && '&nbsp;' !== this.thousands_sep ) {
                        replacer = '.';
                        re = new RegExp('[.]', 'g');
                    } else {
                        var testNum = num.split(final_separators[0]);
                        if(0 < testNum.length && 3 > testNum[1].length) {
                            replacer = '.';
                        }
                    }
                }
               
                formatted = num.replace(re, replacer);
                break;
            case 2:
                var find_one = final_separators[0];
                var re_one;
                if('.' === find_one) {
                    re_one = new RegExp('[.]', 'g');
                } else {
                    re_one = new RegExp(find_one, 'g');
                }
                formatted = num.replace(re_one, '');
                
                var find_two = final_separators[1];
                
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

    this.numberEncoder = function(num) {
        num = this.numberDecoder(num);
        
        return Intl.NumberFormat(this.locale).format(num);
    }
}

// module.exports = nfLocaleConverter;