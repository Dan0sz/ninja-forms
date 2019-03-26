<?php

use PHPUnit\Framework\TestCase;

final class NF_Locale_FormattingTest extends TestCase
{
    public function setUp()
    {
        $this->locale = new NF_MockLocale();
    }

    /*
    |--------------------------------------------------------------------------
    | Decode (Basic)
    |--------------------------------------------------------------------------
    */

    public function testLocaleDecodeZero()
    {
        $case = '0';
        $target = '0';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeInteger()
    {
        $case = '1234';
        $target = '1234';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeNegativeInteger()
    {
        $case = '-1234';
        $target = '-1234';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeNegativeFloat()
    {
        $case = '-1234.56';
        $target = '-1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testBadLocaleDecode()
    {
        $helper = new NF_Locale_Formatting($this->locale);
        $result = $helper->locale_decode_number( '$1,234.56' );
        $this->assertEquals('NaN', $result);
    }

    /*
    |--------------------------------------------------------------------------
    | Encode (Thousands and Decimals)
    |--------------------------------------------------------------------------
    */

    public function testLocaleDecodeWithSpaceThousandsAndCommaDecimal()
    {
        $case = '1 234,56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithNonBreakingSpaceThousandsAndCommaDecimal()
    {
        $case = '1&nbsp;234,56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithCommaThousandsAndPeriodDecimal()
    {
        $case = '1,234.56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithNoThousandsAndPeriodDecimal()
    {
        $case = '1234.56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithPeriodThousandsAndCommaDecimal()
    {
        $case = '1.234,56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithNoThousandsAndCommaDecimal()
    {
        $case = '1234,56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithSpaceThousandsAndPeriodDecimal()
    {
        $case = '1 234.56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithNonBreakingSpaceThousandsAndPeriodDecimal()
    {
        $case = '1&nbsp;234.56';
        $target = '1234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeWithIndianCommaThousandsAndPeriodDecimal()
    {
        $case = '1,23,456.78';
        $target = '123456.78';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeOnlyCommaThousands()
    {
        $this->locale->number_format['thousands_sep'] = ',';
        $case = '123,456';
        $target = '123456';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeOnlyPeriodThousands()
    {
        $this->locale->number_format['thousands_sep'] = '.';
        $case = '123.456';
        $target = '123456';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeOnlySpaceThousands()
    {
        $this->locale->number_format['thousands_sep'] = '&nbsp;';
        $case = '123 456';
        $target = '123456';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    public function testLocaleDecodeOnlyNonBreakingSpaceThousands()
    {
        $this->locale->number_format['thousands_sep'] = '&nbsp;';
        $case = '123&nbsp;456';
        $target = '123456';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_decode_number($case));
    }

    /*
    |--------------------------------------------------------------------------
    | Encode (Basic)
    |--------------------------------------------------------------------------
    */

    public function testLocaleEncodeZero()
    {
        $case = '0';
        $target = '0';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeInteger()
    {
        $case = '1234';
        $target = '1,234';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeNegativeInteger()
    {
        $case = '-1234';
        $target = '-1,234';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeNegativeFloat()
    {
        $case = '-1234.56';
        $target = '-1,234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testBadLocaleEncode()
    {
        $helper = new NF_Locale_Formatting($this->locale);
        $result = $helper->locale_encode_number( '$1,234.56' );
        $this->assertEquals('NaN', $result);
    }

    /*
    |--------------------------------------------------------------------------
    | Encode (Thousands and Decimals)
    |--------------------------------------------------------------------------
    */

    public function testLocaleEncodeWithPeriodThousandsAndCommaDecimal()
    {
        $this->locale->number_format['thousands_sep'] = '.';
        $this->locale->number_format['decimal_point'] = ',';
        $case = '1234.56';
        $target = '1.234,56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeWithCommaThousandsAndPeriodDecimal()
    {
        $this->locale->number_format['thousands_sep'] = ',';
        $this->locale->number_format['decimal_point'] = '.';
        $case = '1234.56';
        $target = '1,234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeWithNonBreakingSpaceThousandsAndCommaDecimal()
    {
        $this->locale->number_format['thousands_sep'] = '&nbsp;';
        $this->locale->number_format['decimal_point'] = ',';
        $case = '1234.56';
        $target = '1&nbsp;234,56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleEncodeWithNonBreakingSpaceThousandsAndPeriodDecimal()
    {
        $this->locale->number_format['thousands_sep'] = '&nbsp;';
        $this->locale->number_format['decimal_point'] = '.';
        $case = '1234.56';
        $target = '1&nbsp;234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    /*
    |--------------------------------------------------------------------------
    | Convert
    |--------------------------------------------------------------------------
    */

    public function testLocaleConvertWesternToFrench()
    {
        $this->locale->number_format['thousands_sep'] = '&nbsp;';
        $this->locale->number_format['decimal_point'] = ',';
        $case = '1,234.56';
        $target = '1&nbsp;234,56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleConvertWesternToGerman()
    {
        $this->locale->number_format['thousands_sep'] = '.';
        $this->locale->number_format['decimal_point'] = ',';
        $case = '1,234.56';
        $target = '1.234,56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleConvertFrenchToGerman()
    {
        $this->locale->number_format['thousands_sep'] = '.';
        $this->locale->number_format['decimal_point'] = ',';
        $case = '1&nbsp;234,56';
        $target = '1.234,56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleConvertFrenchToWestern()
    {
        $this->locale->number_format['thousands_sep'] = ',';
        $this->locale->number_format['decimal_point'] = '.';
        $case = '1&nbsp;234,56';
        $target = '1,234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }

    public function testLocaleConvertGermanToWestern()
    {
        $this->locale->number_format['thousands_sep'] = ',';
        $this->locale->number_format['decimal_point'] = '.';
        $case = '1.234,56';
        $target = '1,234.56';
        $helper = new NF_Locale_Formatting($this->locale);
        $this->assertEquals($target, $helper->locale_encode_number($case));
    }
}