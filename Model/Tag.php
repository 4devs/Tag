<?php

namespace FDevs\Tag\Model;

use FDevs\Locale\LocaleTextInterface;
use FDevs\Locale\Model\LocaleText;
use Doctrine\Common\Collections\ArrayCollection;
use FDevs\Locale\Util\CollectionLocale;
use FDevs\Tag\TagInterface;

class Tag implements TagInterface
{
    /** @var string */
    protected $id;

    /** @var LocaleText[]|ArrayCollection */
    protected $name;

    /** @var LocaleText[]|ArrayCollection */
    protected $description;

    /** @var  string */
    protected $slug;

    /** @var string */
    protected $type;

    /**
     * init.
     */
    public function __construct()
    {
        $this->name = new ArrayCollection();
        $this->description = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ArrayCollection|LocaleText[]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param ArrayCollection|LocaleText[] $nameList
     *
     * @return $this
     */
    public function setName(array $nameList)
    {
        foreach ($nameList as $name) {
            $this->addName($name);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addName(LocaleTextInterface $text)
    {
        CollectionLocale::addLocaleToCollection($this->name, $text);

        return $this;
    }

    /**
     * @return ArrayCollection|\FDevs\Locale\Model\LocaleText[]
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param ArrayCollection|\FDevs\Locale\Model\LocaleText[] $description
     *
     * @return self
     */
    public function setDescription(array $description)
    {
        foreach ($description as $desc) {
            $this->addDescription($desc);
        }

        return $this;
    }

    public function addDescription(LocaleTextInterface $text)
    {
        CollectionLocale::addLocaleToCollection($this->description, $text);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * Remove name.
     *
     * @param LocaleTextInterface $name
     */
    public function removeName(LocaleTextInterface $name)
    {
        $this->name->removeElement($name);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
