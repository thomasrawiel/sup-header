..  include:: /Includes.rst.txt

..  _addOwnTags:

=============
Add your own tags
=============

Here's an example how to add a `abbr` html tag, remove the `br` tag and change the default label of the `sup` tag

..  figure:: /_Images/example1.jpg
    :alt: The resulting dropdown after the example code has been added

The resulting dropdown after the example code has been added

..  contents::

Add or remove tags
-----------

To add your own tags, you will need to create an `EventListener <https://docs.typo3.org/permalink/thomasrawiel/sup-header:events>`_ that listens to the `AllowedTagsEvent`

.. code-block:: php
    :caption: EventListener to change the available tags

    <?php

    namespace MyVendor\MyExt\EventListener;

    use TRAW\SupHeader\Events\AllowedTagsEvent;

    class MyTagsEventListener
    {
        public function __invoke(AllowedTagsEvent $event)
        {
            //add a single html tag
            $event->addAllowedTag('abbr');

            //remove a single html tag
            $event->removeAllowedTag('br');
        }
    }

.. note::
    If you add a tag but don't add a label for that tag, the dropdown will display the tag name followed by the html notation
    e.g. `abbr <abbr>`

.. note::
    If you add a label, the dropdown will display the label followed by the html notation
    e.g. `Abbreviation <abbr>`

Add or change labels
-----------

If you want to add a label for your tag or change the default labels, add another EventListener that listens to the `LabelFileEvent`

.. code-block:: php
    :caption: EventListener to add and change labels

    <?php

    namespace MyVendor\MyExt\EventListener;

    use TRAW\SupHeader\Events\LabelFileEvent;

    class MyLabelsEventListener
    {
        public function __invoke(LabelFileEvent $event)
        {
            $event->addLabelFile('EXT:my_ext/Resources/Private/Language/mylabels.xlf');
        }
    }

.. code-block:: xml
    :caption: The corresponding label addLabelFile

    <?xml version="1.0" encoding="utf-8" standalone="yes"?>
    <xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
        <file source-language="en" datatype="plaintext" original="EXT:myext/Resources/Private/Language/locallang.xlf"
              date="2025-01-26T20:22:32Z" product-name="sup_header">
            <header/>
            <body>
                <trans-unit id="supheader.label.sup" resname="supheader.label.sup">
                    <source>Custom text</source>
                </trans-unit>
                <trans-unit id="supheader.label.abbr" resname="supheader.label.abbr">
                    <source>Abbreviation</source>
                </trans-unit>
            </body>
        </file>
    </xliff>

`TYPO3 docs - Events <https://docs.typo3.org/permalink/t3coreapi:extension-development-events>`_


