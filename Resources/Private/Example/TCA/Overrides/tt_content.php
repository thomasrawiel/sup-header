<?php

defined('TYPO3') or die('Access denied.');

if(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('sup_header')) {
    $GLOBALS['TCA']['tt_content']['columns']['header']['config'] = array_merge_recursive(
        $GLOBALS['TCA']['tt_content']['columns']['header']['config'],
        [
            'fieldControl' => [
                'importControl' => [
                    'renderType' => 'addIconTextField',
                ],
            ],
        ]
    );
    $GLOBALS['TCA']['tt_content']['columns']['subheader']['config'] = array_merge_recursive(
        $GLOBALS['TCA']['tt_content']['columns']['subheader']['config'],
        [
            'fieldControl' => [
                'importControl' => [
                    'renderType' => 'addIconTextField',
                ],
            ],
        ]
    );
    $GLOBALS['TCA']['tx_news_domain_model_news']['columns']['title']['config'] = array_merge_recursive(
        $GLOBALS['TCA']['tx_news_domain_model_news']['columns']['title']['config'],
        [
            'fieldControl' => [
                'importControl' => [
                    'renderType' => 'addIconTextField',
                ],
            ],
        ]
    );
    $GLOBALS['TCA']['tx_news_domain_model_news']['columns']['teaser']['config'] = array_merge_recursive(
        $GLOBALS['TCA']['tx_news_domain_model_news']['columns']['teaser']['config'],
        [
            'fieldControl' => [
                'importControl' => [
                    'renderType' => 'addIconTextField',
                ],
            ],
        ]
    );
}