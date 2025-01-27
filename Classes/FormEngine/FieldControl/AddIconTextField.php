<?php
declare(strict_types=1);

namespace TRAW\SupHeader\FormEngine\FieldControl;

use TRAW\SupHeader\Events\AllowedTagsEvent;
use TYPO3\CMS\Backend\Form\AbstractNode;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class AddIconTextField
 */
final class AddIconTextField extends AbstractNode
{
    /**
     * @return array
     */
    public function render(): array
    {
        $allowedTags = ['sup', 'sub', 'br'];

        $event = GeneralUtility::makeInstance(EventDispatcher::class)->dispatch(new AllowedTagsEvent($allowedTags));

        return [
            'iconIdentifier' => 'tx-sup-header-btn',
            'title' => "LLL:EXT:sup_header/Resources/Private/Language/locallang.xlf:label.form.button",
            'linkAttributes' => [
                'class' => 'sup-header-btn',
                'data-field-name' => $this->data['parameterArray']['itemFormElName'],
                'data-allowed-tags' => (string)$event,
            ],
            'javaScriptModules' => [
                JavaScriptModuleInstruction::create('@traw/sup-header/generate-html.js'),
            ],
        ];
    }
}
