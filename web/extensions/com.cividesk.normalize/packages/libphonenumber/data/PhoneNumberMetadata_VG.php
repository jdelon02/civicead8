<?php
/**
 * This file is automatically @generated by {@link BuildMetadataPHPFromXml}.
 * Please don't modify it directly.
 */


return array (
  'generalDesc' => 
  array (
    'NationalNumberPattern' => '[2589]\\d{9}',
    'PossibleNumberPattern' => '\\d{7}(?:\\d{3})?',
  ),
  'fixedLine' => 
  array (
    'NationalNumberPattern' => '
          284(?:
            (?:
              229|
              4(?:
                22|
                9[45]
              )|
              774|
              8(?:
                52|
                6[459]
              )
            )\\d{4}|
            496[0-5]\\d{3}
          )
        ',
    'PossibleNumberPattern' => '\\d{7}(?:\\d{3})?',
    'ExampleNumber' => '2842291234',
  ),
  'mobile' => 
  array (
    'NationalNumberPattern' => '
          284(?:
            (?:
              3(?:
                0[0-3]|
                4[0-367]
              )|
              4(?:
                4[0-6]|
                68|
                99
              )|
              54[0-57]
            )\\d{4}|
            496[6-9]\\d{3}
          )
        ',
    'PossibleNumberPattern' => '\\d{10}',
    'ExampleNumber' => '2843001234',
  ),
  'tollFree' => 
  array (
    'NationalNumberPattern' => '
          8(?:
            00|
            44|
            55|
            66|
            77|
            88
          )[2-9]\\d{6}
        ',
    'PossibleNumberPattern' => '\\d{10}',
    'ExampleNumber' => '8002345678',
  ),
  'premiumRate' => 
  array (
    'NationalNumberPattern' => '900[2-9]\\d{6}',
    'PossibleNumberPattern' => '\\d{10}',
    'ExampleNumber' => '9002345678',
  ),
  'sharedCost' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'personalNumber' => 
  array (
    'NationalNumberPattern' => '
          5(?:
            00|
            33|
            44
          )[2-9]\\d{6}
        ',
    'PossibleNumberPattern' => '\\d{10}',
    'ExampleNumber' => '5002345678',
  ),
  'voip' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'pager' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'uan' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'emergency' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'voicemail' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'shortCode' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'standardRate' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'carrierSpecific' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'noInternationalDialling' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'id' => 'VG',
  'countryCode' => 1,
  'internationalPrefix' => '011',
  'nationalPrefix' => '1',
  'nationalPrefixForParsing' => '1',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => 
  array (
  ),
  'intlNumberFormat' => 
  array (
  ),
  'mainCountryForCode' => false,
  'leadingDigits' => '284',
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
);
/* EOF */