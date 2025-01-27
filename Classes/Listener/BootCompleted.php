<?php
declare(strict_types=1);

namespace TRAW\SupHeader\Listener;

use TRAW\SupHeader\Events\LabelFileEvent;
use TYPO3\CMS\Core\Core\Event\BootCompletedEvent;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class BootCompleted
 */
final class BootCompleted
{
    /**
     * @param BootCompletedEvent $event
     *
     * @return void
     * @throws \Exception
     */
    public function __invoke(BootCompletedEvent $event): void
    {
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);

        $labelFiles = ['EXT:sup_header/Resources/Private/Language/locallang.xlf'];

        $event = GeneralUtility::makeInstance(EventDispatcher::class)->dispatch(new LabelFileEvent($labelFiles));

        if ($pageRenderer->getApplicationType() === 'BE') {
            foreach ($event->getLabelFiles() as $labelFile) {
                $pageRenderer->addInlineLanguageLabelFile($labelFile);
            }
        }
    }
}