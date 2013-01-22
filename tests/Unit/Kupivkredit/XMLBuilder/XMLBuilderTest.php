<?php
/**
 * Этот файл является частью библиотеки КупиВкредит.
 *
 * Все права защищены (c) 2012 «Тинькофф Кредитные Системы» Банк (закрытое акционерное общество)
 *
 * Информация о типе распространения данного ПО указана в файле LICENSE,
 * распространяемого вместе с исходным кодом библиотеки.
 *
 * This file is part of the KupiVkredit library.
 *
 * Copyright (c) 2012  «Tinkoff Credit Systems» Bank (closed joint-stock company)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Kupivkredit\XMLBuilder\XMLBuilder;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-21 at 11:40:33.
 */
class XMLBuilderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var XMLBuilder
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new XMLBuilder();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Kupivkredit\XMLBuilder\XMLBuilder::makeXML
     */
    public function testMakeXML()
    {
	    $title    = uniqid();
	    $subtitle = uniqid();

	    $message = array(
			'title' => $title,
		    'content' => array(
			    'subtitle' => $subtitle,
			    'array' => array('a','b','c'),
		    )
	    );

	    $xml = $this->object->makeXML('test', $message);
	    $this->assertInstanceOf('SimpleXMLElement', $xml);

	    $titleXML = $xml->xpath('/test/title[1]');
	    $this->assertEquals($title, (string) $titleXML[0]);

	    $subtitleXML = $xml->xpath('/test/content/subtitle[1]');
	    $this->assertEquals($subtitle, (string) $subtitleXML[0]);

	    $arrayXML = $xml->xpath('/test/content/array[1]');
		$this->assertInternalType('array', $arrayXML);
    }
}