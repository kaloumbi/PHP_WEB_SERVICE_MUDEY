<?php 
    class UserEntity {

        protected ?int $idUser;
        protected ?string $pseudo;
        protected string $email;
        protected ?int $sexe;
        protected ?string $password;
        protected ?string $firstname;
        protected ?string $lastname;
        protected ?string $description;
        protected string $adresse_livraison;
        protected string $adresse_facturation;
        protected string $tel;
        protected DateTime $dateBirth;
        protected string $createdAt;

        




        /**
         * Get the value of email
         *
         * @return string
         */
        public function getEmail(): string
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @param string $email
         *
         * @return self
         */
        public function setEmail(string $email): self
        {
                $this->email = $email;

                return $this;
        }

   



        /**
         * Get the value of firstname
         *
         * @return string
         */
        public function getFirstname(): string
        {
                return $this->firstname;
        }

        /**
         * Set the value of firstname
         *
         * @param string $firstname
         *
         * @return self
         */
        public function setFirstname(?string $firstname): self
        {
                $this->firstname = $firstname;

                return $this;
        }

        /**
         * Get the value of lastname
         *
         * @return string
         */
        public function getLastname(): string
        {
                return $this->lastname;
        }

        /**
         * Set the value of lastname
         *
         * @param string $lastname
         *
         * @return self
         */
        public function setLastname(?string $lastname): self
        {
                $this->lastname = $lastname;

                return $this;
        }

       

        /**
         * Get the value of adresse_livraison
         *
         * @return string
         */
        public function getAdresseLivraison(): string
        {
                return $this->adresse_livraison;
        }

        /**
         * Set the value of adresse_livraison
         *
         * @param string $adresse_livraison
         *
         * @return self
         */
        public function setAdresseLivraison(string $adresse_livraison): self
        {
                $this->adresse_livraison = $adresse_livraison;

                return $this;
        }

        /**
         * Get the value of adresse_facturation
         *
         * @return string
         */
        public function getAdresseFacturation(): string
        {
                return $this->adresse_facturation;
        }

        /**
         * Set the value of adresse_facturation
         *
         * @param string $adresse_facturation
         *
         * @return self
         */
        public function setAdresseFacturation(string $adresse_facturation): self
        {
                $this->adresse_facturation = $adresse_facturation;

                return $this;
        }

        /**
         * Get the value of tel
         *
         * @return string
         */
        public function getTel(): string
        {
                return $this->tel;
        }

        /**
         * Set the value of tel
         *
         * @param string $tel
         *
         * @return self
         */
        public function setTel(string $tel): self
        {
                $this->tel = $tel;

                return $this;
        }


        /**
         * Get the value of idUser
         *
         * @return ?int
         */
        public function getIdUser(): ?int
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @param ?int $idUser
         *
         * @return self
         */
        public function setIdUser(?int $idUser): self
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of sexe
         *
         * @return ?int
         */
        public function getSexe(): ?int
        {
                return $this->sexe;
        }

        /**
         * Set the value of sexe
         *
         * @param ?int $sexe
         *
         * @return self
         */
        public function setSexe(?int $sexe): self
        {
                $this->sexe = $sexe;

                return $this;
        }

        /**
         * Get the value of description
         *
         * @return ?string
         */
        public function getDescription(): ?string
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @param ?string $description
         *
         * @return self
         */
        public function setDescription(?string $description): self
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of dateBirth
         *
         * @return DateTime
         */
        public function getDateBirth(): DateTime
        {
                return $this->dateBirth;
        }

        /**
         * Set the value of dateBirth
         *
         * @param DateTime $dateBirth
         *
         * @return self
         */
        public function setDateBirth(DateTime $dateBirth): self
        {
                $this->dateBirth = $dateBirth;

                return $this;
        }

        /**
         * Get the value of password
         *
         * @return ?string
         */
        public function getPassword(): ?string
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @param ?string $password
         *
         * @return self
         */
        public function setPassword(?string $password): self
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of pseudo
         *
         * @return ?string
         */
        public function getPseudo(): ?string
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @param ?string $pseudo
         *
         * @return self
         */
        public function setPseudo(?string $pseudo): self
        {
                $this->pseudo = $pseudo;

                return $this;
        }
    }