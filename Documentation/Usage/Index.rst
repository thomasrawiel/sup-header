..  include:: /Includes.rst.txt

..  _usage:

=============
Usage
=============

Usage example with TYPO3 Fluid Styled Content.

The following code is just an example. If you wish to use it, it should be placed inside your own extension or site distribution.

.. contents::

Add the button to the header field
----------

.. code-block::
    :caption: Configuration/TCA/Overrides/tt_content.php

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

Add a typoscript setting
----------

.. code-block:: typoscript
    :caption: constants.typoscript

    plugin.tx_myext {
        settings {
            allowedHeaderTags = <sub><sup><br>
        }
    }

.. code-block:: typoscript
    :caption: setup.typoscript

    lib.contentElement {
        settings {
            allowedHeaderTags = {$plugin.tx_myext.settings.allowedHeaderTags}
        }
    }

Allow the tags to be rendered by Fluid
----------

When we have the setting in typoscript, we can access it in fluid and pass it to the stripTags ViewHelper

.. code-block:: html
    <f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags>


Example: Override header partial
----------



.. code-block:: html
    :caption: Resources/Private/Partials/Header/Header.html

    <html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers" data-namespace-typo3-fluid="true">
    <f:if condition="{header}">
        <f:switch expression="{layout}">
            <f:case value="1">
                <h1 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>
                </h1>
            </f:case>
            <f:case value="2">
                <h2 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>            </h2>
            </f:case>
            <f:case value="3">
                <h3 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>            </h3>
            </f:case>
            <f:case value="4">
                <h4 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>            </h4>
            </f:case>
            <f:case value="5">
                <h5 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>            </h5>
            </f:case>
            <f:case value="6">
                <h6 class="{positionClass}">
                    <f:link.typolink parameter="{link}"><f:format.stripTags allowedTags="{settings.allowedHeaderTags}">{header}</f:format.stripTags></f:link.typolink>            </h6>
            </f:case>
            <f:case value="100">
                <f:comment> -- do not show header -- </f:comment>
            </f:case>
            <f:defaultCase>
                <f:if condition="{default}">
                    <f:render partial="Header/Header" arguments="{
                        header: header,
                        layout: default,
                        positionClass: positionClass,
                        link: link}" />
                </f:if>
            </f:defaultCase>
        </f:switch>
    </f:if>
    </html>







