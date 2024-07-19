<?php
    class OrdersEntity {
        
        protected ?int $idOrder;
        protected ?int $idUser;
        protected ?int $idProduct;
        protected int $quantity;
        protected float $price;
        protected DateTime $createdAt;

        

        /**
         * Get the value of idOrder
         *
         * @return ?int
         */
        public function getIdOrder(): ?int
        {
                return $this->idOrder;
        }

        /**
         * Set the value of idOrder
         *
         * @param ?int $idOrder
         *
         * @return self
         */
        public function setIdOrder(?int $idOrder): self
        {
                $this->idOrder = $idOrder;

                return $this;
        }

        /**
         * Get the value of idUser
         *
         * @return int
         */
        public function getIdUser(): int
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @param int $idUser
         *
         * @return self
         */
        public function setIdUser(?int $idUser): self
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of idProduct
         *
         * @return int
         */
        public function getIdProduct(): int
        {
                return $this->idProduct;
        }

        /**
         * Set the value of idProduct
         *
         * @param int $idProduct
         *
         * @return self
         */
        public function setIdProduct(?int $idProduct): self
        {
                $this->idProduct = $idProduct;

                return $this;
        }

        /**
         * Get the value of quantity
         *
         * @return int
         */
        public function getQuantity(): int
        {
                return $this->quantity;
        }

        /**
         * Set the value of quantity
         *
         * @param int $quantity
         *
         * @return self
         */
        public function setQuantity(int $quantity): self
        {
                $this->quantity = $quantity;

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

        


        /**
         * Get the value of createdAt
         *
         * @return DateTime
         */
        public function getCreatedAt(): DateTime
        {
                return $this->createdAt;
        }

        /**
         * Set the value of createdAt
         *
         * @param DateTime $createdAt
         *
         * @return self
         */
        public function setCreatedAt(DateTime $createdAt): self
        {
                $this->createdAt = $createdAt;

                return $this;
        }
}