<?php

namespace JMS\TranslationBundle\Translation;

/**
 * Contain logic of handling of metadata in translation files.
 * Class MetadataMaster
 * @package Telekom\SiteReportBundle\Command\Translation
 */
class MetadataMaster
{
    /**
     * @param array $data
     * @return string
     */
    static function createMetadata($data = array())
    {
        $json = json_encode($data);
        $metadata = sprintf("# @metadata: %s", $json);

        return $metadata;
    }

    /**
     * It's alias of createMetadata()
     * to more intuitive code reading.
     *
     * @param array $data
     * @return string
     */
    static function updateMetadata($data = array())
    {
        return self::createMetadata($data);
    }

    /**
     * @param $metadata
     * @param $tags
     * @return array
     */
    static public function addTags($metadata, $tags)
    {
        $metadata['tags'] = array_unique(array_merge($metadata['tags'], $tags));

        return $metadata;
    }

    /**
     * @param $str
     * @return array
     */
    static function convertToArray($str)
    {
        $metadataStr = str_replace('# @metadata: ', '', $str);

        return json_decode($metadataStr, true);
    }

    /**
     * @param $str
     * @return bool
     */
    static public function isMetadata($str)
    {
        return preg_match('/# @metadata: /i', $str) ? true : false;
    }
}