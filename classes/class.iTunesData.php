<?php
include_once("../traits/trait.Sanitizer.php");
include_once("class.FeedReader.php");

/**
 * Class iTunesData
 * A class to read in data for a supplied URL
 *
 */
class iTunesData
{
    use Sanitizer;

    private $url;

    function __construct($url="http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=10/xml")
    {
         $this->setURL($url); //to be safe

    }

    /**
     * Declare the URL of the object
     * @param $data
     */

    function setURL($data)
    {
        $this->url = $this->cleanURl($data);
    }

    /**
     * Wrapper method that uses FeedReader
     * class to generate XML and then
     * generates an array of top track info.
     */

    function readInData()
    {
        $feedReader = new FeedReader($this->url);
        $data = $feedReader->readInXML();

        $topEntries = array();
        foreach($data->entry as $entry){
            $trackInfo = array();
            $trackTitleInfo = explode("-", $entry->title);
            $trackInfo['title'] = $trackTitleInfo[0];
            $trackInfo['artist'] = $trackTitleInfo[1];
            $trackInfo['link'] = (string)$entry->id;
            $topEntries[] = $trackInfo;
        }

        $this->setTopEntries($topEntries);

    }

    /**
     * Declare the Top Entries array
     * @param $data
     */
    function setTopEntries($data)
    {
        $this->topEntries = $data;
    }


}





