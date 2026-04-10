<?php

declare(strict_types=1);

namespace TRAW\SupHeader\Events;

/**
 * Class AllowedTagsEvent
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
    public function __construct(array $allowedTags)
    {
        $this->allowedTags = $allowedTags;
    }

    /**
     * @return array
     */
    public function getAllowedTags(): array
    {
        return $this->allowedTags;
    }

    /**
     * @param array $allowedTags
     */
    public function setAllowedTags(array $allowedTags): void
    {
        $this->allowedTags = $allowedTags;
    }

    /**
     * @param $tag
     */
    public function addAllowedTag(string $tag)
    {
        $this->allowedTags[] = $tag;
    }

    /**
     * @param $tag
     */
    public function removeAllowedTag(string $tag)
    {
        $key = array_search($tag, $this->allowedTags, true);
        if ($key !== false) {
            unset($this->allowedTags[$key]);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(',', $this->allowedTags);
    }
}
