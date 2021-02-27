<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;

class CreatesComposerJsonTest extends JsonTestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateValidComposerJsonFile()
    {
        $moduleName = 'SandBox';
        $composer   = new ComposerJson();        
        $jsonfile   = $composer->module($moduleName)->create();

        $this->assertIsJsonFile($jsonfile);
        $this->assertIsJsonObject($composer);
        $this->assertContentHasParsed($jsonfile);
    }
}
