<?php
declare(strict_types=1);

namespace Models;

use Core;

class User extends Core\AbstractModel
{
    /**
     * User's form attributes as a const's.
     */
    private const FIRSTNAME_KEY = 'firstname';
    private const LASTNAME_KEY = 'lastname';
    private const EMAIL_KEY = 'email';
    private const PHONE_KEY = 'phone';
    private const PASSWORD_KEY = 'password';


    /**
     * Defines User's data.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * Returns user's firstname.
     *
     * @return mixed
     */
    public function getFirstName(): mixed
    {
        return $this->getData(self::FIRSTNAME_KEY);
    }

    /**
     * Adds user's firstname.
     *
     * @param  string $value
     * @return        $this
     */
    public function setFirstName(string $value): self
    {
        return $this->setData(self::FIRSTNAME_KEY, $value);
    }

    /**
     * Returns user's lastname.
     *
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->getData(self::LASTNAME_KEY);
    }

    /**
     * Adds user's lastname.
     *
     * @param  string $value
     * @return        $this
     */
    public function setLastName(string $value): self
    {
        return $this->setData(self::LASTNAME_KEY, $value);
    }

    /**
     * Returns user's email.
     *
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->getData(self::EMAIL_KEY);
    }

    /**
     * Adds user's email.
     *
     * @param  string $value
     * @return        $this
     */
    public function setEmail(string $value): self
    {
        return $this->setData(self::EMAIL_KEY, $value);
    }

    /**
     * Returns user's phone.
     *
     * @return mixed
     */
    public function getPhone(): mixed
    {
        return $this->getData(self::PHONE_KEY);
    }

    /**
     * Adds user's phone.
     *
     * @param  string $value
     * @return        $this
     */
    public function setPhone(string $value): self
    {
        return $this->setData(self::PHONE_KEY, $value);
    }

    /**
     * Returns user's password.
     *
     * @return mixed
     */
    public function getPassword(): mixed
    {
        return $this->getData(self::PASSWORD_KEY);
    }

    /**
     * Adds user's password.
     *
     * @param  string $value
     * @return        $this
     */
    public function setPassword(string $value): self
    {
        return $this->setData(self::PASSWORD_KEY, $value);
    }

    /**
     * Returns user save status.
     *
     * @return bool
     */
    public function save(): bool
    {
        $this->_beforeSave();
        $sql = "INSERT INTO users (firstname, lastname, email, phone, password)
            VALUES (:firstname, :lastname, :email, :phone, :password)";

        try {
            $firstname = $this->getData(self::FIRSTNAME_KEY);
            $lastname = $this->getData(self::LASTNAME_KEY);
            $email = $this->getData(self::EMAIL_KEY);
            $phone = $this->getData(self::PHONE_KEY);
            $password = $this->getData(self::PASSWORD_KEY);
            $conn = $this->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            // TODO: add logger
            echo 'Error: ' . $e->getMessage();
        }
        $this->_afterSave();

        return false;
    }

    /**
     * load user data by given email.
     *
     * @return array
     */
    public function load(): array
    {
        $userData = [];
        $this->_beforeLoad();
        try {
            $conn = $this->getConnection();
            $email = $this->getData(self::EMAIL_KEY);
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :username");
            $stmt->bindParam(':username', $email);
            $stmt->execute();

            $userData = $stmt->fetch(\PDO::FETCH_ASSOC) ?: [];
        } catch (\PDOException $e) {
            // TODO: add logger
        }
        $this->_afterLoad();

        return $userData;
    }

    /**
     * Returns true in case when all validation rules were met.
     * Returns false in another case.
     *
     * @return bool
     */
    public function validate(): bool
    {
        /**
         * TODO:
         * add validation rules here:
         * 1. not empty values
         * 2. email verification via standards
         * 3. cell phone verification
         */
        return true;
    }

    /**
     * Do something before user is loaded.
     *
     * @return void
     */
    private function _beforeLoad(): void
    {
        // TODO: do something before user was loaded.
    }

    /**
     * Do something after user is loaded.
     *
     * @return void
     */
    private function _afterLoad(): void
    {
        // TODO: do something after user was loaded.
    }

    /**
     * Do something before user is saved.
     *
     * @return void
     */
    private function _beforeSave(): void
    {
        // wrap logic into try-catch
        // for successfully execution of save() method
        try {
            $pwd = $this->getData(self::PASSWORD_KEY);
            $cryptPwd = password_hash($pwd, PASSWORD_BCRYPT);
            $this->setData(self::PASSWORD_KEY, $cryptPwd);
        } catch (\Exception $e) {
            // TODO: add logger
        }
    }

    /**
     * Do something after user is saved.
     *
     * @return void
     */
    private function _afterSave(): void
    {
        // TODO: do something after user was saved.
    }
}
