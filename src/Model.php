<?php


namespace Kl;


abstract class Model
{

    /**
     * @param string $conversionRule
     * @return array
     */
    public function toArray($conversionRule = 'underscore'): array
    {
        $result = [];
        switch ($conversionRule) {
            case 'camelCase':
                $result = $this->toArrayCamelCase();
                break;
            case 'underscore':
                $result = $this->toArrayUnderscore();
                break;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function toArrayCamelCase(): array
    {
        $result = [];
        $vars = get_object_vars($this);

        foreach ($vars as $field => $value) {
            $newField = preg_replace('/[^a-z0-9]+/i', ' ', $field);
            $newField = trim($newField);
            $newField = ucwords($newField);
            $newField = str_replace(' ', '', $newField);
            $newField = lcfirst($newField);

            $result[$newField] = $value;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function toArrayUnderscore(): array
    {
        $result = [];
        $vars = get_object_vars($this);

        foreach ($vars as $field => $value) {
            $newField = preg_replace('/[^a-z0-9]+/i', ' ', $field);
            $newField = trim($newField);
            $newField = str_replace(' ', '_', $newField);
            $newField = strtolower($newField);
            $result[$newField] = $value;
        }

        return $result;
    }
}
