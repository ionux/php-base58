<?php
/******************************************************************************
 * This file is part of the php-base58 project. You can always find the latest
 * version of this class and project at: https://github.com/ionux/php-base58
 *
 * Copyright (c) 2015 Rich Morgan, rich@bitpay.com
 *
 * The MIT License (MIT)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ******************************************************************************/

/**
 * Base-58 value encoding/decoding class.  This encoding
 * type is specifically used for Bitcoin-related tasks.
 *
 * @author Rich Morgan <rich@bitpay.com>
 */
final class Base58
{
    /**
     * @var string
     */
    private $b58_chars = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    /**
     * Public constructor method.
     */
    public function __construct()
    {
        bcscale(0);
    }

   /**
     * Encodes a hex value to Base-58
     *
     * @param  string     $hex
     * @return string     $return
     * @throws \Exception
     */
    public function encode($hex)
    {
        $this->paramsCheck(array($hex));

        try {

            if (strlen($hex) % 2 != 0) {
                throw new \Exception('Error in Base58::encode(): Uneven number of hex characters passed to function.  Value received was "' . var_export($hex, true) . '".');
            } else {
                $orighex = $hex;
                $new     = '';

                while (bccomp($hex, '0') > 0) {
                    $qq  = bcdiv($hex, '58');
                    $rem = bcmod($hex, '58');
                    $val = $qq;
                    $new = $new . $this->b58_chars[$rem];
                }

                $return = strrev($return);

                for ($i = 0; $i < strlen($orighex) && substr($orighex, $i, 2) == '00'; $i += 2) {
                    $return = '1' . $return;
                }
            }

            return $return;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Decodes a Base-58 encoded value to hex.
     *
     * @param  string     $base58
     * @return string     $return
     * @throws \Exception
     */
    public function decode($base58)
    {
        $this->paramsCheck(array($base58));

        try {

            $origbase58 = $base58;
            $return     = '0';
            $b58_len    = strlen($base58);

            for ($i = 0; $i < $b58_len; $i++) {
                $current = strpos($this->b58_chars, $base58[$i]);
                $return  = bcmul($return, '58');
                $return  = bcadd($return, $current);
            }

            for ($i = 0; $i < strlen($origbase58) && $origbase58[$i] == '1'; $i++) {
                $return = '00' . $return;
            }

            return (strlen($return) %2 != 0) ? '0' . $return : $return;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Handles the validation checking for method parameters.
     *
     * @param  array   $params  The array of parameters to check.
     * @return boolean          Will only be true, otherwise throws \Exception
     * @throws \Exception
     */
    private function paramsCheck(array $params)
    {
        foreach ($params as $key => $value) {
            if (true === empty($value)) {
                $caller = debug_backtrace();
                throw new \Exception('Empty or invalid parameters passed to ' . $caller[count($caller)-1]['function'] . ' function. Argument list received: ' . var_export($caller[count($caller)-1]['args'], true));
            }
        }
    }

}
