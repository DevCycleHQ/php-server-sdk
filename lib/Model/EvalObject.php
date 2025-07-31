<?php

namespace DevCycle\Model;

class EvalObject implements \JsonSerializable
{
    private string $reason;
    private string $details;
    private ?string $target_id;

    public function __construct(string $reason, string $details, ?string $target_id = null)
    {
        $this->reason = $reason;
        $this->details = $details;
        $this->target_id = $target_id;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    public function getTargetId(): ?string
    {
        return $this->target_id;
    }

    public function jsonSerialize(): array
    {
        return [
            'reason' => $this->reason,
            'details' => $this->details,
            'target_id' => $this->target_id
        ];
    }
}