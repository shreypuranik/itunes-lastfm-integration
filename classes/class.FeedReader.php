<?php

/**
 * Loose wrapper class that will
 * read feed URLs in and return XML/JSON data
 * as appropriate.
 *
 * Class FeedReader
 */
class FeedReader
{

    /**
     * Upon Instantiation,
     * the URL variable is declared
     * @param $url
     */
    function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Return a SimpleXMLElement based
     * on the URL variable that was declared
     * in the constructor
     * @return SimpleXMLElement
     */

    function readInXML()
    {
        $xml = simplexml_load_file($this->url);
        return $xml;
    }





}