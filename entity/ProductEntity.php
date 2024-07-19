<?php 

    class ProductEntity {
        
        protected ?int $idProduct;
        protected string $name;
        protected string $description;
        protected float $price;
        protected int $stock;
        protected ?int $category;
        protected string $image;
        protected string $createdAt;


        

        /**
         * Get the value of idProduct
         *
         * @return ?int
         */
        public function getIdProduct(): ?int
        {
                return $this->idProduct;
        }

        /**
         * Set the value of idProduct
         *
         * @param ?int $idProduct
         *
         * @return self
         */
        public function setIdProduct(?int $idProduct): self
        {
                $this->idProduct = $idProduct;

                return $this;
        }



        /**
         * Get the value of description
         *
         * @return string
         */
        public function getDescription(): string
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @param string $description
         *
         * @return self
         */
        public function setDescription(string $description): self
        {
                $this->description = $description;

                return $this;
        }

       

        /**
         * Get the value of image
         *
         * @return string
         */
        public function getImage(): string
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @param string $image
         *
         * @return self
         */
        public function setImage(string $image): self
        {
                $this->image = $image;

                return $this;
        }

        /**
         * Get the value of createdAt
         *
         * @return string
         */
        public function getCreatedAt(): string
        {
                return $this->createdAt;
        }

        /**
         * Set the value of createdAt
         *
         * @param string $createdAt
         *
         * @return self
         */
        public function setCreatedAt(string $createdAt): self
        {
                $this->createdAt = $createdAt;

                return $this;
        }

       

        /**
         * Get the value of name
         *
         * @return string
         */
        public function getName(): string
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @param string $name
         *
         * @return self
         */
        public function setName(string $name): self
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of category
         *
         * @return ?int
         */
        public function getCategory(): ?int
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @param ?int $category
         *
         * @return self
         */
        public function setCategory(?int $category): self
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of stock
         */ 
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */ 
        public function setStock($stock)
        {
                $this->stock = $stock;

                return $this;
        }

        /**
         * Get the value of price
         *
         * @return float
         */
        public function getPrice(): float
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @param float $price
         *
         * @return self
         */
        public function setPrice(float $price): self
        {
                $this->price = $price;

                return $this;
        }
    }