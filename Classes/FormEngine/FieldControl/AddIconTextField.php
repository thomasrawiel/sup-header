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
    private const disallowdTags = ['script', 'iframe', 'object', 'embed', 'applet', 'form', 'button', 'input', 'link', 'meta', 'style', 'base', 'textarea', 'noscript', 'svg', 'math', 'isindex', 'marquee',];

    /**
     * @return array
     */
    public function render(): array
    {
        $allowedTags = ['sup', 'sub', 'br'];
        $globallyDisallowedTags = self::disallowdTags;

        $event = GeneralUtility::makeInstance(EventDispatcher::class)->dispatch(new AllowedTagsEvent($allowedTags));

        $finalAllowedTags = array_map(function ($tag) use ($globallyDisallowedTags) {
            return !in_array($tag, $globallyDisallowedTags) ? $tag : '';
        }, $event->getAllowedTags());

        $event->setAllowedTags(array_filter($finalAllowedTags));

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
