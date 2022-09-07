<?php
/**
 * Attributes File.
 *
 * @since 2.0.0
 *
 * @package uagb
 */

$button_attribute = UAGB_Block_Helper::uag_generate_border_attribute(
	'btn'
);

return array_merge(
	array(
		'classMigrate'              => false,
		'block_id'                  => '',
		'align'                     => 'center',
		'textAlign'                 => 'center',
		'link'                      => '#',
		'linkTarget'                => false,
		'titleSpace'                => 0,
		'titleSpaceTablet'          => '',
		'titleSpaceUnit'            => 'px',
		'titleSpaceMobile'          => '',
		'vPadding'                  => '',
		'hPadding'                  => '',
		'vPaddingMobile'            => '',
		'hPaddingMobile'            => '',
		'vPaddingTablet'            => '',
		'hPaddingTablet'            => '',
		'paddingType'               => 'px',
		'backgroundType'            => 'color',
		'backgroundColor'           => '',
		'backgroundHoverColor'      => '',
		'gradientColor1'            => '#0170b9',
		'gradientColor2'            => '#06558a',
		'gradientType'              => 'linear',
		'gradientLocation1'         => 0,
		'gradientLocation2'         => 100,
		'gradientAngle'             => 0,
		'backgroundOpacity'         => '',
		'backgroundHoverOpacity'    => '',
		'titleColor'                => '',
		'titleHoverColor'           => '',
		'icon'                      => 'up-right-from-square',
		'iconColor'                 => '',
		'iconHoverColor'            => '',
		'iconPosition'              => 'after',
		'prefixColor'               => '',
		'prefixHoverColor'          => '',
		'iconSpace'                 => 10,
		'iconSpaceTablet'           => '',
		'iconSpaceMobile'           => '',
		'titleLoadGoogleFonts'      => false,
		'titleFontFamily'           => '',
		'titleFontWeight'           => '',
		'titleFontStyle'            => '',
		'titleFontSize'             => 20,
		'titleFontSizeType'         => 'px',
		'titleFontSizeTablet'       => 20,
		'titleFontSizeMobile'       => 20,
		'titleLineHeightType'       => 'em',
		'titleLineHeight'           => '',
		'titleLineHeightTablet'     => '',
		'titleLineHeightMobile'     => '',
		'titleTag'                  => 'span',
		'prefixLoadGoogleFonts'     => false,
		'prefixFontFamily'          => '',
		'prefixFontWeight'          => '',
		'prefixFontStyle'           => '',
		'prefixFontSize'            => 14,
		'prefixFontSizeType'        => 'px',
		'prefixFontSizeTablet'      => 14,
		'prefixFontSizeMobile'      => 14,
		'prefixLineHeightType'      => 'em',
		'prefixLineHeight'          => 2,
		'prefixLineHeightTablet'    => '',
		'prefixLineHeightMobile'    => '',
		'iconFontSize'              => 20,
		'iconFontSizeType'          => 'px',
		'iconFontSizeTablet'        => '',
		'iconFontSizeMobile'        => '',
		'paddingBtnUnit'            => 'px',
		'mobilePaddingBtnUnit'      => 'px',
		'tabletPaddingBtnUnit'      => 'px',
		'titleTransform'            => '',
		'titleDecoration'           => '',
		'prefixTransform'           => '',
		'prefixDecoration'          => '',
		'titleLetterSpacing'        => '',
		'titleLetterSpacingTablet'  => '',
		'titleLetterSpacingMobile'  => '',
		'titleLetterSpacingType'    => 'px',
		'prefixLetterSpacing'       => '',
		'prefixLetterSpacingTablet' => '',
		'prefixLetterSpacingMobile' => '',
		'prefixLetterSpacingType'   => 'px',
		'borderStyle'               => 'solid',
		'borderWidth'               => 1,
		'borderRadius'              => 2,
		'borderColor'               => '',
		'borderHoverColor'          => '',
	),
	$button_attribute
);
