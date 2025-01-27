..  include:: /Includes.rst.txt

..  _addButton:

=============
Add Button to TCA fields
=============

You will need your own extension or site distribution.

Add the button in your extension's TCA Overrides.

.. code-block:: php
    :caption: Add the button to tt_content header and subheader field

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
    }