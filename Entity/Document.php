<?php

namespace Toiine\Bundle\CouchbaseBundle\Entity;

/**
 * Represent a Couchbase document.
 */
class Document
{
    /**
     * Key of the document.
     * @var string
     */
    protected $key;

    /**
     * Data of the document
     * @var string
     */
    protected $value;

    public function __construct($key = null, $value = null)
    {
        if (! is_null($key)) {
            $this->key = $key;
        }

        if (! is_null($value)) {
            $this->value = $value;
        }
    }

    /**
     * Get key
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set key
     *
     * @param string $key : key of the document
     *
     * @return self
     *
     * @codeCoverageIgnore
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     *
     * @codeCoverageIgnore
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value : value of the document
     *
     * @return self
     *
     * @codeCoverageIgnore
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
