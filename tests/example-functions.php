<?php

function product($a, $b)
{
    return $a * $b;
}

function quotient(int $a, int $b): int|float
{
    return $a / max($b, 1);
}