<?php
    class CategoryEntity {
        
        /**
         * Identifiant de la category
         */
        protected ?int $idCategory;

        /**
         * Le nom de la category
         */
        protected string $name;

        


        /**
         * Get the value of idCategory
         *
         * @return ?int
         */
        public function getIdCategory(): ?int
        {
                return $this->idCategory;
        }

        /**
         * Set the value of idCategory
         *
         * @param ?int $idCategory
         *
         * @return self
         */
        public function setIdCategory(?int $idCategory): self
        {
                $this->idCategory = $idCategory;

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


        
    }