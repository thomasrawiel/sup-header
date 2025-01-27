<?php
declare(strict_types=1);

namespace TRAW\SupHeader\Events;

/**
 * Class AllowedTagsEvent
 * @package TRAW\SupHeader\Events
 */
final class AllowedTagsEvent
{
    /**
     * @var array
     */
    protected $allowedTags;

    /**
     * @param array $allowedTags
     */
    public function __construct(array $allowedTags) {
        $this->allowedTags = $allowedTags;
    }

    /**
     * @return array
     */
    public function getAllowedTags() {
        return $this->allowedTags;
    }

    /**
     * @param array $allowedTags
     *
     * @return void
     */
    public function setAllowedTags(array $allowedTags): void
    {
        $this->allowedTags = $allowedTags;
    }

    /**
     * @param $tag
     *
     * @return void
     */
    public function addAllowedTag($tag) {
        $this->allowedTags[] = $tag;
    }

    /**
     * @param $tag
     *
     * @return void
     */
    public function removeAllowedTag($tag) {
        $key = array_search($tag, $this->allowedTags, true);
        if ($key !== false) {
            unset($this->allowedTags[$key]);
        }
    }

    /**
     * @return string
     */
    public function __toString() {
        return implode(',', $this->allowedTags);
    }
}