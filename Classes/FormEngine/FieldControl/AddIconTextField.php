<?php

declare(strict_types=1);

namespace TRAW\SupHeader\FormEngine\FieldControl;

use TYPO3\CMS\Backend\Form\AbstractNode;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;

class AddIconTextField extends AbstractNode
{
    public function render(): array
    {
//        if(!$GLOBALS['BE_USER']->check('custom_options', 'tx_supheader_features:enable_supbutton_header')) {
//            return [];
//        }
        return [
            'iconIdentifier' => 'actions-header',
            'title' => "Add html",
            'linkAttributes' => [
                'class' => 'sup-header-btn',
            ],
//            'javaScriptModules' => [
//                JavaScriptModuleInstruction::create('@autodudes/ai-suite/metadata/generate-suggestions.js')
//            ],
        ];
    }
}
