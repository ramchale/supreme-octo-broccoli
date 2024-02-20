<?php

namespace Service\ViewerCodes;

class CodeGenerator
{
    /**
     * The length of the code.
     */
    public const CODE_LENGTH = 12;

    /**
     * The characters allowed to appear in the code.
     */
    public const ALLOWED_CHARACTERS = '136789BDFGHJKMPQRTVWXY';

    /**
     * Generates a random code of length CODE_LENGTH, using only the characters in ALLOWED_CHARACTERS.
     *
     * @return string
     * @throws \Exception
     */
    public static function generateCode(): string
    {
        $result = '';

        for ($i = 0; $i < self::CODE_LENGTH; $i++) {
            $index   = rand(0, strlen(self::ALLOWED_CHARACTERS) - 1);
            $result .= self::ALLOWED_CHARACTERS[$index];
        }

        return $result;
    }
}
