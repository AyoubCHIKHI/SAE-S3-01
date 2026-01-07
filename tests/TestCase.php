<?php

namespace Tests;

class TestCase {
    protected $passedCount = 0;
    protected $failedCount = 0;
    protected $failures = [];

    public function assertEquals($expected, $actual, $message = '') {
        if ($expected === $actual) {
            $this->passedCount++;
        } else {
            $this->failedCount++;
            $this->failures[] = "Échec : $message (Attendu : " . var_export($expected, true) . ", Obtenu : " . var_export($actual, true) . ")";
        }
    }

    public function assertTrue($condition, $message = '') {
        if ($condition === true) {
            $this->passedCount++;
        } else {
            $this->failedCount++;
            $this->failures[] = "Échec : $message (Attendu true, obtenu false)";
        }
    }

    public function getSummary() {
        return [
            'passed' => $this->passedCount,
            'failed' => $this->failedCount,
            'failures' => $this->failures
        ];
    }
}
