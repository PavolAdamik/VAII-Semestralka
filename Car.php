<?php

class Car
{
    /**
     * @param int $spz
     * @param int $id_category
     * @param string|null $image
     * @param string|null $name
     * @param int $min_price
     * @param int $max_price
     * @param string|null $detail_image1
     * @param string|null $detail_image2
     * @param string|null $detail_image3
     * @param bool $isRent
     * @param int $year
     * @param string|null $type
     */
    public function __construct(private ?string $spz=null, private int $id_category=0, private ?string $image = null, private ?string $name = null, private int $min_price = 0, private int $max_price = 0, private ?string $detail_image1 = null, private ?string $detail_image2 = null, private ?string $detail_image3 = null, private bool $isRent = false, private int $year = 0, private ?string $type = null)
    {
    }

    /**
     * @return int
     */
    public function getSPZ(): string
    {
        return $this->spz;
    }

    /**
     * @param int $spz
     */
    public function setSPZ(int $spz): void
    {
        $this->spz = $spz;
    }

    /**
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    /**
     * @param int $id_category
     */
    public function setIdCategory(int $id_category): void
    {
        $this->id_category = $id_category;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMinPrice(): int
    {
        return $this->min_price;
    }

    /**
     * @param int $min_price
     */
    public function setMinPrice(int $min_price): void
    {
        $this->min_price = $min_price;
    }

    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->max_price;
    }

    /**
     * @param int $max_price
     */
    public function setMaxPrice(int $max_price): void
    {
        $this->max_price = $max_price;
    }

    /**
     * @return string|null
     */
    public function getDetailImage1(): ?string
    {
        return $this->detail_image1;
    }

    /**
     * @param string|null $detail_image1
     */
    public function setDetailImage1(?string $detail_image1): void
    {
        $this->detail_image1 = $detail_image1;
    }

    /**
     * @return string|null
     */
    public function getDetailImage2(): ?string
    {
        return $this->detail_image2;
    }

    /**
     * @param string|null $detail_image2
     */
    public function setDetailImage2(?string $detail_image2): void
    {
        $this->detail_image2 = $detail_image2;
    }

    /**
     * @return string|null
     */
    public function getDetailImage3(): ?string
    {
        return $this->detail_image3;
    }

    /**
     * @param string|null $detail_image3
     */
    public function setDetailImage3(?string $detail_image3): void
    {
        $this->detail_image3 = $detail_image3;
    }

    /**
     * @return bool
     */
    public function isRent(): bool
    {
        return $this->isRent;
    }

    public function isChecked(): ?string
    {
        $pom = null;
        if($this->isRent) {
            $pom = 'checked';
        } else {
            $pom = '';
        }
        return $pom;
    }

    /**
     * @param bool $isRent
     */
    public function setIsRent(bool $isRent): void
    {
        $this->isRent = $isRent;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }


}