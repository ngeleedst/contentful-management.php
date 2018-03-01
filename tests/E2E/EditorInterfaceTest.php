<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */
declare(strict_types=1);

namespace Contentful\Tests\Management\E2E;

use Contentful\Tests\Management\BaseTestCase;

class EditorInterfaceTest extends BaseTestCase
{
    /**
     * @vcr e2e_editor_interface_get_update.json
     */
    public function testGetUpdate()
    {
        $client = $this->getDefaultClient();

        $editorInterface = $client->editorInterface->get('bookmark');

        $control = $editorInterface->getControl('name');
        $this->assertSame('name', $control->getFieldId());
        $this->assertSame('singleLine', $control->getWidgetId());
        $this->assertSame([], $control->getSettings());

        $control = $editorInterface->getControl('website');
        $this->assertSame('website', $control->getFieldId());
        $this->assertSame('singleLine', $control->getWidgetId());
        $this->assertSame([], $control->getSettings());
        $control->setWidgetId('urlEditor');

        $control = $editorInterface->getControl('rating');
        $this->assertSame('rating', $control->getFieldId());
        $this->assertSame('numberEditor', $control->getWidgetId());
        $this->assertSame([], $control->getSettings());
        $control->setWidgetId('rating');
        $control->setSettings(['stars' => 5]);

        try {
            $control = $editorInterface->getControl('invalidControl');
        } catch (\Exception $exception) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
            $this->assertSame('Trying to access unavailable control "invalidControl".', $exception->getMessage());
        }

        $editorInterface->update();

        $controls = $editorInterface->getControls();

        $control = $controls[0];
        $this->assertSame('name', $control->getFieldId());
        $this->assertSame('singleLine', $control->getWidgetId());
        $this->assertSame([], $control->getSettings());

        $control = $controls[1];
        $this->assertSame('website', $control->getFieldId());
        $this->assertSame('urlEditor', $control->getWidgetId());
        $this->assertSame([], $control->getSettings());
        $control->setWidgetId('singleLine');

        $control = $controls[2];
        $this->assertSame('rating', $control->getFieldId());
        $this->assertSame('rating', $control->getWidgetId());
        $this->assertSame(['stars' => 5], $control->getSettings());
        $control->setWidgetId('numberEditor');
        $control->setSettings([]);

        $editorInterface->update();
    }
}
