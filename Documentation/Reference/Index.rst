..  include:: /Includes.rst.txt

..  _events:

=============
PSR-14 events
=============

.. contents::


AllowedTagsEvent
===========

The AllowedTagsEvent is responsible for the final list of allowed html tags that will appear in the dropdown.

.. confval:: $allowedTags
    :type: array
    :required: true
    :name: events-allowedTags

    The event holds an array with the allowed html tags

.. _allowedTagsEventFunctions:
AllowedTagEvent Functions
----------

.. confval:: addAllowedTag(string $tag)
    :type: string
    :required: true
    :name: events-add

    Add a single tag to the list of allowed html tags

    .. code-block:: php
        $event->addAllowedTag('abbr');


.. confval:: removeAllowedTag(string $tag)
    :type: string
    :required: true
    :name: events-add

    Remove a single tag to the list of allowed html tags

    .. code-block:: php
        $event->removeAllowedTag('abbr');

.. confval:: setAllowedTags(array $allowedTags)
    :type: array
    :required: true
    :name: events-set

    Set the full list of allowed tags, overrides the default list

    .. code-block:: php
        $event->setAllowedTags(['sup', 'abbr', 'strong']);

.. confval:: getAllowedTags()
    :name: events-get

    Get the full list of allowed tags

    .. code-block:: php
         $list = $event->getAllowedTags();

.. confval:: __toString()
    :name: events-string

    Get the full list as a comma-separated string

    .. code-block:: php
        $listString = (string)$event;
        //or
        $listString = $event->__toString();



LabelFileEvent
===========

The LabelFileEvent is responsible for the available labels in the `TYPO3.lang` variable

.. confval:: $labelFiles
    :type: array
    :required: true
    :name: events-labelfiles

    The event holds an array with references to language label files (xliff), e.g. `EXT:my_ext/Resources/Private/Language/locallang.xlf`

.. _labelFileEventFunctions:

LabelFileEvent Functions
----------

.. confval:: getLabelFiles()
    :name: events-getlabel

    Get an array of language label files

    .. code-block:: php
        $event->getLabelFiles();

.. confval:: setLabelFiles(array $labelFiles)
    :name: events-setlabels

    Set an array of language label files

    .. code-block:: php
        $event->setLabelFiles([
            'EXT:my_ext/Resources/Private/Language/locallang.xlf',
            'EXT:my_ext/Resources/Private/Language/my_other_locallang.xlf',
        ]);

.. confval:: addLabelFile(string $labelFile)
    :name: events-addlabel
    :type: string
    :required: true

    Add a single language label file

    .. code-block:: php
        $event->addLabelFile('EXT:my_ext/Resources/Private/Language/locallang.xlf');

.. confval:: removeLabelFile(string $labelFile)
    :name: events-removelabel
    :type: string
    :required: true

    Remove a single language label file

    .. code-block:: php
        $event->removeLabelFile('EXT:sup_header/Resources/Private/Language/locallang.xlf');

    .. note::
        If you remove all label files, the dropdown will still display the tags followed by their respective html notation



