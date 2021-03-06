<?php


namespace Imdhemy\Expo\Messages;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Imdhemy\Expo\Contracts\JsonAble;
use Imdhemy\Expo\Contracts\MessageAble;

/**
 * Class Message
 * @package Imdhemy\Expo
 */
class Message implements MessageAble
{
    const PRIORITY_DEFAULT = 'default';
    const PRIORITY_NORMAL = 'normal';
    const PRIORITY_HIGH = 'high';
    const SOUND_DEFAULT = 'default';

    /**
     * @var Collection
     */
    protected $tokens;

    /**
     * @var JsonAble
     */
    protected $data;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var int|null
     */
    protected $timeToLive;

    /**
     * @var int|null
     */
    protected $expiration;

    /**
     * @var string|null
     */
    protected $priority;

    /**
     * @var string|null
     */
    protected $subtitle;

    /**
     * @var  string|null
     */
    protected $sound;

    /**
     * @var int|null
     */
    protected $badge;

    /**
     * @var string|null
     */
    protected $channelId;

    /**
     * Message constructor.
     * @param string $title
     * @param string $body
     */
    public function __construct(string $title, string $body)
    {
        $this->tokens = new ArrayCollection();
        $this->title = $title;
        $this->body = $body;
        $this->data = MessageData::empty();
    }

    /**
     * @return JsonAble
     */
    public function getData(): JsonAble
    {
        return $this->data;
    }

    /**
     * @param JsonAble $data
     * @return Message
     */
    public function setData(JsonAble $data): Message
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Message
     */
    public function setTitle(string $title): Message
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Message
     */
    public function setBody(string $body): Message
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpiration(): ?int
    {
        return $this->expiration;
    }

    /**
     * @param int $expiration
     * @return Message
     */
    public function setExpiration(int $expiration): Message
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return Message
     */
    public function setPriority(string $priority): Message
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return Message
     */
    public function setSubtitle(string $subtitle): Message
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSound(): ?string
    {
        return $this->sound;
    }

    /**
     * @param string $sound
     * @return Message
     */
    public function setSound(string $sound): Message
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBadge(): ?int
    {
        return $this->badge;
    }

    /**
     * @param int $badge
     * @return Message
     */
    public function setBadge(int $badge): Message
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     * @return Message
     */
    public function setChannelId(string $channelId): Message
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * @return array
     */
    public function getTo(): array
    {
        return $this->getTokens()->toArray();
    }

    /**
     * @return Collection
     */
    public function getTokens(): Collection
    {
        return $this->tokens;
    }

    /**
     * @param Collection $tokens
     * @return Message
     */
    public function setTokens(Collection $tokens)
    {
        $this->tokens = $tokens;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTTL(): ?int
    {
        return $this->getTimeToLive();
    }

    /**
     * @return int|null
     */
    public function getTimeToLive(): ?int
    {
        return $this->timeToLive;
    }

    /**
     * @param int|null $timeToLive
     * @return Message
     */
    public function setTimeToLive(?int $timeToLive): Message
    {
        $this->timeToLive = $timeToLive;

        return $this;
    }

    /**
     * @param array $tokens
     * @return Message
     */
    public function addManyPushTokens(array $tokens): Message
    {
        foreach ($tokens as $token) {
            $this->addPushToken($token);
        }

        return $this;
    }

    /**
     * @param string $token
     * @return Message
     */
    public function addPushToken(string $token): Message
    {
        $this->tokens->add($token);

        return $this;
    }
}
