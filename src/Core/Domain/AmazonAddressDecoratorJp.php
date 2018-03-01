<?php
/**
 * Copyright 2016 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Core\Domain;

use Amazon\Core\Api\Data\AmazonAddressInterface;

class AmazonAddressDecoratorJp implements AmazonAddressInterface
{
    /**
     * @var AmazonAddressInterface
     */
    private $amazonAddress;

    /**
     * @param AmazonAddressInterface $amazonAddress
     */
    public function __construct(AmazonAddressInterface $amazonAddress)
    {
        $this->amazonAddress = $amazonAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getLines()
    {
        $line1 = (string) $this->amazonAddress->getLines()[1];
        $line2 = (string) $this->amazonAddress->getLines()[2];
        $line3 = (string) $this->amazonAddress->getLines()[3];
        $city = (string) $this->amazonAddress->getCity();

        $lines = [];
        if (empty($city)) {
            $lines[] = trim($line1 . ' ' . $line2);
        } else {
            $lines[] = $line2;
        }
        $lines[] = $line3;

        return $lines;
    }

    /**
     * {@inheritdoc}
     */
    public function getCompany()
    {
        return $this->amazonAddress->getCompany();
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return $this->amazonAddress->getFirstName();
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return $this->amazonAddress->getLastName();
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->amazonAddress->getCity() ?? $this->amazonAddress->getLines()[1];
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->amazonAddress->getState();
    }

    /**
     * {@inheritdoc}
     */
    public function getPostCode()
    {
        return $this->amazonAddress->getPostCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        return $this->amazonAddress->getCountryCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getTelephone()
    {
        return $this->amazonAddress->getTelephone();
    }

    /**
     * {@inheritdoc}
     */
    public function getLine($lineNumber)
    {
        $this->amazonAddress->getLine($lineNumber);
    }
}