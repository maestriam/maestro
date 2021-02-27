<?php
namespace Maestriam\Maestro\Entities\Resources;

use Maestriam\Maestro\Entities\Source;

class BlankView extends Source
{
    protected string $template = 'view.blank';

    public function name(string $name) : self
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * 
     *
     * @return string
     */
    protected function getFilename(): string
    {
        return $this->name . '.blade.php';
    }

    protected function getArguments(): array
    {
        return [
            'module' => $this->module,
        ];
    }
}