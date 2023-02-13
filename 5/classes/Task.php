<?php

class Task {
    public User $user;
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone;
    
    public function __construct(User $user, string $task) {
        $this->user = $user;
        $this->description = $task;
        $this->dateCreated = new DateTime();
        $this->dateUpdated = new DateTime();
        $this->isDone = false;
        $this->priority = 0;
        return $this;
    }

    /**
     * @return string
     */
    public function getdateCreated(): DateTime
    { 
        return $this->dateCreated;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    { 
        return $this->description;
    }

    /**
     * @param string $description
     * @return Task
     */
    public function setDescription(string $description)
    {
        $this->dateUpdated = new DateTime();
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @return DateTime
     */
    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }

    /**
     * @param DateTime $dateDone
     * @return Task
     */
    public function markAsDone(): Task
    {
        $this->dateUpdated = new DateTime();
        $this->dateDone = new DateTime();
        $this->isDone = true;
        return $this;
    }

    /**
     * @return int
     */
    public function setPriority(?int $priority)
    {
        $this->priority = $priority ?? 0;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getIsDone(): bool {
        return $this->isDone;
    }

}