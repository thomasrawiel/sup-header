<?php
declare(strict_types=1);

namespace TRAW\SupHeader\Events;

/**
 * Class LabelFileEvent
 */
final class LabelFileEvent
{
    /**
     * @var array
     */
    protected array $labelFiles;

    /**
     * @param array $labelFiles
     */
    public function __construct(array $labelFiles)
    {
        $this->labelFiles = $labelFiles;
    }

    /**
     * @return array
     */
    public function getLabelFiles(): array
    {
        return $this->labelFiles;
    }

    /**
     * @param array $labelFiles
     *
     * @return void
     */
    public function setLabelFiles(array $labelFiles): void
    {
        $this->labelFiles = $labelFiles;
    }

    /**
     * @param string $labelFile
     *
     * @return void
     */
    public function addLabelFile(string $labelFile): void
    {
        $this->labelFiles[] = $labelFile;
    }

    /**
     * @param string $labelFile
     *
     * @return void
     */
    public function removeLabelFile(string $labelFile): void
    {
        $key = array_search($tag, $this->labelFiles, true);
        if ($key !== false) {
            unset($this->labelFiles[$key]);
        }
    }
}