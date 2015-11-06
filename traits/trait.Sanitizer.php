<?php


/**
 * Trait Sanitizer
 * A collection of methods that can be used across
 * the app to maintain clean data
 */
trait Sanitizer
{

    /**
     * Pass a URL through the
     * native URL Sanitizer method
     * @param $url
     * @return mixed
     */

    public function cleanURL($url)
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }

}