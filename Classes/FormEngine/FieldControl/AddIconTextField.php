<?php

declare(strict_types=1);

namespace TRAW\SupHeader\FormEngine\FieldControl;

use TYPO3\CMS\Backend\Form\AbstractNode;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;

class AddIconTextField extends AbstractNode
{
    public function render(): array
    {
        return [
            'iconIdentifier' => 'content-special-html',
            'title' => "LLL:EXT:my_ext/Resources/Private/Language/locallang.xlf:label.form.button",
            'linkAttributes' => [
                'class' => 'sup-header-btn',
                'data-field-name' => $this->data['parameterArray']['itemFormElName'],
                'data-allowed-tags' => 'sup,sub,br,strong',
            ],
            'additionalInlineLanguageLabelFiles' => [
                'EXT:sup_header/Resources/Private/Language/locallang.xlf',
            ],
            'javaScriptModules' => [
                JavaScriptModuleInstruction::create('@traw/sup-header/generate-html.js'),
            ],
        ];
    }
}
