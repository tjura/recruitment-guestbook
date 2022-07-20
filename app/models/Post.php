<?php

namespace app\models;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Contracts\Service\Attribute\Required;

#[Entity]
#[Table(name: 'post')]
class Post
{
    #[Id()]
    #[GeneratedValue()]
    #[Required()]
    #[Column(type: Types::INTEGER, unique: true)]
    private int $id;
    #[Column(length: 255)]
    #[Required()]
    private string $username;
    #[Column(length: 255)]
    private string $content;
    #[Column(name: 'created_at', type: Types::STRING)]
    private string $createdAt;

    public function __construct()
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

}
